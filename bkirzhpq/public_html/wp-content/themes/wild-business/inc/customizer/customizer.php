<?php
/**
 * Wild Themes Customizer
 *
 * @package Wild Business
 */

/**
 * Get all the default values of the theme mods.
 */
function wild_business_get_default_mods() {
	$wild_business_default_mods = array(
		// Footer copyright
		'wild_business_copyright_txt' => esc_html__( 'Copyright &copy; [the-year] [site-link]  |  ', 'wild-business' ),
	);

	return apply_filters( 'wild_business_default_mods', $wild_business_default_mods );
}

require get_template_directory() . '/inc/customizer/class-go-pro.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wild_business_customize_register( $wp_customize ) {

	// Custom Controller
	require get_parent_theme_file_path( '/inc/customizer/custom-controller.php' );

	$default = wild_business_get_default_mods();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'wild_business_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'wild_business_customize_partial_blogdescription',
		) );
	}

	//Color Panel

	// Header tagline color setting
	$wp_customize->add_setting(	
		'wild_business_header_tagline',
		array(
			'sanitize_callback' => 'wild_business_sanitize_hex_color',
			'default' => '#929292',
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
		$wp_customize,
			'wild_business_header_tagline',
			array(
				'section'		=> 'colors',
				'label'			=> esc_html__( 'Site tagline Color:', 'wild-business' ),
			)
		)
	);


	// Header text display setting
	$wp_customize->add_setting(	
		'wild_business_header_text_display',
		array(
			'sanitize_callback' => 'wild_business_sanitize_checkbox',
			'default' => true,
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'wild_business_header_text_display',
		array(
			'section'		=> 'title_tagline',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display Site Title and Tagline', 'wild-business' ),
		)
	);

	// Your latest posts title setting
	$wp_customize->add_setting(	
		'wild_business_your_latest_posts_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__( 'Blogs', 'wild-business' ),
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'wild_business_your_latest_posts_title',
		array(
			'section'		=> 'static_front_page',
			'label'			=> esc_html__( 'Title:', 'wild-business' ),
			'active_callback' => 'wild_business_is_latest_posts'
		)
	);

	$wp_customize->selective_refresh->add_partial( 
		'wild_business_your_latest_posts_title', 
		array(
	        'selector'            => '.home.blog #page-header .page-title',
			'render_callback'     => 'wild_business_your_latest_posts_partial_title',
    	) 
    );


	/**
	 * 
	 * Front Section
	 * 
	 */ 

	// Home sections panel
	$wp_customize->add_panel(
		'wild_business_home_panel',
		array(
			'title' => esc_html__( 'Homepage Options', 'wild-business' ),
			'priority' => 105
		)
	);

	//slider
    require get_parent_theme_file_path( '/inc/customizer/homepage/slider.php' );
	
    //service
    require get_parent_theme_file_path( '/inc/customizer/homepage/service.php' );

    //about
	require get_parent_theme_file_path( '/inc/customizer/homepage/about.php' );
	
	//team
    require get_parent_theme_file_path( '/inc/customizer/homepage/team.php' );

     //cta
    require get_parent_theme_file_path( '/inc/customizer/homepage/cta.php' ); 
	
	//recent-news
    require get_parent_theme_file_path( '/inc/customizer/homepage/recent-news.php' );  

    // theme options
	$wp_customize->add_panel(
		'wild_business_general_panel',
		array(
			'title' => esc_html__( 'Theme Options', 'wild-business' ),
			'priority' => 107
		)
	);

	require get_parent_theme_file_path( '/inc/customizer/theme-options/general-setting.php' );

	require get_parent_theme_file_path( '/inc/customizer/theme-options/layout.php' );

	require get_parent_theme_file_path( '/inc/customizer/theme-options/archive.php' );

	require get_parent_theme_file_path( '/inc/customizer/theme-options/footer.php' );

	/**
	 * Reset all settings
	 */
	// Reset settings section
	$wp_customize->add_section(
		'wild_business_reset_sections',
		array(
			'title' => esc_html__( 'Reset all', 'wild-business' ),
			'description' => esc_html__( 'Reset all settings to default.', 'wild-business' ),
			'panel' => 'wild_business_general_panel',
		)
	);

	// Reset sortable order setting
	$wp_customize->add_setting(
		'wild_business_reset_settings',
		array(
			'sanitize_callback' => 'wild_business_sanitize_checkbox',
			'default' => false,
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'wild_business_reset_settings',
		array(
			'section'		=> 'wild_business_reset_sections',
			'label'			=> esc_html__( 'Reset all settings?', 'wild-business' ),
			'type'			=> 'checkbox',
		)
	);
}
add_action( 'customize_register', 'wild_business_customize_register' );


// Sanitize Callback
require get_parent_theme_file_path( '/inc/customizer/sanitize-callback.php' );

// active Callback
require get_parent_theme_file_path( '/inc/customizer/active-callback.php' );

// Partial Refresh
require get_parent_theme_file_path( '/inc/customizer/partial-refresh.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wild_business_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wild_business_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wild_business_customize_preview_js() {
	wp_enqueue_script( 'wild-business-customizer', get_theme_file_uri( '/assets/js/customizer.js' ), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wild_business_customize_preview_js' );

/**
 * Binds JS handlers for Customizer controls.
 */
function wild_business_customize_control_js() {


	wp_enqueue_style( 'wild-business-customize-style', get_theme_file_uri( '/assets/css/customize-controls.css' ), array(), '20151215' );

	wp_enqueue_script( 'wild-business-customize-control', get_theme_file_uri( '/assets/js/customize-control.js' ), array( 'jquery', 'customize-controls' ), '20151215', true );
	$localized_data = array( 
		'refresh_msg' => esc_html__( 'Refresh the page after Save and Publish.', 'wild-business' ),
		'reset_msg' => esc_html__( 'Warning!!! This will reset all the settings. Refresh the page after Save and Publish to reset all.', 'wild-business' ),
	);

	wp_localize_script( 'wild-business-customize-control', 'localized_data', $localized_data );
}
add_action( 'customize_controls_enqueue_scripts', 'wild_business_customize_control_js' );
