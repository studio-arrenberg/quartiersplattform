<?php
/**
 * Template Name: Projekt Form
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">
<div class="card-container card-container__center card-container__large ">
        <div class="card bg_red">
            <div class="content white-text">
                <h3 class="card-title-large">
                    Veröffentliche dein Projekt auf der Quartiersplattform 
                </h3>
                <p class="preview-text-large">
					Profitiere von der Community, berichte hier über Neuigkeiten aus deinem Projekt und hole Feedback ein.
                </p>
            </div>
        </div>
	</div>
	
	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content-cover' );
		}
	}

	?>

</main><!-- #site-content -->


<?php get_footer(); ?>
