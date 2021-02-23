<?php

/**
 * 
 *  Settings Setup
 * 
 *  1. ACF options Page
 *  2. ACF create fields
 * 
 */


/**
 *  --------------------------------------------------------
 *  1. ACF options Page
 *  --------------------------------------------------------
 */


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Einstellungen für die Quartiersplattform',
		'menu_title'	=> 'Quartiersplattform',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'update_button' => __('Aktualisieren', 'acf'),
		'updated_message' => __("Die Einstellungen wurden gespeichert.", 'acf'),

	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Wartungsmodus',
		'menu_title'	=> 'Wartungsmodus',
		'parent_slug'	=> 'theme-general-settings',
		'update_button' => __('Aktualisieren', 'acf'),
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'update_button' => __('Aktualisieren', 'acf'),
		'updated_message' => __("Die Einstellungen wurden gespeichert.", 'acf'),
	));
}

/**
 *  --------------------------------------------------------
 *  2. ACF create fields
 *  --------------------------------------------------------
 */

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_6023ea77ebd53',
        'title' => 'Quartierseinstellungen',
        'fields' => array(
            array(
                'key' => 'field_6023ea8e3cc78',
                'label' => 'Farbe',
                'name' => 'color',
                'type' => 'color_picker',
                'instructions' => 'Wähle hier die Akzentfarbe von deinem Quartier.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
            ),
            array(
                'key' => 'field_6023eb94d4c72',
                'label' => 'Logo',
                'name' => 'logo',
                'type' => 'image',
                'instructions' => 'Gib deinem Quartier ein Logo.',
                'required' => 1,
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
            array(
                'key' => 'field_6024ebe66b644',
                'label' => 'Name',
                'name' => 'quartiersplattform-name',
                'type' => 'text',
                'instructions' => 'Gib deiner Quartiersplattform einen Namen.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Arrenberg',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6024ef4c228a9',
                'label' => 'Subheadline',
                'name' => 'quartiersplattform-description',
                'type' => 'text',
                'instructions' => 'Gib deiner Quartiersplattform eine Beschreibung',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'Quartiersplattform',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6024f0beeb1e7',
                'label' => 'Sponsoren',
                'name' => 'sponsors',
                'type' => 'repeater',
                'instructions' => 'Trag hier die Sponsoren der Plattform ein.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 6,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_6024f5b43157e',
                        'label' => 'Sponsoren',
                        'name' => 'sponsoren',
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
                    array(
                        'key' => 'field_6024f5dc3157f',
                        'label' => 'Sponsoren Name',
                        'name' => 'sponsoren_name',
                        'type' => 'text',
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
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
            array(
                'key' => 'field_6024f433f7745',
                'label' => 'Wartung',
                'name' => 'wartung',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'rot' => 'Rot',
                ),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
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
    
    acf_add_local_field_group(array(
        'key' => 'group_60241960f114c',
        'title' => 'Wartungsmodus',
        'fields' => array(
            array(
                'key' => 'field_6024196b56d53',
                'label' => 'Wartungsmodus',
                'name' => 'maintenance',
                'type' => 'radio',
                'instructions' => 'Schalte hier den Wartungsmodus für die Quartiersseite ein.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    1 => 'Einschalten',
                    0 => 'Ausschalten',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_6024e6c4388e2',
                'label' => 'Überschrift',
                'name' => 'headline',
                'type' => 'text',
                'instructions' => 'Gib hier eine Überschrift für die Wartungsseite ein.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Deine Quatiersplattform wird aktualisiert.',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6024e751388e3',
                'label' => 'Text',
                'name' => 'text',
                'type' => 'textarea',
                'instructions' => 'Gib hier eine Beschreibung für den Wartungsmodus ein.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Freue dich auf spannende neue Fuktionen die du nutzen kannst um dein Quatier mit zugestalten.
    Wir sind bald wieder online.',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-wartungsmodus',
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