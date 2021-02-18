<?php

/**
 * 	Setup File
 * 	Fired on the initialization of WordPress
 * 
 * 
 * 
 */


# CPT + TAX for SDGs 
function cptui_register_my_cpts_SDG() {

	$labels = [
		"name" => __( "SDGs", "quartiersplattform" ),
		"singular_name" => __( "SDG", "quartiersplattform" ),
	];

	$args = [
		"label" => __( "SDGs", "quartiersplattform" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "sdg", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-aside",
		"supports" => [ "title", "editor" ],
	];

	register_post_type( "poll", $args );

    $labels = [
		"name" => __( "SDGs", "quartiersplattform" ),
		"singular_name" => __( "SDG", "quartiersplattform" ),
	];

	$args = [
		"label" => __( "SDG", "quartiersplattform" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'sdg', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "sdg",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
			];
	// register_taxonomy( "sdg", [ "sdg" ], $args );


    
}
add_action( 'init', 'cptui_register_my_cpts_SDG' );





?>