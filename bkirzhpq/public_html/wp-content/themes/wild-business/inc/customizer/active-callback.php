<?php
/**
 * Wild Themes 
 *
 * @package Wild Business
 * active callbacks.
 * 
 */

/*========================slider==============================*/
/**
 * Check if the slider is enabled
 */
function wild_business_if_slider_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'wild_business_slider' )->value();
}

/**
 * Check if the slider is category
 */
function wild_business_if_slider_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'wild_business_slider' )->value();
}

/**
 * Check if the slider is page
 */
function wild_business_if_slider_page( $control ) {
	return 'page' === $control->manager->get_setting( 'wild_business_slider' )->value();
}

/**
 * Check if the slider is post
 */
function wild_business_if_slider_post( $control ) {
	return 'post' === $control->manager->get_setting( 'wild_business_slider' )->value();
}

/*========================Service==============================*/
/**
 * Check if the service is enabled
 */
function wild_business_if_service_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'wild_business_service' )->value();
}

/**
 * Check if the gallery is page
 */
function wild_business_if_service_page( $control ) {
	return 'page' === $control->manager->get_setting( 'wild_business_service' )->value();
}

/*========================Team==============================*/
/**
 * Check if the team is enabled
 */
function wild_business_if_team_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'wild_business_team' )->value();
}

/**
 * Check if the gallery is page
 */
function wild_business_if_team_page( $control ) {
	return 'page' === $control->manager->get_setting( 'wild_business_team' )->value();
}

/*========================recent_news==============================*/
/**
 * Check if the recent_news is enabled
 */
function wild_business_if_recent_news_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'wild_business_recent_news' )->value();
}

/**
 * Check if the recent_news is category
 */
function wild_business_if_recent_news_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'wild_business_recent_news' )->value();
}

/**
 * Check if the recent_news is page
 */
function wild_business_if_recent_news_page( $control ) {
	return 'page' === $control->manager->get_setting( 'wild_business_recent_news' )->value();
}

/*==========================About=========================*/
/**
 * Check if the about is enabled
 */
function wild_business_if_about_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'wild_business_about' )->value();
}

/**
 * Check if the about is page
 */
function wild_business_if_about_page( $control ) {
	return 'page' === $control->manager->get_setting( 'wild_business_about' )->value();
}

/*==========================CTA=========================*/
/**
 * Check if the cta is enabled
 */
function wild_business_if_cta_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'wild_business_cta' )->value();
}

/**
 * Check if the cta is page
 */
function wild_business_if_cta_page( $control ) {
	return 'page' === $control->manager->get_setting( 'wild_business_cta' )->value();
}

/**
 * Check if custom color scheme is enabled
 */
function wild_business_if_custom_color_scheme( $control ) {
	return 'custom' === $control->manager->get_setting( 'wild_business_color_scheme' )->value();
}
