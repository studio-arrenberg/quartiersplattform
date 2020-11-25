<?php
/**
 * Template Name: Projekt [Default]
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

			// prep image url
			$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), 'preview_l' ) : '';

			if ( $image_url ) {
				$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
				$cover_header_classes = ' bg-image';
			}

			?>


    <div class="single-header">


        <!-- Bild -->
        <img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />

        <!-- post title -->
        <div class="single-header-content">
        <h1><?php the_title(); ?></h1>
        <h4><?php if (is_admin()) echo get_the_author(); ?></h4> 
        
        <p><?php // the_field('kurzbeschreibung'); ?></p>

        </div>

        <!-- projekt / akteur -->
        <!-- not ready yet -->

        <!-- Bild -->



    </div>



    <!-- ACF test -->
    <p><?php the_field('begin'); ?></p>
    <p><?php the_field('abschluss'); ?></p>


    <!-- Projektbeschreibung -->
    <!-- not ready yet -->
    <div class="single-content">
        <p></p>
    </div>

    <!-- Anstehende Veranstaltungen -->
    <!-- not ready yet -->

    <!-- Projektverlauf -->
    <!-- not ready yet -->

    <!-- Gutenberg Editor Content -->

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



    <!-- Backend edit link -->
    <?php edit_post_link(); ?>


    <!-- Projekt Teilen -->
    <!-- not ready yet -->

    <!-- Team -->
    <!-- not ready yet -->

    <!-- Map -->
    <!-- not ready yet -->

    <!-- Kontakt -->
    <!-- not ready yet -->

    <!-- kommentare -->
    <?php			
		if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
	?>

    <div class="comments-wrapper">

        <?php comments_template('', true); ?>

    </div><!-- .comments-wrapper -->

    <?php
			}

		}
	}

	?>

</main><!-- #site-content -->


<?php get_footer(); ?>