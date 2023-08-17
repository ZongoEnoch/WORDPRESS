<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Wild Business
 */

// Get the content type.
$recent_news = get_theme_mod( 'wild_business_recent_news', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $recent_news ) {
	return;
}

$recent_news_title    = get_theme_mod( 'wild_business_recent_news_title', __( 'Choose Your Perfect Plan', 'wild-business') );
$recent_news_subtitle    = get_theme_mod( 'wild_business_recent_news_sub_title', __( 'Recent News', 'wild-business') );

$get_content = wild_business_get_section_content( 'recent_news', $recent_news, 6 );
?>

<div id="recent-news" class="pt">
    <div class="container">
        <div class="section-header">
            <?php if( !empty( $recent_news_subtitle ) ): ?>
                <p class="section-subtitle"><?php echo esc_html( $recent_news_subtitle ); ?></p>
            <?php endif;

            if( !empty( $recent_news_title ) ):

                ?>
            <h2 class="section-title"><?php echo esc_html( $recent_news_title ); ?></h2>
        <?php endif; ?>
    </div><!-- .section-header -->

    <div class="section-content col-3 clear">

        <?php foreach ( $get_content as $content ): ?>

            <article id="box5" class="aos_container">
                <div class="recent-news-item">
                    <div class="featured-image " >
                        <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>" alt="news"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-meta aos_content" >
                        <?php wild_business_post_author() ;

                        wild_business_posted_on( $content['id'] ); ?>
                    </div><!-- .entry-meta -->

                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                    </header>

                    <div class="entry-content">
                        <p><?php echo esc_html( wp_trim_words( $content['content'], 30 ) ); ?></p>
                    </div><!-- .entry-content -->

                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="button"><?php echo esc_html( 'Learn More','wild-business' ); ?></a>
                        </div>
                </div><!-- team-item-wrapper -->
            </article>

        <?php endforeach; ?>

    </div><!-- .section-content -->
</div><!-- .wrapper -->
</div><!-- #recent-news -->