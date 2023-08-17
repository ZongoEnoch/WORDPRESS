<?php
/**
 * Global Layout
 */
// Global Layout
$wp_customize->add_section(
	'wild_business_global_layout',
	array(
		'title' => esc_html__( 'Global Layout', 'wild-business' ),
		'panel' => 'wild_business_general_panel',
	)
);

// Global archive layout setting
$wp_customize->add_setting(
	'wild_business_archive_sidebar',
	array(
		'sanitize_callback' => 'wild_business_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'wild_business_archive_sidebar',
	array(
		'section'		=> 'wild_business_global_layout',
		'label'			=> esc_html__( 'Archive Sidebar', 'wild-business' ),
		'description'			=> esc_html__( 'This option works on all archive pages like: 404, search, date, category, "Your latest posts" and so on.', 'wild-business' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'wild-business' ), 
			'no' => esc_html__( 'No Sidebar', 'wild-business' ), 
		),
	)
);

// Global page layout setting
$wp_customize->add_setting(
	'wild_business_global_page_layout',
	array(
		'sanitize_callback' => 'wild_business_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'wild_business_global_page_layout',
	array(
		'section'		=> 'wild_business_global_layout',
		'label'			=> esc_html__( 'Global page sidebar', 'wild-business' ),
		'description'			=> esc_html__( 'This option works only on single pages including "Posts page". This setting can be overridden for single page from the metabox too.', 'wild-business' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'wild-business' ), 
			'no' => esc_html__( 'No Sidebar', 'wild-business' ), 
		),
	)
);

// Global post layout setting
$wp_customize->add_setting(
	'wild_business_global_post_layout',
	array(
		'sanitize_callback' => 'wild_business_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'wild_business_global_post_layout',
	array(
		'section'		=> 'wild_business_global_layout',
		'label'			=> esc_html__( 'Global post sidebar', 'wild-business' ),
		'description'			=> esc_html__( 'This option works only on single posts. This setting can be overridden for single post from the metabox too.', 'wild-business' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'wild-business' ), 
			'no' => esc_html__( 'No Sidebar', 'wild-business' ), 
		),
	)
);