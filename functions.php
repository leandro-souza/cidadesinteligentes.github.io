<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'governlia_setup_theme' );
add_action( 'after_setup_theme', 'governlia_load_default_hooks' );


function governlia_setup_theme() {

	load_theme_textdomain( 'governlia', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
    
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'governlia_480x500', 480, 500, true ); //governlia_480x500 Our Projects
	add_image_size( 'governlia_360x270', 360, 270, true ); //governlia_360x270 Our Services V2
	add_image_size( 'governlia_205x180', 205, 180, true ); //governlia_205x180 Upcoming Events V2
	add_image_size( 'governlia_360x400', 360, 400, true ); //governlia_360x400 Our Team
	add_image_size( 'governlia_370x290', 370, 290, true ); //governlia_370x290 Latest News V2
	add_image_size( 'governlia_600x540', 600, 540, true ); //governlia_600x540 Our Projects V2
	add_image_size( 'governlia_400x270', 400, 270, true ); //governlia_400x270 Blog Grid View
	add_image_size( 'governlia_1170x430', 1170, 430, true ); //governlia_1170x430 Our Blog
	add_image_size( 'governlia_80x80', 80, 80, true ); //governlia_80x80 Testimonials Widget
	
	
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'governlia' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'governlia_admin_init', 2000000 );
}

/**
 * [governlia_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function governlia_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [governlia_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function governlia_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'governlia' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'governlia' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'governlia' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'governlia'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'governlia'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Two', 'governlia'),
		'id' => 'footer-sidebar2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'governlia'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget single-footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => esc_html__('Services Widget', 'governlia'),
		'id' => 'service-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'governlia'),
		'before_widget'=>'<div id="%1$s" class="service-widget sidebar-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	}
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'governlia' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'governlia' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h3 class="widget-title">',
	  'after_title' => '</h3>'
	));
	if ( ! is_object( governlia_WSH() ) ) {
		return;
	}

	$sidebars = governlia_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( governlia_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'governlia_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function governlia_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'governlia' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'governlia' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'governlia' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'governlia' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'governlia' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'governlia' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'governlia' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'governlia' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'governlia' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'governlia_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function governlia_enqueue_scripts() {
	$options = governlia_WSH()->option();
	$header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
		$header_option = $options->get( 'header_style_settings' );
		$header = ( $header_meta ) ? $header_meta['0'] : $header_option;
		
		if ( $header == 'header_v1' ) {
		  $color_scheme =  '/assets/css/color.css';
		} elseif ( $header == 'header_v2' ) {
			$color_scheme =  '/assets/css/color-2.css';
		} else {
			$color_scheme =  '/assets/css/color.css';
	}
    //styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'custom-animate', get_template_directory_uri() . '/assets/css/custom-animate.css' );
	wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/assets/css/icomoon.css' );
	wp_enqueue_style( 'stroke-gap', get_template_directory_uri() . '/assets/css/stroke-gap.css' );
	wp_enqueue_style( 'pe-icon-7-stroke', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css' );
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'scrollbar', get_template_directory_uri() . '/assets/css/scrollbar.css' );
	wp_enqueue_style( 'hover', get_template_directory_uri() . '/assets/css/hover.css' );
    wp_enqueue_style( 'jquery-touchspin', get_template_directory_uri() . '/assets/css/jquery.touchspin.css' );
	wp_enqueue_style( 'botstrap-select', get_template_directory_uri() . '/assets/css/botstrap-select.min.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.min.css' );
	wp_enqueue_style( 'rtl', get_template_directory_uri() . '/assets/css/rtl.css' );
	wp_enqueue_style( 'polyglot-language-switcher', get_template_directory_uri() . '/assets/css/polyglot-language-switcher.css' );
	wp_enqueue_style( 'governlia-color-scheme', get_template_directory_uri() . $color_scheme);
	wp_enqueue_style( 'governlia-main', get_stylesheet_uri() );
	wp_enqueue_style( 'governlia-main-style', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style( 'governlia-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'governlia-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'popper', get_template_directory_uri().'/assets/js/popper.min.js', array( 'jquery' ), '2.1.2', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '2.1.2', true );
    wp_enqueue_script( 'bootstrap-select', get_template_directory_uri().'/assets/js/bootstrap-select.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'lazyload', get_template_directory_uri().'/assets/js/lazyload.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'scrollbar', get_template_directory_uri().'/assets/js/scrollbar.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'tweenmax', get_template_directory_uri().'/assets/js/TweenMax.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri().'/assets/js/swiper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-polyglot-language', get_template_directory_uri().'/assets/js/jquery.polyglot.language.switcher.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-ajaxchimp', get_template_directory_uri().'/assets/js/jquery.ajaxchimp.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-countdown', get_template_directory_uri().'/assets/js/jquery.countdown.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'parallax-scroll', get_template_directory_uri().'/assets/js/parallax-scroll.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'governlia-main-script', get_template_directory_uri().'/assets/js/script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'governlia_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function governlia_fonts_url() {
	
	$fonts_url = '';
	
		
		$font_families['Arimo']      = 'Arimo:wght@400,700';
		$font_families['Merriweather']      = 'Merriweather';

		$font_families = apply_filters( 'REXAR/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function governlia_theme_styles() {
    wp_enqueue_style( 'governlia-theme-fonts', governlia_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'governlia_theme_styles' );
add_action( 'admin_enqueue_scripts', 'governlia_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) governlia_set function

/**
 * [governlia_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'governlia_set' ) ) {
	function governlia_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) governlia_add_editor_styles function

function governlia_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'governlia_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = governlia_WSH()->option(); 
if( governlia_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}
