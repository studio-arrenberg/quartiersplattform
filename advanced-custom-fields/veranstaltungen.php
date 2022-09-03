
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
        'title' => __('Veranstaltung','quartiersplattform'),
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
                'label' => __('Beschreibung','quartiersplattform'),
                'name' => 'text',
                'type' => 'textarea',
                'instructions' => __('Worum geht es bei deiner Veranstaltung?','quartiersplattform'),
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
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_5fc8d15b8765b',
                'label' => __('Datum','quartiersplattform'),
                'name' => 'event_date',
                'type' => 'date_picker',
                'instructions' => __('Wann wird deine Veranstaltung stattfinden/beginnen?','quartiersplattform'),
                'required' => 1,
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
                'label' => __('Beginn','quartiersplattform'),
                'name' => 'event_time',
                'type' => 'time_picker',
                'instructions' => __('Wann startet deine Veranstaltung?','quartiersplattform'),
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                // 'display_format' => 'g:i',
                'display_format' => 'H:i',
                'return_format' => 'H:i:s',
            ),
            array(
                'key' => 'field_5fc8d18b8765d',
                'label' => __('Ende','quartiersplattform'),
                'name' => 'event_end_time',
                'type' => 'time_picker',
                'instructions' => __('Wann endet deine Veranstaltung?','quartiersplattform'),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'H:i',
                'return_format' => 'H:i:s',
            ),
            array(
                'key' => 'field_5fc8d1ae96113',
                'label' => __('Enddatum (bei mehrtägigen Veranstaltungen)','quartiersplattform'),
                'name' => 'event_end_date',
                'type' => 'date_picker',
                'instructions' => __('Wann findet die mehrtägige Veranstaltung zuletzt statt?','quartiersplattform'),
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
                'key' => 'field_63137dc0b7174',
                'label' => 'Wiederholung',
                'name' => 'event_frequency',
                'type' => 'select',
                'instructions' => __('In welchem Rhytmus findet die Veranstaltung statt?','quartiersplattform'),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'täglich' => 'täglich',
                    'wöchentlich' => 'wöchentlich',
                    'monatlich' => 'monatlich',
                    'jährlich' => 'jährlich',
                ),
                'default_value' => 'daily',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5fc8d1c4d15c8',
                'label' => __('Website','quartiersplattform'),
                'name' => 'website',
                'type' => 'url',
                'instructions' => __('Verlinke die Internetseite zur Veranstaltung.', 'quartiersplattform'),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'http://quartiersplattform.org',
            ),
            array(
                'key' => 'field_5fc8d1e0d15c9',
                'label' => __('Livestream','quartiersplattform'),
                'name' => 'livestream',
                'type' => 'url',
                'instructions' => __('Wird deine Veranstaltunge Live übertragen? Hier kannst du einen Link veröffentlichen, damit noch mehr Menschen daran teilhaben können.','quartiersplattform'),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'http://quartiersplattform.org',
            ),
            array(
                'key' => 'field_5fc8d1f4d15ca',
                'label' => __('Ticket','quartiersplattform'),
                'name' => 'ticket',
                'type' => 'url',
                'instructions' => __('Link zum erwerben der Links.', 'quartiersplattform'),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'http://quartiersplattform.org',
            ),
            // array(
            //     'key' => 'field_5fc8d20bd15cb',
            //     'label' => __('Karte','quartiersplattform'),
            //     'name' => 'map',
            //     'type' => 'google_map',
            //     'instructions' => '',
            //     'required' => 0,
            //     'conditional_logic' => 0,
            //     'wrapper' => array(
            //         'width' => '',
            //         'class' => '',
            //         'id' => '',
            //     ),
            //     'center_lat' => '',
            //     'center_lng' => '',
            //     'zoom' => '',
            //     'height' => '',
            // ),
            array(
                'key' => 'field_603f4c75747e9',
                'label' => __('Bild','quartiersplattform'),
                'name' => '_thumbnail_id',
                'type' => 'image',
                'instructions' => __('Welches Bild beschreibt deine Veranstaltung am besten?','quartiersplattform'),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'uploadedTo',
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
