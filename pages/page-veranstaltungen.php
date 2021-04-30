<?php

/**
 * 
 * Template Name: Veranstaltungen
 * Template Post Type: page
 * 
 */

get_header();

?>

<main id="site-content" role="main">
		
	<?php 
		$text = __('Entecke lokale Veranstaltungen in deinem Quartier. Hier findest du Kulturveranstaltungen und Aktionen von Projekten in deiner Nachbarschaft.', "quartiersplattform");
		reminder_card('veranstaltungen-intro', 'Veranstaltungen in deinem Viertel', $text );
	?>

	
		<?php 
		get_template_part('components/views/veranstaltungen');
		// !!! function wenn keine veranstaltungen angezeigt werden
		?>  
		


</div>

<!-- archive veranstltungen -->
<a class="button" href="<?php echo get_post_type_archive_link( 'veranstaltungen' ); ?>">Archiv</a>

</main><!-- #site-content -->
	<div class="right-sidebar">
		<?php 

			projekt_carousel();

			// Projekte
			if (is_user_logged_in(  )) {
				get_template_part('components/smart-card/projekte');
				
				$text = 'Du möchtest eine Verantaltung auf deiner Quartiersplattform bewerben? Erstelle ein Projekt und poste den Termin zu deiner Veranstaltung. ';
				reminder_card('ErstelleEineVeranstaltung', 'Veröffentliche deine Veranstaltung', $text, '', '' );
				
				// call_to_action_card('bg_green', 'projekt-erstellen', 'Erstelle ein Projekt', 'Lege ein Projekt an, profitiere von der Community und verändere dein Quartier!' );
				
			}
			else {
				$text = 'Registriere dich auf deiner Quartiersplattform und schöpfe dein volles Potenzial aus!';
				reminder_card('register', 'Werde Mitglied in deinem Quartier', $text, 'Jetzt Registieren', home_url( ).'/register' );
			
			}
			
		?>	
	</div>
<?php get_footer(); ?>