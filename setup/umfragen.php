<?php

/**
 * 
 *  Umfragen Setup
 * 
 *  1. Page Umfragen Form
 *  2. Umfragen Post type
 *  3. ACF
 * 
 */


/**
 *  --------------------------------------------------------
 *  1. Page Umfragen Form
 *  --------------------------------------------------------
 */


add_action( 'after_setup_theme', 'create_form_umfragen' );
function create_form_umfragen(){

    $title = 'Umfrage erstellen';
    $slug = 'umfrage-erstellen';
    $page_content = ''; // your page content here
    $post_type = 'page';

    $page_args = array(
        'post_type' => $post_type,
        'post_title' => $title,
        'post_content' => $page_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => $slug
	);
	
	if ( ! function_exists( 'post_exists' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/post.php' );
	}

    if(post_exists($title) === 0){
        $page_id = wp_insert_post($page_args);
    }

}

/**
 *  --------------------------------------------------------
 *  2. Umfragen Post type
 *  --------------------------------------------------------
 */


function cptui_register_my_cpts_umfragen() {

	$labels = [
		"name" => __( "Umfragen", "quartiersplattform" ),
		"singular_name" => __( "Umfrage", "quartiersplattform" ),
	];

	$args = [
		"label" => __( "Umfragen", "quartiersplattform" ),
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
		"rewrite" => [ "slug" => "umfragen", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-chart-bar",
		"supports" => [ "title", "editor", "comments", "author" ],
	];

	register_post_type( "umfragen", $args );
}
add_action( 'init', 'cptui_register_my_cpts_umfragen' );


/**
 *  --------------------------------------------------------
 *  3. ACF
 *  --------------------------------------------------------
 */

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_601855a265b19',
        'title' => 'Poll',
        'fields' => array(
            array(
                'key' => 'field_601855a9aa4be',
                'label' => 'Beschreibung',
                'name' => 'text',
                'type' => 'textarea',
                'instructions' => 'Beschreibe, worum es in deiner Umfrage geht.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_601855baaa4bf',
                'label' => 'Fragen',
                'name' => 'questions',
                'type' => 'repeater',
                'instructions' => 'Stelle die Auswahlmöglichkeiten für deine Umfrage ein.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_601855d3aa4c0',
                'min' => 2,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_601855d3aa4c0',
                        'label' => 'Frage',
                        'name' => 'item',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;