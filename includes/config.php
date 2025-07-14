<?php
/**
 * Theme config file.
 *
 * @package GOVERNLIA
 * @author  TemplatePath
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['governlia_main_header'][] 	= array( 'governlia_preloader', 98 );
$config['default']['governlia_main_header'][] 	= array( 'governlia_main_header_area', 99 );

$config['default']['governlia_main_footer'][] 	= array( 'governlia_preloader', 98 );
$config['default']['governlia_main_footer'][] 	= array( 'governlia_main_footer_area', 99 );

$config['default']['governlia_sidebar'][] 	    = array( 'governlia_sidebar', 99 );

$config['default']['governlia_banner'][] 	    = array( 'governlia_banner', 99 );


return $config;
