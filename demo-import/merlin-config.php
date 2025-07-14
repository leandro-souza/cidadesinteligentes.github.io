<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

defined('THEMEKALIA_IMPORT_VENDOR_PATH') || define('THEMEKALIA_IMPORT_VENDOR_PATH', get_template_directory() . '/demo-import/vendor/');

require_once THEMEKALIA_IMPORT_VENDOR_PATH . 'autoload.php';

if ( ! class_exists( '\WP_Importer' ) ) {
	require ABSPATH . '/wp-admin/includes/class-wp-importer.php';
}
require_once get_template_directory() . '/demo-import/importer/WPImporterLogger.php';
require_once get_template_directory() . '/demo-import/importer/WPImporterLoggerCLI.php';
require_once get_template_directory() . '/demo-import/importer/WXRImportInfo.php';
require_once get_template_directory() . '/demo-import/importer/WXRImporter.php';
require_once get_template_directory() . '/demo-import/importer/Importer.php';
/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config = array(
		'directory'            => 'demo-import',
		// Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'demo-import',
		// The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'themes.php',
		// The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options',
		// The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes',
		// URL for the 'child-action-link'.
		'dev_mode'             => true,
		// Enable development mode for testing.
		'license_step'         => false,
		// EDD license activation step.
		'license_required'     => false,
		// Require the license activation step.
		'license_help_url'     => '',
		// URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '',
		// EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => 'Governlia',
		// EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => 'governlia',
		// EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => home_url( '/' ),
		// Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'          => esc_html__( 'TemplatePath Import', 'governlia' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'       => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'governlia' ),
		'return-to-dashboard' => esc_html__( 'Return to the dashboard', 'governlia' ),
		'ignore'              => esc_html__( 'Disable this wizard', 'governlia' ),

		'btn-skip'                 => esc_html__( 'Skip', 'governlia' ),
		'btn-next'                 => esc_html__( 'Next', 'governlia' ),
		'btn-start'                => esc_html__( 'Start', 'governlia' ),
		'btn-no'                   => esc_html__( 'Cancel', 'governlia' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'governlia' ),
		'btn-child-install'        => esc_html__( 'Install', 'governlia' ),
		'btn-content-install'      => esc_html__( 'Install', 'governlia' ),
		'btn-import'               => esc_html__( 'Import', 'governlia' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'governlia' ),
		'btn-license-skip'         => esc_html__( 'Later', 'governlia' ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'governlia' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'governlia' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'governlia' ),
		'license-label'            => esc_html__( 'License key', 'governlia' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'governlia' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'governlia' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'governlia' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'governlia' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'governlia' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'governlia' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'governlia' ),

		'child-header'         => esc_html__( 'Install Child Theme', 'governlia' ),
		'child-header-success' => esc_html__( 'You\'re good to go!', 'governlia' ),
		'child'                => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'governlia' ),
		'child-success%s'      => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'governlia' ),
		'child-action-link'    => esc_html__( 'Learn about child themes', 'governlia' ),
		'child-json-success%s' => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'governlia' ),
		'child-json-already%s' => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'governlia' ),

		'plugins-header'         => esc_html__( 'Install Plugins', 'governlia' ),
		'plugins-header-success' => esc_html__( 'You\'re up to speed!', 'governlia' ),
		'plugins'                => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'governlia' ),
		'plugins-success%s'      => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'governlia' ),
		'plugins-action-link'    => esc_html__( 'Advanced', 'governlia' ),

		'import-header'      => esc_html__( 'Import Content', 'governlia' ),
		'import'             => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'governlia' ),
		'import-action-link' => esc_html__( 'Advanced', 'governlia' ),

		'ready-header'      => esc_html__( 'All done. Have fun!', 'governlia' ),

		/* translators: Theme Author */
		'ready%s'           => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'governlia' ),
		'ready-action-link' => esc_html__( 'Extras', 'governlia' ),
		'ready-big-button'  => esc_html__( 'View your website', 'governlia' ),
		'ready-link-1'      => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://themeforest.net/user/yogsthemes/', esc_html__( '5 Star For Project Governlia', 'governlia' ) ),
		'ready-link-2'      => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://yogsthemes.com/support', esc_html__( 'Get Governlia Theme Support', 'governlia' ) ),
	)
);
