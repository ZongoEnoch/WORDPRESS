<?php
/**
 * Wild Themes Customizer
 *
 * @package Wild Business
 *
 * cta section
 */
$wp_customize->add_section(
	'wild_business_cta',
	array(
		'title' => esc_html__( 'Cta', 'wild-business' ),
		'panel' => 'wild_business_home_panel',
	)
);


// blog enable settings
$wp_customize->add_setting(
	'wild_business_cta',
	array(
		'sanitize_callback' => 'wild_business_sanitize_select',
		'default' => 'disable',
	)
);
$wp_customize->add_control(
	'wild_business_cta',
	array(
		'section'		=> 'wild_business_cta',
		'label'			=> esc_html__( 'Content type:', 'wild-business' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'wild-business' ),
		'type'			=> 'select',
		'choices'		=> array(
				'disable' 	=> esc_html__( '--Disable--', 'wild-business' ),
				'page' 		=> esc_html__( 'Page', 'wild-business' ),
		 	)
	)
);

$wp_customize->add_setting(
	'wild_business_cta_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'GET SOLUTIONS FAST', 'wild-business' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'wild_business_cta_sub_title',
	array(
		'section'		=> 'wild_business_cta',
		'label'			=> esc_html__( 'Sub Title:', 'wild-business' ),
		'active_callback'	=> 'wild_business_if_cta_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'wild_business_cta_sub_title', 
	array(
        'selector'            => '#call-to-action p.section-subtitle',
		'render_callback'     => 'wild_business_cta_partial_subtitle',
	) 
);

$wp_customize->add_setting( 
		'wild_business_cta_bg_image',
		array(
			'sanitize_callback' => 'wild_business_sanitize_image',
		) 
	);

	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'wild_business_cta_bg_image',
		array(
			'label'       		=> esc_html__( 'cta Image', 'wild-business' ),
			'section'     		=> 'wild_business_cta',
			'active_callback'	=> 'wild_business_if_cta_enabled',
		)
	) );

for ($i=1; $i <= 1 ; $i++) {
	
	// blog page setting
	$wp_customize->add_setting(
		'wild_business_cta_page_'.$i,
		array(
			'sanitize_callback' => 'wild_business_sanitize_dropdown_pages',
			'default' => 0,
		)
	);
	$wp_customize->add_control(
		'wild_business_cta_page_'.$i,
		array(
			'section'		=> 'wild_business_cta',
			'label'			=> esc_html__( 'Page ', 'wild-business' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'wild_business_if_cta_page'
		)
	);
}

$wp_customize->add_setting(
	'wild_business_cta_btn',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'GET A QUOTE HERE', 'wild-business' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'wild_business_cta_btn',
	array(
		'section'		=> 'wild_business_cta',
		'label'			=> esc_html__( 'Button Label:', 'wild-business' ),
		'active_callback'	=> 'wild_business_if_cta_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'wild_business_cta_btn', 
	array(
        'selector'            => '#call-to-action div.read-more a',
		'render_callback'     => 'wild_business_cta_partial_btn',
	) 
);

