<?php

/**
 * 
 * Template Name: Projekte
 * Template Post Type: page
 * 
 */

get_header();

?>

<main id="site-content" role="main">
		
	<?php 
		$text = 'Projekte sind der Dreh- und Angelpunkt in deinem Quartier. Erkunde das Quartiersgeschehen, finde spannende Aktionen und beteilige dich. 
	 	Du bist bereits Ansprechpartner in einem Lokalprojekt? Veröffentliche es und halte deine Nachbarn auf dem Laufenden.  ';
		reminder_card('projekte-intro', 'Entdecke alle Projekte aus deinem Quartier', $text );
	?>

	<?php 
			$args4 = array(
			'post_type'=> array('projekte'), 
			'post_status'=>'publish', 
			'posts_per_page'=> 50,
			'orderby' => 'modified'
		);
		?>  
		
		<div class="grid-4col" data-grid>
			<?php card_list($args4);?>
		</div>


</main><!-- #site-content -->


<div class="right-sidebar">
		<?php 
			// Projekte
			if (is_user_logged_in(  )) {
				get_template_part('components/smart-card/projekte');
				
				// Call to Action Card 
				//call_to_action_card('bg_red-light', 'angebot-erstellen', 'Teile ein Angebot', 'Biete deine Hilfe an und unterstütze dein Viertel.' );
				//call_to_action_card('bg_blue-light', 'frage-erstellen', 'Frage dein Quartier', 'Was wünscht du dir in deinem Viertel? Wie können dich deine Nachbarn unterstützen?' );
				call_to_action_card('bg_green', 'projekt-erstellen', 'Erstelle ein Projekt', 'Lege ein Projekt an, profitiere von der Community und verändere dein Quartier!' );
		
			}
			else {
				$text = 'Registriere dich auf deiner <span class="highlight"> Quartiersplattform</span> und schöpfe dein volles Potenzial aus!<br>';
				reminder_card('register', 'Werde Mitglied in deinem Quartier', $text, 'Jetzt Registieren', home_url( ).'/register' );
			}
		?>	
	</div>


<!-- </div> -->

<?php get_footer(); ?>