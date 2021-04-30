<?php

/**
 * 
 * Template Name: Projekte
 * Template Post Type: page
 * 
 */

get_header();

?>

<main id="site-content" class="page-grid" role="main">


	<div class="left-sidebar">

	</div>

	<div class="content">
		<?php 
			$text = 'Projekte sind der Dreh- und Angelpunkt in deinem Quartier. Erkunde das Quartiersgeschehen, finde spannende Aktionen und beteilige dich. 
			Du bist bereits Ansprechpartner in einem Lokalprojekt? Veröffentliche es und halte deine Nachbarn auf dem Laufenden.  ';
			reminder_card('projekte-intro', 'Entdecke alle Projekte aus deinem Quartier', $text );
		?>

		<?php
		
		$array = [];

		
		// get published posts
		$args_public = array(
			'post_type' => 'projekte',
			'post_status' => array('publish')    
		);
		$args_public = new WP_Query($args_public);
		while ( $args_public->have_posts() ) {
			$args_public->the_post();
			array_push($array, get_the_ID(  ) );
		}
		wp_reset_postdata();

		if (is_user_logged_in(  )) {
			// get drafts by user
			$args_private = array(
				'post_type' => 'projekte',
				'author__in' => $current_user->ID,
				'post_status' => array('pending', 'draft', 'auto-draft')    
			);
			$args_private = new WP_Query($args_private);
			while ( $args_private->have_posts() ) {
				$args_private->the_post();
				array_push($array, get_the_ID(  ) );
			}
			wp_reset_postdata();
		}

		$args4 = array(
			'post_type'=> array('projekte'), 
			'post__in' => $array,
			'post_status'=>'any', 
			'posts_per_page'=> 50,
			'orderby' => 'modified'
		);

		?>  
		
		<div class="grid-4col" data-grid>
			<?php card_list($args4);?>
		</div>
	
	</div>

	<div class="right-sidebar">
		<?php 
			// Projekte
			if (is_user_logged_in(  )) {
				get_template_part('components/smart-card/projekte');
					
			// Call to Action Card 
				// call_to_action_card('bg_green', 'projekt-erstellen', 'Erstelle ein Projekt', 'Lege ein Projekt an, profitiere von der Community und verändere dein Quartier!' );
			}
			else {
				$text = 'Registriere dich auf deiner <span class="highlight"> Quartiersplattform</span> und schöpfe dein volles Potenzial aus!<br>';
				reminder_card('register', 'Werde Mitglied in deinem Quartier', $text, 'Jetzt Registieren', home_url( ).'/register' );
			}
		?>	
	</div>

</main><!-- #site-content -->






<!-- </div> -->

<?php get_footer(); ?>