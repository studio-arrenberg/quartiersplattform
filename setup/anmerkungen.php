<?php

/**
 * 
 *  Anmerkungen Setup
 * 
 *  1. ACF fields
 *  2. Register Post Type
 *  3. Register Taxonomy
 *  4. Create Taxonomies
 * 
 */


/**
 *  --------------------------------------------------------
 *  1. ACF fields
 *  --------------------------------------------------------
 */
add_action('init', 'qp_add_anmerkungen_field_group');
function qp_add_anmerkungen_field_group() {
    
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5fb50c8393d52',
        'title' => __('Anmerkung','quartiersplattform'),
        'fields' => array(
            array(
                'key' => 'field_5fb50c8a3e93d',
                'label' => __('Feedback','quartiersplattform'),
                'name' => 'text',
                'type' => 'textarea',
                'instructions' => __('Was wünschst du dir von der Quartiersplattform?','quartiersplattform'),
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
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'anmerkungen',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;
}






/**
 *  --------------------------------------------------------
 *  2. Register Post Type
 *  --------------------------------------------------------
 */

function cptui_register_my_cpts_anmerkungen() {

    /**
     * Post Type: Anmerkungen.
     */

    $labels = [
        "name" => __( "Anmerkungen", "quartiersplattform" ),
        "singular_name" => __( "Anmerkung", "quartiersplattform" ),
    ];

    $args = [
        "label" => __( "Anmerkungen", "quartiersplattform" ),
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
        "rewrite" => [ "slug" => "anmerkungen", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-editor-quote",
        "supports" => [ "title", "editor", "custom-fields", "comments" ],
    ];

    register_post_type( "anmerkungen", $args );
}

add_action( 'init', 'cptui_register_my_cpts_anmerkungen' );

/**
 *  --------------------------------------------------------
 *  3. Register Taxonomy
 *  --------------------------------------------------------
 */

function cptui_register_my_taxes_anmerkungen_status() {

	/**
	 * Taxonomy: Status.
	 */

	$labels = [
		"name" => __( "Status", "quartiersplattform" ),
		"singular_name" => __( "Status", "quartiersplattform" ),
	];

	$args = [
		"label" => __( "Status", "quartiersplattform" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'anmerkungen_status', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "anmerkungen_status",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "anmerkungen_status", [ "anmerkungen" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_anmerkungen_status' );

/**
 *  --------------------------------------------------------
 *  4. Create Taxonomies
 *  --------------------------------------------------------
 */

function register_amerkung_tax_fields() {

    # Vorschlag
    wp_insert_term(
        'Vorschlag',
        'anmerkungen_status',
        array(
            'description' => '',
            'slug'        => 'vorschlag'
        ) 
    );

    # In Bearibeitung
    wp_insert_term(
        'In Bearbeitung',
        'anmerkungen_status',
        array(
            'description' => '',
            'slug'        => 'in-bearbeitung'
        ) 
    );

    # Umgesetzt
    wp_insert_term(
        'Umgesetzt',
        'anmerkungen_status',
        array(
            'description' => '',
            'slug'        => 'umgesetzt'
        ) 
    );

}

add_action( 'init', 'register_amerkung_tax_fields' );