<?php
/**
 *
 *
 * Footer copyright
 *
 *
 */
// Footer copyright
$wp_customize->add_section(
	'wild_business_footer_section',
	array(
		'title' => esc_html__( 'Footer', 'wild-business' ),
		'panel' => 'wild_business_general_panel',
	)
);

// Footer copyright setting
$wp_customize->add_setting(
	'wild_business_copyright_txt',
	array(
		'sanitize_callback' => 'wild_business_sanitize_html',
		'default' => $default['wild_business_copyright_txt'],
	)
);

$wp_customize->add_control(
	'wild_business_copyright_txt',
	array(
		'section'		=> 'wild_business_footer_section',
		'label'			=> esc_html__( 'Copyright text:', 'wild-business' ),
		'type'			=> 'textarea',
	)
);
