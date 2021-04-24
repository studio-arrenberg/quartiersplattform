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

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_6034e1d00f273',
        'title' => 'Kontaktinformationen',
        'fields' => array(
            array(
                'key' => 'field_6034e1e3c9a1e',
                'label' => 'Telefonnummer',
                'name' => 'phone',
                'type' => 'number',
                'instructions' => 'Gib hier deine Telefonnummer an, damit dich andere Mitglieder kontaktieren können.',
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
                'label' => 'E-Mail',
                'name' => 'mail',
                'type' => 'text',
                'instructions' => 'Trage deine E-Mail Adresse ein, damit dich andere Nutzer kontaktieren können.',
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
                    'label' => 'Über mich',
                    'name' => 'about',
                    'type' => 'textarea',
                    'instructions' => 'Erzähle hier ein wenig über dich und den Bezug zu deinem Viertel.🏘',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'Ich lebe seit drei Jahren hier und mag die Nachbarschaft und das Gemeinschaftsgefühl sehr ...',
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
?>
