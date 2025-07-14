<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'governlia' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'governlia' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'governlia' ),
				'e' => esc_html__( 'Elementor', 'governlia' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'governlia' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'governlia' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'governlia' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'governlia' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'governlia' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'governlia' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'governlia' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
            'id' => 'show_header_topbar_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'governlia'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'welcome_text_v1',
			'type'    => 'textarea',
			'title'   => __( 'Welcome Text', 'governlia' ),
			'required' => array( 'show_header_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'phone_no_v1',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'governlia' ),
			'required' => array( 'show_header_topbar_v1', '=', true ),
		),
		array(
			'id'      => 'topbar_menu_list_v1',
			'type'    => 'textarea',
			'title'   => __( 'TopBar Menu html', 'governlia' ),
			'required' => array( 'show_header_topbar_v1', '=', true ),
		),
		array(
            'id'    => 'header_social_share_v1',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'governlia' ),
            'required' => array( 'show_header_topbar_v1', '=', true ),
        ),
		array(
            'id' => 'show_seach_form_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'governlia'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'governlia' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
            'id' => 'show_header_topbar_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'governlia'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'address_v2',
			'type'    => 'text',
			'title'   => __( 'Address', 'governlia' ),
			'required' => array( 'show_header_topbar_v2', '=', true ),
		),
		array(
			'id'      => 'phone_no_v2',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'governlia' ),
			'required' => array( 'show_header_topbar_v2', '=', true ),
		),
		array(
			'id'      => 'email_address_v2',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'governlia' ),
			'required' => array( 'show_header_topbar_v2', '=', true ),
		),
        array(
            'id'    => 'header_social_share_v2',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'governlia' ),
            'required' => array( 'show_header_topbar_v2', '=', true ),
        ),
		array(
            'id' => 'show_button_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable Donate Button', 'governlia'),
            'default' => true,
            'required' => array( 'show_header_topbar_v2', '=', true ),
        ),
		array(
			'id'      => 'btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'governlia' ),
			'required' => array( 'show_button_v2', '=', true ),
		),
		array(
			'id'      => 'btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'governlia' ),
			'required' => array( 'show_button_v2', '=', true ),
		),
		array(
            'id' => 'show_seach_form_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Form', 'governlia'),
            'default' => true,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
        
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
