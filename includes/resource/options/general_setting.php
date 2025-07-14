<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'governlia'), $val);
}

return  array(
    'title'      => esc_html__( 'General Setting', 'governlia' ),
    'id'         => 'general_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
        array(
            'id' => 'theme_preloader',
            'type' => 'switch',
            'title' => esc_html__('Enable Preloader', 'governlia'),
            'default' => false,
        ),
		array(
			'id'      => 'preloader_text',
			'type'    => 'textarea',
			'title'   => __( 'Preloader Text', 'governlia' ),
			'desc'    => esc_html__( 'Enter the Preloader Text', 'governlia' ),
			'default' => 'Governlia',
		),
    ),
);
