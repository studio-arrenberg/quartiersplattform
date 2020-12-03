<?php
/**
 * Template Name: Veranstaltung [Default]
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
			$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), '' ) : '';

			if ( $image_url ) {
				$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
				$cover_header_classes = ' bg-image';
			}

			?>


    <div class="single-header">
        <!-- post title -->
        <div class="single-header-content">
            <h1><?php the_title(); ?></h1>
            <h3><?php if (is_admin()) echo get_the_author_meta( 'display_name', $author_id );  ?> <span class="date"><?php echo wp_date('j. F G:i', strtotime(get_field('zeitpunkt'))); ?></span> </h3>
        </div>

        <!-- projekt / akteur -->
        <!-- not ready yet -->

        <!-- Bild -->
        <img class="single-header-image"src="<?php echo esc_url( $image_url ) ?>" />


    </div>
    <!-- Eventtext felder gibt es noch nicht -->
    <div class="single-content">
        <!-- not ready yet -->
    </div>
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


    <!-- calendar download -->
    <!-- not ready yet -->
    <?php calendar_download($post); ?>
    <?php edit_post_link(); ?>

    <!-- card: projekt / akteur -->
    <!-- not ready yet -->

    <!-- map: adresse -->
    <!-- not ready yet -->

    <!-- cards: weitere veranstaltungen -->
    <!-- not ready yet -->


    <?php			

		}
	}

	?>

</main><!-- #site-content -->


<?php get_footer(); ?>