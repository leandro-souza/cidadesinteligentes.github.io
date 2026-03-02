<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

// Log local (para diagnosticar 500 sem expor erro ao usuário)
ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/sendmail_error.log');

// PHPMailer (caminho robusto)
require_once(__DIR__ . '/phpmailer/class.phpmailer.php');
require_once(__DIR__ . '/phpmailer/class.smtp.php');

$message = '';
$status  = 'false';

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método inválido.');
    }

    // Campos do seu formulário
    $name     = trim($_POST['form_name'] ?? '');
    $email    = trim($_POST['form_email'] ?? '');
    $subject  = trim($_POST['form_subject'] ?? '');
    $bodyMsg  = trim($_POST['form_message'] ?? '');
    $botcheck = trim($_POST['form_botcheck'] ?? '');

    if ($botcheck !== '') {
        throw new Exception('Bot detectado.');
    }

    if ($name === '' || $email === '' || $subject === '' || $bodyMsg === '') {
        throw new Exception('Preencha nome, e-mail, assunto e mensagem.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('E-mail inválido.');
    }

    // ===== DESTINO =====
    $toEmail = 'cidades.intel.ire@ifba.edu.br';  // destino
    $toName  = 'Projeto Cidades Inteligentes';   // nome do destino

    // ===== SMTP (ajuste com dados reais do IFBA) =====
    // Se não tiver SMTP, veja o fallback mail() logo abaixo.
    $smtpHost = 'SEU_SMTP_HOST';
    $smtpUser = 'SEU_SMTP_USER';
    $smtpPass = 'SEU_SMTP_PASS';
    $smtpPort = 587;       // 587 (tls) ou 465 (ssl)
    $smtpSec  = 'tls';     // 'tls' ou 'ssl'
    // ================================================

    $mail = new PHPMailer(true);

    // Se você NÃO tiver SMTP e o servidor tiver mail() configurado, comente o bloco SMTP
    // e use: $mail->isMail();
    $mail->isSMTP();
    $mail->Host       = $smtpHost;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUser;
    $mail->Password   = $smtpPass;
    $mail->SMTPSecure = $smtpSec;   // 'tls' ou 'ssl' (NÃO boolean)
    $mail->Port       = $smtpPort;

    // Evita problemas de SPF/DMARC: "From" deve ser do domínio do SMTP.
    $mail->setFrom($smtpUser, 'Formulário do Site');
    $mail->addReplyTo($email, $name);

    $mail->addAddress($toEmail, $toName);
    $mail->Subject = "[Contato - Site] " . $subject;

    $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

    $htmlBody =
        "<strong>Nome:</strong> " . htmlspecialchars($name) . "<br><br>" .
        "<strong>E-mail:</strong> " . htmlspecialchars($email) . "<br><br>" .
        "<strong>Mensagem:</strong><br>" . nl2br(htmlspecialchars($bodyMsg)) .
        ($referrer ? "<br><br><small>Enviado a partir de: " . htmlspecialchars($referrer) . "</small>" : "");

    $mail->msgHTML($htmlBody);

    if (!$mail->send()) {
        throw new Exception("Falha ao enviar: " . $mail->ErrorInfo);
    }

    $message = 'Mensagem enviada com sucesso! Retornaremos em breve.';
    $status  = 'true';

} catch (Throwable $e) {
    error_log("sendmail.php ERROR: " . $e->getMessage());
    $message = 'Não foi possível enviar sua mensagem no momento. Tente novamente mais tarde.';
    $status  = 'false';
}

echo json_encode(['message' => $message, 'status' => $status], JSON_UNESCAPED_UNICODE);