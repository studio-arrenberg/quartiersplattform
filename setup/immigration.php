<?php

/**
 * 
 *  Imigration Setup
 * 
 *  1. Poll -> Umfragen Post Type Naming
 * 
 */


/**
 *  --------------------------------------------------------
 *  1. Poll -> Umfragen Post Type Naming
 *  --------------------------------------------------------
 */


function update_poll_naming() {

    global $wpdb;    
    $result = $wpdb->get_results( "UPDATE `wp_posts` SET  `post_type` =  'umfragen' WHERE `post_type` = 'poll'");

}
add_action( 'init', 'update_poll_naming' );