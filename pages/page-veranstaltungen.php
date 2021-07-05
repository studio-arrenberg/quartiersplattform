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

		get_template_part('components/views/veranstaltungen');
	?>  
	


<!-- archive Veranstaltungen -->
<a class="button" href="<?php echo get_post_type_archive_link( 'veranstaltungen' ); ?>"><?php _e('Archiv', 'quartiersplattform'); ?> </a>

</div>
	<div class="right-sidebar">
	
	</div>
	</main><!-- #site-content -->

<?php get_footer(); ?>