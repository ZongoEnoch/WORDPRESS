<?php
/**
 * Wild Themes Customizer
 *
 * @package Wild Business
 *
 * about section
 */
$wp_customize->add_section(
	'wild_business_about',
	array(
		'title' => esc_html__( 'About', 'wild-business' ),
		'panel' => 'wild_business_home_panel',
	)
);

// blog enable settings
$wp_customize->add_setting(
	'wild_business_about',
	array(
		'sanitize_callback' => 'wild_business_sanitize_select',
		'default' => 'disable',
	)
);
$wp_customize->add_control(
	'wild_business_about',
	array(
		'section'		=> 'wild_business_about',
		'label'			=> esc_html__( 'Content type:', 'wild-business' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'wild-business' ),
		'type'			=> 'select',
		'choices'		=> array(
				'disable' => esc_html__( '--Disable--', 'wild-business' ),
				'page' => esc_html__( 'Page', 'wild-business' ),
		 	)
	)
);

$wp_customize->add_setting(
	'wild_business_about_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'About Us', 'wild-business' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'wild_business_about_sub_title',
	array(
		'section'		=> 'wild_business_about',
		'label'			=> esc_html__( 'Sub Title:', 'wild-business' ),
		'active_callback'	=> 'wild_business_if_about_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'wild_business_about_sub_title', 
	array(
        'selector'            => '#about p.section-subtitle',
		'render_callback'     => 'wild_business_about_partial_subtitle',
	) 
);

for ($i=1; $i <= 1 ; $i++) {

	// blog page setting
	$wp_customize->add_setting(
		'wild_business_about_page_'.$i,
		array(
			'sanitize_callback' => 'wild_business_sanitize_dropdown_pages',
			'default' => 0,
		)
	);
	$wp_customize->add_control(
		'wild_business_about_page_'.$i,
		array(
			'section'		=> 'wild_business_about',
			'label'			=> esc_html__( 'Page ', 'wild-business' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'wild_business_if_about_page'
		)
	);
}