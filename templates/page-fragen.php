<?php 
/* 
*
* Template Name: Frage erstellen
*
*/
acf_form_head();
get_header();
?>

<main id="site-content" role="main">

<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			//Fragen (acf)
 get_template_part('components/fragen'); 
		}
	}

?>

</div>
</main><!-- #site-content -->

<?php get_footer(); ?>