<?php
/**
 * Template for displaying search forms
 *
 * @package Wild Themess
 * @subpackage Wild Business
 * @since Wild Business 1.0.0
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'wild-business' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'wild-business' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label', 'wild-business' ) ?>" />
    </label>
    <button type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button', 'wild-business' ) ?>"><?php echo wild_business_get_svg( array( 'icon' => 'search' ) );?></button>
</form>