<?php
/**
 * Wild Themes Customizer
 *
 * @package Wild Business
 *
 * recent_news section
 */

$wp_customize->add_section(
	'wild_business_recent_news',
	array(
		'title' => esc_html__( 'Blog Section', 'wild-business' ),
		'panel' => 'wild_business_home_panel',
	)
);

// recent_news enable settings
$wp_customize->add_setting(
	'wild_business_recent_news',
	array(
		'sanitize_callback' => 'wild_business_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'wild_business_recent_news',
	array(
		'section'		=> 'wild_business_recent_news',
		'label'			=> esc_html__( 'Content type:', 'wild-business' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'wild-business' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'wild-business' ),
				'page' => esc_html__( 'Page', 'wild-business' ),
				'cat' => esc_html__( 'Category', 'wild-business' ),
		 	)
	)
);

$wp_customize->add_setting(
	'wild_business_recent_news_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Recent News', 'wild-business'),
	)
);

$wp_customize->add_control(
	'wild_business_recent_news_sub_title',
	array(
		'section'		=> 'wild_business_recent_news',
		'label'			=> esc_html__( 'Sub Title:', 'wild-business' ),
		'active_callback' => 'wild_business_if_recent_news_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'wild_business_recent_news_sub_title', 
	array(
        'selector'            => '#recent-news p.section-subtitle',
		'render_callback'     => 'wild_business_recent_news_partial_sub_title',
	) 
);

$wp_customize->add_setting(
	'wild_business_recent_news_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Choose Your Perfect Plan', 'wild-business'),
	)
);

$wp_customize->add_control(
	'wild_business_recent_news_title',
	array(
		'section'		=> 'wild_business_recent_news',
		'label'			=> esc_html__( 'Title:', 'wild-business' ),		
		'active_callback' => 'wild_business_if_recent_news_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'wild_business_recent_news_title', 
	array(
        'selector'            => '#recent-news h2.section-title',
		'render_callback'     => 'wild_business_recent_news_partial_title',
	) 
);

for ($i=1; $i <= 6; $i++) { 

	// recent_news page setting
	$wp_customize->add_setting(
		'wild_business_recent_news_page_'.$i,
		array(
			'sanitize_callback' => 'wild_business_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'wild_business_recent_news_page_'.$i,
		array(
			'section'		=> 'wild_business_recent_news',
			'label'			=> esc_html__( 'Page ', 'wild-business' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'wild_business_if_recent_news_page'
		)
	);
}

// recent_news category setting
$wp_customize->add_setting(
	'wild_business_recent_news_cat',
	array(
		'sanitize_callback' => 'wild_business_sanitize_select',
	)
);

$wp_customize->add_control(
	'wild_business_recent_news_cat',
	array(
		'section'		=> 'wild_business_recent_news',
		'label'			=> esc_html__( 'Category:', 'wild-business' ),
		'active_callback' => 'wild_business_if_recent_news_cat',
		'type'			=> 'select',
		'choices'		=> wild_business_get_post_cat_choices(),
	)
);
