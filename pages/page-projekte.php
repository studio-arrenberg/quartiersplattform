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
	<?php projekt_carousel(); ?>
</div>

	<div class="main-content">
		<?php 
			$text = __('Projekte sind der Dreh- und Angelpunkt in deinem Quartier. Erkunde das Quartiersgeschehen, finde spannende Aktionen und beteilige dich. 
			Du bist bereits Ansprechpartner in einem Lokalprojekt? Veröffentliche es und halte deine Nachbarn auf dem Laufenden.  ','quartiersplattform');
			reminder_card('projekte-intro', __('Entdecke alle Projekte aus deinem Quartier','quartiersplattform'), $text );
		?>

		<?php
		
		// !!! function to list all projects for user (save 30 lines ;))
		$array = [];
		// get published posts
		$args_public = array(
			'post_type' => 'projekte',
			'post_status' => array('publish'),
			'posts_per_page'=> -1,   
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
				'post_status' => array('pending', 'draft', 'auto-draft'),
				'posts_per_page'=> -1,
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
			'post_status'=> 'any', 
			'posts_per_page'=> -1,
			'orderby' => 'modified'
		);

		if (count_query($args4) && $array) {

			?>

			<div class="grid-4col" data-grid>
				<?php card_list($args4);?>
			</div>

			<?php 

		}
		else {

			$text = __("Auf der Quartiersplattform wurden bisher keine Projekte veröffentlicht. Du kannst selber aktiv werden und dein erstes eigenes Projekt anlegen.",'quartiersplattform');
    		no_content_card("doc-richtext", __("Es wurde noch keine Projekte veröffentlicht",'quartiersplattform'), $text, $link_text = 'Projekt erstellen', $link_url = get_site_url().'/projekt-erstellen');

		}

		?>  
		
	
	</div>


</main><!-- #site-content -->

<!-- </div> -->

<?php get_footer(); ?>