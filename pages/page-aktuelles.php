<?php

/**
 * 
 * Template Name: Aktuelles
 * Template Post Type: page
 * 
 */


// redirect before acf_form_head
wp_maintenance_mode();

// acf_form_head(); // before wp header !important!
get_header();

?>


<main id="site-content" role="main" data-track-content>

	<?php
		$text = __('Hier findest du alle Nachrichten, Umfragen und Veranstaltungen in deinem Quartier. Lerne die Menschen in deiner Nachbarschaft und ihre Projekte kennen oder erstelle selbst ein eigenes Projekt!', "quartiersplattform");
		reminder_card('helloss', 'Neuigkeiten und Projektupdates', $text );
		// 'Impressum', home_url( ).'/impressum'
	?>


	<?php 
		$args4 = array(
		'post_type'=> array('veranstaltungen', 'nachrichten', 'projekte', 'angebote', 'fragen', 'umfragen'), 
		'post_status'=>'publish', 
		'posts_per_page'=> 12,
		'orderby' => 'modified'
	);
	?>  
	
	<div class="grid" data-grid>
		<?php set_query_var( 'additional_info', true )?>
		<?php card_list($args4);?>
    </div>

	
</main><!-- #site-content -->

<div class="right-sidebar">
	<?php 
		// Projekte
		if ( is_user_logged_in( ) ) {

			get_template_part('components/smart-card/projekte');
			
			// Call to Action Card 
			call_to_action_card('bg_green', 'projekt-erstellen', 'Erstelle ein Projekt', 'Lege ein Projekt an, profitiere von der Community und verändere dein Quartier!' );
	
		}
		else {
			$text = 'Registriere dich auf deiner <span class="highlight"> Quartiersplattform</span> und schöpfe dein volles Potenzial aus!<br>';
			reminder_card('register', 'Werde Mitglied in deinem Quartier', $text, 'Jetzt Registieren', home_url( ).'/register' );
		}
	?>	
</div>

<?php get_footer(); ?>