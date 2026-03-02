#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
Gera assets/search-index.json a partir de páginas HTML do site.
Melhorias:
- Keywords automáticas do nome do arquivo (slug -> palavras)
- Ignora arquivos temporários/duplicados (ex.: *_atualizada.html, *-backup.html)
- Extrai title, h1, h2, h3 e primeiros parágrafos como descrição
- Snippet mais limpo e útil
"""

import argparse
import json
import re
from pathlib import Path
from typing import Dict, List, Tuple

EXCLUDE_DIRS = {
    "node_modules", ".git", ".github", ".vscode", "dist", "build", "vendor",
    "__pycache__", "assets"
}

# padrões comuns de arquivos que não devem entrar no índice
SKIP_NAME_PATTERNS = [
    r"_atualizad[ao]\.html$",
    r"-backup\.html$",
    r"-old\.html$",
    r"-copy\.html$",
    r"_copy\.html$",
    r"_tmp\.html$",
    r"\.bak\.html$"
]

# ignore arquivos que começam com "_"
EXCLUDE_FILES_PREFIX = {"_"}


def strip_tags(html: str) -> str:
    html = re.sub(r"(?is)<(script|style|noscript).*?>.*?</\1>", " ", html)
    html = re.sub(r"(?is)<[^>]+>", " ", html)
    html = re.sub(r"\s+", " ", html).strip()
    return html


def extract_first(html: str, pattern: str) -> str:
    m = re.search(pattern, html, flags=re.I | re.S)
    return m.group(1).strip() if m else ""


def extract_all(html: str, pattern: str, limit: int = 5) -> List[str]:
    matches = re.findall(pattern, html, flags=re.I | re.S)
    return [m.strip() for m in matches[:limit]]


def infer_category(filename: str) -> str:
    fn = filename.lower()
    if fn.startswith("solucao-"):
        return "Solução"
    if fn.startswith("fase-"):
        return "Fase"
    if fn in {"index.html", "sobre.html", "cooperacao-tecnica.html", "equipe.html", "contact.html", "busca.html"}:
        return "Página"
    # heurística para municípios (ajuste conforme sua convenção)
    # ex.: "morro-do-chapeu.html", "ibitita.html", "lapao.html"
    if fn.endswith(".html") and not fn.startswith(("solucao-", "fase-")) and fn not in {"index.html", "busca.html"}:
        return "Município"
    return "Página"


def slug_to_keywords(stem: str) -> str:
    # transforma "morro-do-chapeu" -> "morro do chapeu"
    s = stem.lower()
    s = re.sub(r"[_\-]+", " ", s)
    s = re.sub(r"\s+", " ", s).strip()
    # remove tokens muito genéricos
    stop = {"solucao", "fase", "page", "pagina"}
    parts = [p for p in s.split(" ") if p and p not in stop]
    return " ".join(parts)


def dedupe_keywords(*chunks: str) -> str:
    tokens: List[str] = []
    seen = set()
    for ch in chunks:
        for t in re.split(r"[,\s]+", (ch or "").lower()):
            t = t.strip()
            if not t:
                continue
            # remove tokens muito curtos
            if len(t) <= 2:
                continue
            if t not in seen:
                seen.add(t)
                tokens.append(t)
    return " ".join(tokens)[:240]


def build_description(raw_html: str, max_len: int = 240) -> str:
    ps = extract_all(raw_html, r"(?is)<p[^>]*>(.*?)</p>", limit=8)
    texts = []
    for p in ps:
        t = strip_tags(p)
        if len(t) >= 30:
            texts.append(t)
        if sum(len(x) for x in texts) >= max_len * 2:
            break

    if texts:
        joined = " ".join(texts)
        joined = re.sub(r"\s+", " ", joined).strip()
        return joined[:max_len].rstrip()

    # fallback: usa body
    body = extract_first(raw_html, r"(?is)<body[^>]*>(.*?)</body>")
    txt = strip_tags(body)
    return txt[:max_len].rstrip()


def should_skip_file(p: Path) -> bool:
    name = p.name.lower()
    if p.name and p.name[0] in EXCLUDE_FILES_PREFIX:
        return True
    for pat in SKIP_NAME_PATTERNS:
        if re.search(pat, name):
            return True
    return False


def iter_html_files(root: Path) -> List[Path]:
    html_files: List[Path] = []
    for p in root.rglob("*.html"):
        if any(part in EXCLUDE_DIRS for part in p.parts):
            continue
        if should_skip_file(p):
            continue
        html_files.append(p)
    return sorted(html_files)


def build_entry(file_path: Path, root: Path, base_url: str = "") -> Dict:
    raw = file_path.read_text(encoding="utf-8", errors="ignore")

    title = strip_tags(extract_first(raw, r"(?is)<title[^>]*>(.*?)</title>"))
    h1 = strip_tags(extract_first(raw, r"(?is)<h1[^>]*>(.*?)</h1>"))
    h2s = [strip_tags(x) for x in extract_all(raw, r"(?is)<h2[^>]*>(.*?)</h2>", limit=4)]
    h3s = [strip_tags(x) for x in extract_all(raw, r"(?is)<h3[^>]*>(.*?)</h3>", limit=4)]

    if not title and h1:
        title = h1
    if not title:
        title = file_path.stem

    # meta keywords (se existir)
    meta_kw = strip_tags(
        extract_first(raw, r'(?is)<meta[^>]+name=["\']keywords["\'][^>]+content=["\'](.*?)["\']')
    )

    # keywords por slug
    slug_kw = slug_to_keywords(file_path.stem)

    # keywords adicionais vindas de h1/h2/h3
    heading_kw = " ".join([h1] + h2s + h3s)

    keywords = dedupe_keywords(meta_kw, slug_kw, heading_kw)

    desc = build_description(raw, max_len=240)

    rel_url = str(file_path.relative_to(root)).replace("\\", "/")
    url = f"{base_url}{rel_url}" if base_url else rel_url

    return {
        "title": title,
        "url": url,
        "category": infer_category(file_path.name),
        "description": desc,
        "keywords": keywords
    }


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--root", default=".", help="Pasta raiz do site (onde está o index.html)")
    ap.add_argument("--out", default="assets/search-index.json", help="Arquivo de saída do índice")
    ap.add_argument("--base-url", default="", help="Prefixo opcional de URL (ex.: / ou https://site)")
    args = ap.parse_args()

    root = Path(args.root).resolve()
    out = (root / args.out).resolve()
    out.parent.mkdir(parents=True, exist_ok=True)

    files = iter_html_files(root)
    entries = [build_entry(fp, root, base_url=args.base_url) for fp in files]

    with out.open("w", encoding="utf-8") as f:
        json.dump(entries, f, ensure_ascii=False, indent=2)

    print(f"OK: {len(entries)} páginas indexadas -> {out}")


if __name__ == "__main__":
    main()