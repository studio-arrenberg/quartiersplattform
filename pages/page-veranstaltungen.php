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
		$args = array(
			'post_type'=>'veranstaltungen', 
			'post_status'=>'publish', 
			'posts_per_page'=> 4,
			'meta_key' => 'event_date',
			'orderby' => 'rand',
			'order' => 'ASC',
			'offset' => '0', 
			'meta_query' => array(
				array(
					'key' => 'event_date', 
					'value' => date("Y-m-d"),
					'compare' => '>=', 
					'type' => 'DATE'
				)
			)
		);
		?>  
		
		<div class="grid-2col" data-grid>
			<?php card_list($args);?>
		</div>




</div>

<!-- archive veranstltungen -->
<a class="button" href="<?php echo get_post_type_archive_link( 'veranstaltungen' ); ?>">Archiv</a>

</main><!-- #site-content -->


<?php get_footer(); ?>