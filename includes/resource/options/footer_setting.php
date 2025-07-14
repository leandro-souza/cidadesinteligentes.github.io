<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'governlia' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'governlia' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'governlia' ),
				'e' => esc_html__( 'Elementor', 'governlia' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'governlia' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'governlia' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'governlia' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'governlia' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'governlia' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'governlia' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'governlia' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
            'id' => 'show_footer_top_area_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable NewsLetter Section', 'governlia'),
            'default' => false,
            'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),
		array(
			'id'       => 'footer_logo_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo Image', 'governlia' ),
			'required' => array( 'show_footer_top_area_v1', '=', true ),
		),
		array(
			'id'      => 'form_title_v1',
			'type'    => 'text',
			'title'   => __( 'Form Title', 'governlia' ),
			'required' => array( 'show_footer_top_area_v1', '=', true ),
		),
		array(
			'id'      => 'mailchimp_form_url_v1',
			'type'    => 'text',
			'title'   => __( 'MailChimp Form url', 'governlia' ),
			'required' => array( 'show_footer_top_area_v1', '=', true ),
		),
		array(
			'id'      => 'copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'governlia' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'governlia' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
            'id' => 'show_footer_top_area_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable NewsLetter Section', 'governlia'),
            'default' => false,
            'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
        ),
		array(
			'id'       => 'footer_logo_image2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo Image', 'governlia' ),
			'required' => array( 'show_footer_top_area_v2', '=', true ),
		),
		array(
			'id'      => 'form_title_v2',
			'type'    => 'text',
			'title'   => __( 'Form Title', 'governlia' ),
			'required' => array( 'show_footer_top_area_v2', '=', true ),
		),
		array(
			'id'      => 'mailchimp_form_url_v2',
			'type'    => 'text',
			'title'   => __( 'MailChimp Form url', 'governlia' ),
			'required' => array( 'show_footer_top_area_v2', '=', true ),
		),
		array(
			'id'      => 'copyright_text2',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'governlia' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
