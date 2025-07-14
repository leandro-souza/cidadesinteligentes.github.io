<?php
return  array(
    'title'      => esc_html__( 'Social Setting', 'governlia' ),
    'id'         => 'social_setting',
    'desc'       => '',
    'icon'       => 'el el-share',
    'fields'     => array(
        array(
			'id'    => 'icons_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'governlia' ),
		),
    ),
);
