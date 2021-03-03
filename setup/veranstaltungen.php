<?php

/**
 * 
 *  Veranstaltunegn Setup
 *  
 *  1. Register Custom Post Type
 *  2. Register ACF
 * 
 */

/**
 *  --------------------------------------------------------
 *  1. Register Custom Post Type
 *  --------------------------------------------------------
 */

function cptui_register_my_cpts_veranstaltungen() {

	/**
	 * Post Type: Veranstaltungen.
	 */

	$labels = [
		"name" => __( "Veranstaltungen", "quartiersplattform" ),
		"singular_name" => __( "Veranstaltung", "quartiersplattform" ),
	];

	$args = [
		"label" => __( "Veranstaltungen", "quartiersplattform" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "veranstaltungen-archive",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "veranstaltungen", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-calendar-alt",
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "veranstaltungen", $args );
}

add_action( 'init', 'cptui_register_my_cpts_veranstaltungen' );



 /**
 *  --------------------------------------------------------
 *  2. Register ACF
 *  --------------------------------------------------------
 */

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5c5ddec3cda85',
        'title' => 'Veranstaltung',
        'fields' => array(
            array(
                'key' => 'field_5c5ddf4e0e5f5',
                'label' => 'Zeitpunkt (veraltet -> Date)',
                'name' => 'zeitpunkt',
                'type' => 'date_time_picker',
                'instructions' => 'Wann das Event started',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y g:i a',
                'return_format' => 'Y-m-d H:i:s',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_5c9f43ceef99d',
                'label' => 'Ende (Veraltet)',
                'name' => 'ende',
                'type' => 'date_time_picker',
                'instructions' => 'Wann es endet (bitte auf Stunden und Minuten achten)',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y g:i a',
                'return_format' => 'Y-m-d H:i:s',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_5fc8d0b28edb0',
                'label' => 'Beschreibung',
                'name' => 'text',
                'type' => 'textarea',
                'instructions' => 'Beschreibe deine Veranstaltung.',
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
                'key' => 'field_5fc8d15b8765b',
                'label' => 'Datum',
                'name' => 'event_date',
                'type' => 'date_picker',
                'instructions' => 'Wann wird deine Veranstaltung stattfinden?',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'F j, Y',
                'return_format' => 'Y-m-d',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_5fc8d16e8765c',
                'label' => 'Beginn',
                'name' => 'event_time',
                'type' => 'time_picker',
                'instructions' => 'Wann startet deine Veranstaltung?',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'g:i a',
                'return_format' => 'H:i:s',
            ),
            array(
                'key' => 'field_5fc8d18b8765d',
                'label' => 'Ende',
                'name' => 'event_end_time',
                'type' => 'time_picker',
                'instructions' => 'Wann endet deine Veranstaltung?',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'g:i a',
                'return_format' => 'g:i a',
            ),
            array(
                'key' => 'field_5fc8d1c4d15c8',
                'label' => 'Website',
                'name' => 'website',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5fc8d1e0d15c9',
                'label' => 'Livestream',
                'name' => 'livestream',
                'type' => 'url',
                'instructions' => 'Gib einen Link an, um deine Veranstaltung Live verfolgen zu können.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5fc8d1f4d15ca',
                'label' => 'Ticket',
                'name' => 'ticket',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5fc8d20bd15cb',
                'label' => 'Map',
                'name' => 'map',
                'type' => 'google_map',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'center_lat' => '',
                'center_lng' => '',
                'zoom' => '',
                'height' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'veranstaltungen',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
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