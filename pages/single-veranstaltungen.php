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

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			// get_template_part( 'template-parts/content', get_post_type() );
			// get_template_part( 'template-parts/content-cover' );


			echo esc_url( $image_url );
			get_the_post_thumbnail_url( get_the_ID(), 'twentytwenty-fullscreen' );


			the_title( '<h1 class="entry-title">', '</h1>' );
			edit_post_link();


			// if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
				?>
		
				<div class="comments-wrapper section-inner">
		
					<?php comments_template(); ?>
		
				</div><!-- .comments-wrapper -->
		
				<?php
			// }

		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
