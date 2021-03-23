<?php

/**
 * 
 * Template Name: Anmerkung [Default]
 * Template Post Type: projekte
 * 
 */

get_header();

?>

<main id="site-content" role="main">

    <?php

    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();

    ?>

    <div class="card-container card-container__center card-container__large ">

        <?php get_template_part('elements/card', get_post_type()); ?>

    </div>


    <?php author_card(); ?>

    <?php edit_post_link(); ?>

    <div class="gutenberg-content">
        <?php
            // Gutenberg Editor Content
            if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
                the_excerpt();
            } else {
                the_content( __( 'Continue reading', 'twentytwenty' ) );
            }
        ?>
    </div>

    <!-- kommentare -->
    <?php			
    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
    ?>

        <div class="comments-wrapper">
            <?php comments_template('', true); ?>
        </div><!-- .comments-wrapper -->

    </div>

    <?php			
        }
    }
}

?>


</main><!-- #site-content -->

<?php get_footer(); ?>