<?php 
/* 
*
* Template Name: Angebot erstellen
*
*/
get_header();
?>

<main id="site-content" role="main">

<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			//Angebote (acf)
 get_template_part('components/angebote'); 
		}
	}

?>

</div>
</main><!-- #site-content -->

<?php get_footer(); ?>