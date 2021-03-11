<?php

/**
 * 
 *  Angebote Setup
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


function cptui_register_my_cpts_angebote() {

	/**
	 * Post Type: Angebote.
	 */

	$labels = [
		"name" => __( "Angebote", "quartiersplattform" ),
		"singular_name" => __( "Angebot", "quartiersplattform" ),
	];

	$args = [
		"label" => __( "Angebote", "quartiersplattform" ),
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
		"rewrite" => [ "slug" => "angebote", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-heart",
		"supports" => [ "title", "editor", "thumbnail", "comments", "author" ],
	];

	register_post_type( "angebote", $args );
}

add_action( 'init', 'cptui_register_my_cpts_angebote' );



/**
 *  --------------------------------------------------------
 *  2. Register ACF
 *  --------------------------------------------------------
 */

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5fcf55e0af4db',
        'title' => 'Angebote',
        'fields' => array(
            array(
                'key' => 'field_5fcf55f35b575',
                'label' => 'Dein Angebot',
                'name' => 'text',
                'type' => 'textarea',
                'instructions' => 'Beschreibe dein Angebot für das Quartier.',
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
                'new_lines' => '',
            ),
            array(
                'key' => 'field_5fcf563d5b576',
                'label' => 'Emoji',
                'name' => 'emoji',
                'type' => 'text',
                'instructions' => 'Erkläre dein Projekt mit einem Emoji.',
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
                'key' => 'field_5fcf56935b578',
                'label' => 'Zeitraum',
                'name' => 'duration',
                'type' => 'button_group',
                'instructions' => 'Lege fest, wie lange dein Angebot gültig sein wird.',
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
            array(
                'key' => 'field_60088e9aaec9f',
                'label' => 'Telefonnummer',
                'name' => 'phone',
                'type' => 'text',
                'instructions' => 'Gib deine Telefonnummer, damit du kontaktiert werden kannst. Wenn du nicht Angemeldet bist wäre dein Name auch wichtig.',
                'required' => 0,
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
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'angebote',
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