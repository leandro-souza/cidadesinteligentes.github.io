<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'governlia' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'governlia' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'governlia' ),
				'e' => esc_html__( 'Elementor', 'governlia' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'governlia' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'governlia' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'governlia' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'governlia' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'governlia' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'governlia' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'governlia' ),
			'default'  => '',
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'    => '404-page_heading',
			'type'  => 'text',
			'title' => esc_html__( '404 Page Heading', 'governlia' ),
			'desc'  => esc_html__( 'Enter 404 section Page Heading that you want to show', 'governlia' ),
		),
		array(
			'id'    => '404-page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Title', 'governlia' ),
			'desc'  => esc_html__( 'Enter 404 section title that you want to show', 'governlia' ),
		),
		array(
			'id'    => '404-page-text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'governlia' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'governlia' ),
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'governlia' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'governlia' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'governlia' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'governlia' ),
			'default'  => esc_html__( 'Back To Home', 'governlia' ),
			'required' => array( 'back_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);