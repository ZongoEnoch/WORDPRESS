<?php
/**
 * Wild Themes Customizer
 *
 * @package Wild Business Theme
 *
 * Team section
 */

$wp_customize->add_section(
	'wild_business_team',
	array(
		'title' => esc_html__( 'Team', 'wild-business' ),
		'panel' => 'wild_business_home_panel',
	)
);

// team enable settings
$wp_customize->add_setting(
	'wild_business_team',
	array(
		'sanitize_callback' => 'wild_business_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'wild_business_team',
	array(
		'section'		=> 'wild_business_team',
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
	'wild_business_team_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Our Members', 'wild-business'),
	)
);

$wp_customize->add_control(
	'wild_business_team_sub_title',
	array(
		'section'		=> 'wild_business_team',
		'label'			=> esc_html__( 'Sub Title:', 'wild-business' ),
		'active_callback' => 'wild_business_if_team_enabled',	
	)
);

$wp_customize->selective_refresh->add_partial( 
	'wild_business_team_sub_title', 
	array(
        'selector'            => '#our-team p.section-subtitle',
		'render_callback'     => 'wild_business_team_partial_sub_title',
	) 
);

$wp_customize->add_setting(
	'wild_business_team_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Here is Our Awesome Team', 'wild-business'),
	)
);

$wp_customize->add_control(
	'wild_business_team_title',
	array(
		'section'		=> 'wild_business_team',
		'label'			=> esc_html__( 'Title:', 'wild-business' ),		
		'active_callback' => 'wild_business_if_team_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'wild_business_team_title', 
	array(
        'selector'            => '#our-team h2.section-title',
		'render_callback'     => 'wild_business_team_partial_title',
	) 
);

for ($i=1; $i <= 3; $i++) { 

	// team page setting
	$wp_customize->add_setting(
		'wild_business_team_page_'.$i,
		array(
			'sanitize_callback' => 'wild_business_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'wild_business_team_page_'.$i,
		array(
			'section'		=> 'wild_business_team',
			'label'			=> esc_html__( 'Page ', 'wild-business' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'wild_business_if_team_page'
		)
	);

	$wp_customize->add_setting(
		'wild_business_team_position_'.$i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'	=> 'refresh',
		)
	);

	$wp_customize->add_control(
		'wild_business_team_position_'.$i,
		array(
			'section'		=> 'wild_business_team',
			'label'			=> esc_html__( 'Members Position:', 'wild-business' ). $i,
			'active_callback' => 'wild_business_if_team_enabled',	
		)
	);

}