<?php

/**
 * 
 *  Fragen Setup
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

function cptui_register_my_cpts_fragen() {

	/**
	 * Post Type: Fragen.
	 */

	$labels = [
		"name" => __( "Fragen", "quartiersplattform" ),
		"singular_name" => __( "Frage", "quartiersplattform" ),
	];

	$args = [
		"label" => __( "Fragen", "quartiersplattform" ),
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
		"rewrite" => [ "slug" => "fragen", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-chat",
		"supports" => [ "title", "editor", "thumbnail", "comments", "author" ],
	];

	register_post_type( "fragen", $args );
}

add_action( 'init', 'cptui_register_my_cpts_fragen' );


 /**
 *  --------------------------------------------------------
 *  2. Register ACF
 *  --------------------------------------------------------
 */


if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5fcf56cd99219',
        'title' => 'Fragen',
        'fields' => array(
            array(
                'key' => 'field_5fcf56cd9e317',
                'label' => 'Deine Frage',
                'name' => 'text',
                'type' => 'textarea',
                'instructions' => 'Beschreibe deine Frage.',
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
                'key' => 'field_5fcf56cd9e356',
                'label' => 'Emoji',
                'name' => 'emoji',
                'type' => 'text',
                'instructions' => 'Erkläre deine Frage mit einem Emoji.',
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
                'maxlength' => 5,
            ),
            array(
                'key' => 'field_5fff09427f380',
                'label' => 'Zeitraum',
                'name' => 'duration',
                'type' => 'button_group',
                'instructions' => 'Wie lange soll deine Frage sichtbar sein?',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    3600 => '<span>Stunde</span>',
                    86400 => '<span>Tag</span>',
                    604800 => '<span>Woche</span>',
                ),
                'allow_null' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'fragen',
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
