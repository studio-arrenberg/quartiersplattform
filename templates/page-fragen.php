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
    <div class="card-container card-container__center card-container__large ">
        <div class="card bg_blue">
            <div class="content white-text">
                <h3 class="card-title-large">
                    Stelle eine Frage an dein Quartier!
                </h3>
                <p class="preview-text-large">
                    Was wünscht du dir in deinem Viertel? 
                </p>
            </div>
        </div>
    </div>
    <?php

	// if ( have_posts() ) {

	// 	while ( have_posts() ) {
	// 		the_post();

			//Angebote (acf)
            get_template_part('components/fragen'); 
	// 	}
	// }

?>

    </div>
</main><!-- #site-content -->

<?php  get_footer(); ?>