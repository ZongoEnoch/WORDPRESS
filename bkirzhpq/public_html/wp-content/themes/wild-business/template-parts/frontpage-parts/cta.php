<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Wild Business
 */

// Get the content type.
$cta = get_theme_mod( 'wild_business_cta', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $cta ) {
    return;
}

$get_content = [];
$sub_title    = get_theme_mod( 'wild_business_cta_sub_title', __( 'GET SOLUTIONS FAST', 'wild-business') ) ;
$button    = get_theme_mod( 'wild_business_cta_btn', __( 'Get a Quote here', 'wild-business') ) ;
$get_content = wild_business_get_section_content( 'cta', $cta, 1  );


?>
<?php foreach ($get_content as $content): ?>


<div id="call-to-action" class="pt" style="background-image:url('<?php echo esc_url( get_theme_mod( 'wild_business_cta_bg_image' ) ); ?>')">
    <div class="container">
        <div id="box5" class="aos_container">
            <div class="aos_content">
                <div class="section-header">
                    <?php if( !empty( $sub_title ) ): ?>
                        <p class="section-subtitle"><?php echo esc_html( $sub_title ); ?></p>
                    <?php endif; ?>
                        <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                    </div><!-- .section-header -->

                    <div class="section-content">
                        <?php if( !empty( $button ) ): ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ) ?>" class="button"><?php echo esc_html( $button ); ?></a>
                        </div><!-- .read-more -->
                    <?php endif; ?>
                </div><!-- .section-content -->
            </div>
        </div>
        
    </div> <!-- .container -->
</div><!-- #cta -->
<?php endforeach; ?>