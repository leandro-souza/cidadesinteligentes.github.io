<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'governlia' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'governlia' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'governlia' ),
				'e' => esc_html__( 'Elementor', 'governlia' ),
			),
			'default' => 'd',
		),

		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'governlia' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show post publish date on posts detail page', 'governlia' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show author on posts detail page', 'governlia' ),
			'default' => true,
		),

		array(
			'id'      => 'single_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show number of comments on posts single page', 'governlia' ),
			'default' => true,
		),
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'governlia' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'governlia' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'governlia' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'governlia' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'governlia' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'governlia' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'governlia' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Box', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show author box on post detail page.', 'governlia' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_links',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Social Media', 'governlia' ),
			'desc'    => esc_html__( 'Enable to show author Social Media on posts detail page', 'governlia' ),
			'default' => false,
		),
		array(
			'id'    => 'single_post_author_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Author Social Profiles', 'governlia' ),
			'desc'    => esc_html__( 'show author Social Media on posts detail page', 'governlia' ),
		),
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





