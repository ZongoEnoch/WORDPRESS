<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wild Business
 */

if ( is_archive() || wild_business_is_latest_posts() || is_404() || is_search() ) {
	$archive_sidebar = get_theme_mod( 'wild_business_archive_sidebar', 'right' ); 
	if ( 'no' === $archive_sidebar ) {
		return;
	}
} elseif ( is_single() ) {
    $wild_business_post_sidebar_meta = get_post_meta( get_the_ID(), 'wild-business-select-sidebar', true );
	$global_post_sidebar = get_theme_mod( 'wild_business_global_post_layout', 'right' ); 

	if ( ! empty( $wild_business_post_sidebar_meta ) && ( 'no' === $wild_business_post_sidebar_meta ) ) {
		return;
	} elseif ( empty( $wild_business_post_sidebar_meta ) && 'no' === $global_post_sidebar ) {
		return;
	}
} elseif ( wild_business_is_frontpage_blog() || is_page() ) {
	if ( wild_business_is_frontpage_blog() ) {
		$page_id = get_option( 'page_for_posts' );
	} else {
		$page_id = get_the_ID();
	}
	
    $wild_business_page_sidebar_meta = get_post_meta( $page_id, 'wild-business-select-sidebar', true );
	$global_page_sidebar = get_theme_mod( 'wild_business_global_page_layout', 'right' ); 

	if ( ! empty( $wild_business_page_sidebar_meta ) && ( 'no' === $wild_business_page_sidebar_meta ) ) {
		return;
	} elseif ( empty( $wild_business_page_sidebar_meta ) && 'no' === $global_page_sidebar ) {
		return;
	}
}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
