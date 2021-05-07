<?php

/**
 * 
 * Template Name: Anmerkungen
 * Template Post Type: page
 * 
 */
acf_form_head();
get_header();

?>

<main id="site-content" class="page-grid" role="main">


	<div class="left-sidebar">

        <?php projekt_carousel(); ?>

	</div>

	<div class="content">

		<?php 
			$text = __('Teile uns dein Feedback oder Anregungen zur Quartiersplattform. Funktionert etwas nicht oder hast du eine Idee zur weiterentwicklung.','quartiersplattform');
			reminder_card('', __('Feedback zur Quartiersplattform','quartiersplattform'), $text );
		?>


        <!-- <h2>Feedback zur Quartiersplattform</h2> -->
        <!-- <p>Teile uns dein Feedback oder Anmerkunge zur Quartiersplattform.</p> -->
        <br>


        <br>


                <div class="grid-4col" data-grid>
                    <?php get_template_part('elements/card-anmerkungen');?>
                </div>
				<a class="button" href="<?php echo home_url( ).'/feedback'; ?>">Zu allen Vorschlägen</a>

				<div class="comments-wrapper">
            <?php comments_template('', true); ?>
        </div><!-- .comments-wrapper -->
	
	</div>

	<div class="right-sidebar">
		<?php 
			// Projekte
			if (is_user_logged_in(  )) {
				get_template_part('components/smart-card/projekte');
					
			}
			else {
				$text = __('Registriere dich auf deiner Quartiersplattform, um eigene Projekte, Umfragen und Veranstaltungen zu erstellen.','quartiersplattform');
				reminder_card('register', __('Mitglied werden im Quartier','quartiersplattform'), $text, __('Jetzt Registieren','quartiersplattform'), home_url( ).'/register' );
			}
		?>	
	</div>

</main><!-- #site-content -->

<!-- </div> -->

<?php get_footer(); ?>