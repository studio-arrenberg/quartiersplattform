<?php

/**
 * 
 *  Nachrichten Setup
 * 
 *  1. Register Post Type
 *  2. Register ACF
 * 
 */


/**
 *  --------------------------------------------------------
 *  1. Register Post Type
 *  --------------------------------------------------------
 */

function cptui_register_my_cpts_nachrichten() {

	/**
	 * Post Type: Nachrichten.
	 */

	$labels = [
		"name" => __( "Nachrichten", "quartiersplattform" ),
		"singular_name" => __( "Nachricht", "quartiersplattform" ),
	];

	$args = [
		"label" => __( "Nachrichten", "quartiersplattform" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "nachrichten-archive",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "nachrichten", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-aside",
		"supports" => [ "title", "editor", "thumbnail", "comments", "comments", " author" ],
	];

	register_post_type( "nachrichten", $args );
}

add_action( 'init', 'cptui_register_my_cpts_nachrichten' );



 /**
 *  --------------------------------------------------------
 *  2. Register ACF
 *  --------------------------------------------------------
 */

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5c5de02092e76',
        'title' => 'Nachrichten',
        'fields' => array(
            array(
                'key' => 'field_5fc646e907fc1',
                'label' => 'Deine Nachricht für dein Projekt',
                'name' => 'text',
                'type' => 'textarea',
                'instructions' => 'Berichte, was es neues in deinem Projekt gibt.',
                'required' => 1,
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
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_601420c25b316',
                'label' => 'Bild',
                'name' => '_thumbnail_id',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'nachrichten',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'permalink',
            1 => 'the_content',
            2 => 'excerpt',
            3 => 'discussion',
            4 => 'comments',
            5 => 'revisions',
            6 => 'slug',
            7 => 'author',
            8 => 'format',
            9 => 'page_attributes',
            10 => 'featured_image',
            11 => 'categories',
            12 => 'tags',
            13 => 'send-trackbacks',
        ),
        'active' => true,
        'description' => '',
    ));
    
    endif;