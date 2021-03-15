<?php 
/* 
*
* Template Name: Blank / Leer 
*
*/
get_header();
?>

<main id="site-content" role="main">

<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content-blank' );
		}
	}

?>

</div>
</main><!-- #site-content -->

<?php get_footer(); ?>



