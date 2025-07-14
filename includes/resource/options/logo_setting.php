<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'governlia' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'governlia' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'governlia' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.png' ),
		),
		array(
            'id' => 'normal_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Light Color Logo', 'governlia'),
            'default' => true,
        ),
		array(
			'id'       => 'light_color_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Light Color Logo Image', 'governlia' ),
			'subtitle' => esc_html__( 'Insert site Light Color logo image', 'governlia' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
			'id'       => 'light_color_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Light Color Logo Dimentions', 'governlia' ),
			'subtitle' => esc_html__( 'Select Light Color Logo Dimentions', 'governlia' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
            'id' => 'normal_logo_show2',
            'type' => 'switch',
            'title' => esc_html__('Enable Dark Color Logo', 'governlia'),
            'default' => true,
        ),
		array(
			'id'       => 'dark_color_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Dark Color Logo Image', 'governlia' ),
			'subtitle' => esc_html__( 'Insert site Dark Color logo image', 'governlia' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		array(
			'id'       => 'dark_color_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Dark Color Logo Dimentions', 'governlia' ),
			'subtitle' => esc_html__( 'Select Dark Color Logo Dimentions', 'governlia' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
