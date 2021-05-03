<?php

/**
 * 
 * Template Name: Veranstaltungen
 * Template Post Type: page
 * 
 */

get_header();

?>

<main id="site-content" class="page-grid" role="main">

<div class="left-sidebar">
	<?php projekt_carousel(); ?>
</div>

<div class="main-content">

	<?php 
		$text = __('Hier kannst du lokale Veranstaltungen in deinem Quartier entdecken. So verpasst du keine Aktionen mehr in deiner Nachbarschaft und bleibst immer auf dem Laufenden.', "quartiersplattform");
		reminder_card('veranstaltungen-intro', __('Veranstaltungen in deiner Nachbarschaft','quartiersplattform'), $text );
	
		$text = "Wenn du eine Kulturveranstaltung oder eine Feier in deiner Nachbarschaft veranstaltest, kannst du sie hier veröffentlichen um mehr Besucher zu erhalten. Wenn deine Veranstaltung nur Online stattfindet, kannst du einen Livestream Link veröffentlichen.";
		no_content_card("􀉊", "Hier gibt es leider noch keine Veranstaltungen.", $text, $link_text = 'Veranstaltung erstellen', $link_url = "");
	?>
	


		<?php 
		get_template_part('components/views/veranstaltungen');
		// !!! function wenn keine veranstaltungen angezeigt werden
		?>  
		


<!-- archive veranstltungen -->
<a class="button" href="<?php echo get_post_type_archive_link( 'veranstaltungen' ); ?>"><?php _e('Archiv', 'quartiersplattform'); ?> </a>

</div>
	<div class="right-sidebar">
		<?php 

			// Projekte
			if (is_user_logged_in(  )) {
				get_template_part('components/smart-card/projekte');
				
				$text = __('Du möchtest eine Verantaltung auf deiner Quartiersplattform bewerben? Erstelle ein Projekt und poste den Termin zu deiner Veranstaltung.','quartiersplattform');
				reminder_card(__('Erstelle eine Veranstaltung','quartiersplattform'), 'Veröffentliche eine Veranstaltung', $text, '', '' );
				
				// call_to_action_card('bg_green', 'projekt-erstellen', 'Erstelle ein Projekt', 'Lege ein Projekt an, profitiere von der Community und verändere dein Quartier!' );
			}
			else {
				$text = __('Registriere dich auf deiner Quartiersplattform, um eigene Projekte, Umfragen und Veranstaltungen zu erstellen.','quartiersplattform');
				reminder_card('register', __('Mitglied werden im Quartier','quartiersplattform'), $text, __('Jetzt Registieren','quartiersplattform'), home_url( ).'/register' );
			}
			
		?>	
	</div>
	</main><!-- #site-content -->

<?php get_footer(); ?>