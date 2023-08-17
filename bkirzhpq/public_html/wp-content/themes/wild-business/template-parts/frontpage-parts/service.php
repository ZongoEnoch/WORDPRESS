<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Wild Business
 */

// Get the content type.
$service = get_theme_mod( 'wild_business_service', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $service ) {
	return;
}

$service_title    = get_theme_mod( 'wild_business_service_title', __( 'Choose Your Perfect Plan', 'wild-business') );
$service_subtitle    = get_theme_mod( 'wild_business_service_sub_title', __( 'Our Services', 'wild-business') );

$get_content = wild_business_get_section_content( 'service', $service, 6 );
?>

<div id="our-services" class="pt padding"  >
    <div class="container">
        <div class="section-header" >
            <?php if( !empty( $service_subtitle ) ): ?>
                <p class="section-subtitle"><?php echo esc_html( $service_subtitle ); ?></p>
            <?php endif;

            if( !empty( $service_title ) ):

                ?>
            <h2 class="section-title"><?php echo esc_html( $service_title ); ?></h2>
            <?php endif; ?>
        </div><!-- .section-header -->

    <div class="col-3 clear" >

        <?php foreach ( $get_content as $content ): ?>
            <article>
                <div class="services-wrap">
                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </header>

                        <div class="entry-content">
                            <p><?php echo esc_html( wp_trim_words( $content['content'], 30 ) ); ?></p>
                        </div><!-- .entry-content -->
                    </div><!-- .entry-container -->
                </div><!-- .services-wrap -->
            </article>
        <?php endforeach; ?>

    </div><!-- .section-content -->
</div><!-- .wrapper -->
</div><!-- #recent-news -->