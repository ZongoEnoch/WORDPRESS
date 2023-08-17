<?php
/**
 * Wild Themes Customizer
 *
 * @package Wild Business
 *
 * slider section
 */

$wp_customize->add_section(
	'wild_business_slider',
	array(
		'title' => esc_html__( 'Slider Section', 'wild-business' ),
		'panel' => 'wild_business_home_panel',
	)
);

// slider enable settings
$wp_customize->add_setting(
	'wild_business_slider',
	array(
		'sanitize_callback' => 'wild_business_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'wild_business_slider',
	array(
		'section'		=> 'wild_business_slider',
		'label'			=> esc_html__( 'Content type:', 'wild-business' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'wild-business' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'wild-business' ),
				'page' => esc_html__( 'Page', 'wild-business' ),
		 	)
	)
);

for ($i=1; $i <= 3; $i++) { 
	
	// slider page setting
	$wp_customize->add_setting(
		'wild_business_slider_page_'.$i,
		array(
			'sanitize_callback' => 'wild_business_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'wild_business_slider_page_'.$i,
		array(
			'section'		=> 'wild_business_slider',
			'label'			=> esc_html__( 'Page ', 'wild-business' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'wild_business_if_slider_page'
		)
	);
}

$wp_customize->add_setting(
	'wild_business_slider_button_label',
	array(	
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> esc_html__( 'Learn More', 'wild-business' ),
	'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'wild_business_slider_button_label',
	array(
	'label'       => __('Button Label', 'wild-business'),  
	'section'     => 'wild_business_slider',   		
	'type'        => 'text',
	'active_callback'	=> 'wild_business_if_slider_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'wild_business_slider_button_label', 
	array(
        'selector'            => '#hero-slider div.read-more a',
		'render_callback'     => 'wild_business_slider_partial_button',
	) 
);
