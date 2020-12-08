<?php 
/* 
*
* Template Name: Angebot erstellen
*
*/
acf_form_head();
get_header();
?>

<main id="single-content" role="main">
    <div class="card-container card-container__center card-container__large ">
        <div class="card bg_red">
            <div class="content white-text">
                <h3 class="card-title-large">
                    Teile ein Angebot
                </h3>
                <p class="preview-text-large">
                    Biete deine Hilfe an und unterstütze dein Viertel.
                </p>
            </div>
        </div>
    </div>
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