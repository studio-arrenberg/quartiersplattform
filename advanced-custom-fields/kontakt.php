<?php

/**
 * 
 *  Kontakt + Biografie Setup
 * 
 *  1. ACF
 * 
 */


/**
 *  --------------------------------------------------------
 *  1. ACF
 *  --------------------------------------------------------
 */


function qp_add_local_field_group() {

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_6034e1d00f273',
        'title' => __("Kontaktinformationen", "quartiersplattform"),
        'fields' => array(
            array(
                'key' => 'field_6034e1e3c9a1e',
                'label' => __("Telefonnummer", "quartiersplattform"),
                'name' => 'phone',
                'type' => 'number',
                'instructions' => __("Hier kannst du deine Telefonnummer angeben, damit dich andere Mitglieder kontaktieren können.", "quartiersplattform"),
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
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_6034e20bc9a1f',
                'label' => __('E-Mail', "quartiersplattform"),
                'name' => 'mail',
                'type' => 'text',
                'instructions' => __('Hier kannst du deine E-Mail Adresse eintragen, damit dich andere Nutzer kontaktieren können.', "quartiersplattform"),
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

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_605dc2bb690d9',
            'title' => 'Über mich',
            'fields' => array(
                array(
                    'key' => 'field_605dc2c366f5c',
                    'label' => __('Über mich', "quartiersplattform"),
                    'name' => 'about',
                    'type' => 'textarea',
                    'instructions' => __('Hier kannst du ein wenig über dich und den Bezug zu deinem Viertel erzählen.', "quartiersplattform"),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => 300,
                    'rows' => 8,
                    'new_lines' => 'br',
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
}
add_action('init', 'qp_add_local_field_group');

?>
