<?php
/**
 * Template Name: Projekt 
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();



$args = array(
	'post_type'=>'projekte', 
	'post_status'=>'publish', 
	'posts_per_page'=> -1
);
query_posts( $args );

?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			// get_template_part( 'elements/card' );

			get_template_part( 'elements/card', 'projekt' );

			// get_template_part( 'template-parts/content-cover' );
		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
