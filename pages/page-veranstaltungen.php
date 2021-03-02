<?php

/**
 * 
 * Template Name: Veranstaltungen
 * Template Post Type: page
 * 
 */

get_header();

?>

<main id="site-content" role="main" >

    <?php
	// featured veranstaltungen
	$args3 = array(
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

	slider($args3,'square_card', '2','true'); 
	?>

	<div class="card-container ">

    <?php 
	// veranstaltung list
	$args4 = array(
		'post_type'=>'veranstaltungen', 
		'post_status'=>'publish', 
		'posts_per_page'=> 10, 
		'meta_key' => 'event_date',
		'orderby' => 'meta_value',
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
	card_list($args4);
	?>

	<?php 
	// mehr veranstaltungen (offset)
	$args5 = array(
		'post_type'=>'veranstaltungen', 
		'post_status'=>'publish', 
		'posts_per_page'=> 10, 
		'meta_key' => 'event_date',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'offset' => '10', 
		'meta_query' => array(
			array(
				'key' => 'event_date', 
				'value' => date("Y-m-d"),
				'compare' => '>=', 
				'type' => 'DATE'
			)
		)
	);
	card_list($args5);
	?>

</div>

<!-- archive veranstltungen -->
<a class="button" href="<?php echo get_post_type_archive_link( 'veranstaltungen' ); ?>">Archiv</a>

</main><!-- #site-content -->


<?php get_footer(); ?>