<?php
/**
 * Template Name: Anmerkung [Default]
 * Template Post Type: projekte
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" class="anmerkungen" role="main">


    <?php

if ( have_posts() ) {

    while ( have_posts() ) {
        the_post();

    ?>

<div class="card-container  card-container__center card-container__large ">
    
    <?php get_template_part('elements/card', get_post_type()); ?>

    <!-- author -->

    <?php edit_post_link(); ?>

    <!-- Gutenberg Editor Content -->
    <div class="gutenberg-content">
        <?php
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

        <div class="comments-wrapper section-inner">

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