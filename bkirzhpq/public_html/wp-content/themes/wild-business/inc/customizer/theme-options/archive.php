<?php
/**
 * Blog/Archive section 
 */
// Blog/Archive section 
$wp_customize->add_section(
	'wild_business_archive_settings',
	array(
		'title' => esc_html__( 'Archive/Blog', 'wild-business' ),
		'description' => esc_html__( 'Settings for archive pages including blog page too.', 'wild-business' ),
		'panel' => 'wild_business_general_panel',
	)
);

// Archive excerpt length setting
$wp_customize->add_setting(
	'wild_business_archive_excerpt_length',
	array(
		'sanitize_callback' => 'wild_business_sanitize_number_range',
		'default' => 20,
	)
);

$wp_customize->add_control(
	'wild_business_archive_excerpt_length',
	array(
		'section'		=> 'wild_business_archive_settings',
		'label'			=> esc_html__( 'Excerpt more length:', 'wild-business' ),
		'type'			=> 'number',
		'input_attrs'   => array( 'min' => 5 ),
	)
);

// Pagination type setting
$wp_customize->add_setting(
	'wild_business_archive_pagination_type',
	array(
		'sanitize_callback' => 'wild_business_sanitize_select',
		'default' => 'numeric',
	)
);

$archive_pagination_description = '';
$archive_pagination_choices = array( 
			'disable' => esc_html__( '--Disable--', 'wild-business' ),
			'numeric' => esc_html__( 'Numeric', 'wild-business' ),
			'older_newer' => esc_html__( 'Older / Newer', 'wild-business' ),
		);

$wp_customize->add_control(
	'wild_business_archive_pagination_type',
	array(
		'section'		=> 'wild_business_archive_settings',
		'label'			=> esc_html__( 'Pagination type:', 'wild-business' ),
		'description'			=>  $archive_pagination_description,
		'type'			=> 'select',
		'choices'		=> $archive_pagination_choices,
	)
);

$wp_customize->add_setting(
	'wild_business_archive_layout',
	array(
		'sanitize_callback' => 'wild_business_sanitize_select',
		'default' => 'col-2',
	)
);

$wp_customize->add_control(
	'wild_business_archive_layout',
	array(
		'section'		=> 'wild_business_archive_settings',
		'label'			=> esc_html__( 'Archive Layout', 'wild-business' ),
		'type'			=> 'select',
		'choices'		=> array(
				'list-layout' 	=> esc_html__( 'List Layout', 'wild-business' ),
				'col-1' 		=> esc_html__( 'Column One', 'wild-business' ),
				'col-2' 		=> esc_html__( 'Column Two', 'wild-business' ),
				'col-3' 		=> esc_html__( 'Column Three', 'wild-business' ),
		),
	)
);