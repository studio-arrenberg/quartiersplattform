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

<main id="site-content" class="single" role="main">

    <?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

	    ?>


    <div class="single-header">
        <!-- post title -->
        <h1><?php the_title(); ?></h1>
        <h4>Status <i>Release</i></h4>

        <p><?php the_field('text'); ?></p>

    </div>

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
    <?php			

		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>