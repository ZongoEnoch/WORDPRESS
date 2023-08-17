<?php
/**
 * General settings
 */
// General settings
$wp_customize->add_section(
	'wild_business_general_section',
	array(
		'title' => esc_html__( 'General', 'wild-business' ),
		'panel' => 'wild_business_general_panel',
	)
);

// Breadcrumb enable setting
$wp_customize->add_setting(
	'wild_business_breadcrumb_enable',
	array(
		'sanitize_callback' => 'wild_business_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'wild_business_breadcrumb_enable',
	array(
		'section'		=> 'wild_business_general_section',
		'label'			=> esc_html__( 'Enable breadcrumb.', 'wild-business' ),
		'type'			=> 'checkbox',
	)
);