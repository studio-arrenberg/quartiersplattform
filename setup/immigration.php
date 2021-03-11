<?php

/**
 * 
 *  Imigration Setup
 *  
 *  ~~ reverse order ~~
 * 	1. Veranstaltungen rebuild datetime field
 *  2. Poll -> Umfragen Post Type Naming
 * 
 */


/**
 *  --------------------------------------------------------
 *  2. Poll -> Umfragen Post Type Naming
 *  --------------------------------------------------------
 */


function update_poll_naming() {

    global $wpdb;   
	$table = $wpdb->prefix."posts";
    $result = $wpdb->get_results( "UPDATE `$table` SET  `post_type` =  'umfragen' WHERE `post_type` = 'poll'");

}
add_action( 'init', 'update_poll_naming' );


/**
 *  --------------------------------------------------------
 *  1. Veranstaltungen rebuild datetime field
 *  --------------------------------------------------------
 */


# Veranstaltungen rebuild datetime field
// function veranstaltungen_field_zeitpunkt() {
		
// 	$args3 = array(
// 		'post_type'=>'veranstaltungen', 
// 		'post_status'=>'publish', 
// 		'posts_per_page'=> -1,
// 		'meta_query' => array(
// 			'relation' => 'OR',
// 			array(
// 				'key' => 'event_date',
// 				'value' => 'No',
// 				'compare' => 'LIKE'
// 			),
// 			array(
// 				'key' => 'event_date',
// 				'compare' => 'NOT EXISTS'
// 			)
// 		)
// 	);

// 	$query2 = new WP_Query($args3);

// 	while ( $query2->have_posts() ) {
// 		$query2->the_post();

// 		update_post_meta(get_the_id(), 'event_date', date("Y-m-d",strtotime(get_field('zeitpunkt'))));
// 		update_post_meta(get_the_id(), 'event_time', date("H:i:s",strtotime(get_field('zeitpunkt'))));
// 		update_post_meta(get_the_id(), 'event_end_time', date("H:i:s",strtotime(get_field('ende'))));

// 	}
// 	wp_reset_postdata();

// }
// add_action( 'init', 'veranstaltungen_field_zeitpunkt' );