<?php
/**
 * Template Name: Veranstaltungen
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main" >

	<?php 

$args3 = array(
	'post_type'=>'veranstaltungen', 
	'post_status'=>'publish', 
	'posts_per_page'=> -1,
	'meta_key' => 'event_date',
	// 'meta_value' => '',
	// 'meta_compare' => 'NOT EXISTS',

	// 'meta_value' => '',
	// 'meta_compare' => '=',

	'meta_query' => array(
        array(
            'key'     => 'event_date',
            'value'   => '',
            'compare' => '='
        )
    )
	
	// 'meta_value' => '',
	// 'meta_compare' => 'NOT EXISTS',
);

$query2 = new WP_Query($args3);

while ( $query2->have_posts() ) {
	$query2->the_post();


	echo " date: ".get_field('event_date')." time: ".get_field('event_time')."<br>";
	// update_post_meta(get_the_id(), 'event_date', date("Y-m-d",strtotime(get_field('zeitpunkt'))));
	// update_post_meta(get_the_id(), 'event_time', date("H:i:s",strtotime(get_field('zeitpunkt'))));

}
wp_reset_postdata();

?>

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

	<!-- veranstaltung erstellen -->
	<!-- not ready yet -->
	<!-- <h3>Veranstaltung Erstellen</h3> -->

	<!-- mehr veranstaltungen (offset) -->
	<?php 
	// veranstaltung list
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