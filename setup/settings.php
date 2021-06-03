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

add_action('init', 'qp_add_option_pages');
function qp_add_option_pages() {
	
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title' 	=> __('Einstellungen für die Quartiersplattform',"quartiersplattform"),
			'menu_title'	=> __('Quartiersplattform', "quartiersplattform"),
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'update_button' => __('Aktualisieren', 'acf'),
			'updated_message' => __("Die Einstellungen wurden gespeichert.", 'acf'),

		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> __('Wartungsmodus',"quartiersplattform"),
			'menu_title'	=> __('Wartungsmodus',"quartiersplattform"),
			'parent_slug'	=> 'theme-general-settings',
			'update_button' => __('Aktualisieren', 'acf'),
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'update_button' => __('Aktualisieren', 'acf'),
			'updated_message' => __("Die Einstellungen wurden gespeichert.", 'acf'),
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> __('API-Schlüssel', "quartiersplattform"),
			'menu_title'	=> __('API-Schlüssel', "quartiersplattform"),
			'parent_slug'	=> 'theme-general-settings',
			'update_button' => __('Aktualisieren', 'acf'),
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'update_button' => __('Aktualisieren', 'acf'),
			'updated_message' => __("Die Einstellungen wurden gespeichert.", 'acf'),
		));
	}
		
}



/**
 *  --------------------------------------------------------
 *  2. ACF create fields
 *  --------------------------------------------------------
 */


add_action('init', 'qp_add_settings_field_group');
function qp_add_settings_field_group() {
	
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_6023ea77ebd53',
		'title' => __('Quartierseinstellungen',"quartiersplattform"),
		'fields' => array(
			array(
				'key' => 'field_6024ebe66b644',
				'label' => __('Name',"quartiersplattform"),
				'name' => 'quartiersplattform-name',
				'type' => 'text',
				'instructions' => __('Hier kannst du den Namen festlegen, welcher den Besuchern der Quartiersplattform angezeigt wird und im Menü angezeigt wird.',"quartiersplattform"),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Quartier',
				'placeholder' => __('Name der Quartiersplattform',"quartiersplattform"),
				'prepend' => '',
				'append' => '',
				'maxlength' => '16',
			),
			array(
				'key' => 'field_6023eb94d4c72',
				'label' => __('Logo', "quartiersplattform"),
				'name' => 'logo',
				'type' => 'image',
				'instructions' => __('Hier kannst du das Logo von deinem Quartier oder deiner Organisation einfügen, welches unter jeder Seite eingeblendet wird.',"quartiersplattform"),
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
			// Hier trennen und zwei formulare draus machen ( Headline: Startseite anpassen)
			array(
				'key' => 'field_609021bb178d8',
				'label' => __('Bild für die Quartiersstartseite','quartiersplattform'),
				'name' => 'quartier_image',
				'type' => 'image',
				'instructions' => __('Hier kannst du das Bild festlegen, das auf der Quartiersseite eingeblendet wird.','quartiersplattform'),
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
			array(
				'key' => 'field_6024ebe663644',
				'label' => __('Überschrift für die Quartiersstartseite',"quartiersplattform"),
				'name' => 'welcome-title',
				'type' => 'text',
				'instructions' => __('Hier kannst du die Überschrift festlegen, welche den Besuchern der Quartiersplattform auf der Startseite .',"quartiersplattform"),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => __('Überschrift',"quartiersplattform"),
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6024eqe663644',
				'label' => __('Beschreibung für die Quartiersstartseite',"quartiersplattform"),
				'name' => 'welcome-text',
				'type' => 'textarea',
				'instructions' => __('Hier kannst einen Beschreibungstext hinterlegen, welcher für die Besucher auf der Startseite eingeblendet wird.',"quartiersplattform"),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => __('Beschreibungstext',"quartiersplattform"),
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			
			// array(
			// 	'key' => 'field_6024ef4c228a9',
			// 	'label' => 'Beschreibung',
			// 	'name' => 'quartiersplattform-description',
			// 	'type' => 'text',
			// 	'instructions' => 'Gib deiner Quartiersplattform eine Beschreibung.',
			// 	'required' => 0,
			// 	'conditional_logic' => 0,
			// 	'wrapper' => array(
			// 		'width' => '',
			// 		'class' => '',
			// 		'id' => '',
			// 	),
			// 	'default_value' => '',
			// 	'placeholder' => 'Quartiersplattform',
			// 	'prepend' => '',
			// 	'append' => '',
			// 	'maxlength' => '',
			// ),
			// array(
			// 	'key' => 'field_6063336394327',
			// 	'label' => __('Mittelpunkt deines Quartiers',"quartiersplattform"),
			// 	'name' => 'map',
			// 	'type' => 'google_map',
			// 	'instructions' => __('Dieser Ort wird für die Karte auf der Startseite genutzt.',"quartiersplattform"),
			// 	'required' => 0,
			// 	'conditional_logic' => 0,
			// 	'wrapper' => array(
			// 		'width' => '',
			// 		'class' => '',
			// 		'id' => '',
			// 	),
			// 	'center_lat' => '51.258477',
			// 	'center_lng' => '7.136849',
			// 	'zoom' => 10,
			// 	'height' => 250,
			// ),
			array(
				'key' => 'field_6024f0beeb1e7',
				'label' => __('Sponsoren',"quartiersplattform"),
				'name' => 'sponsors',
				'type' => 'repeater',
				'instructions' => __('Hier kannst du die Partner deiner Quartiersplattform eintragen.',"quartiersplattform"),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 10,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_6024f5b43157e',
						'label' => __('Logo',"quartiersplattform"),
						'name' => 'logo',
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
					// array(
					// 	'key' => 'field_6024f5dc3157f',
					// 	'label' => 'Name',
					// 	'name' => 'name',
					// 	'type' => 'text',
					// 	'instructions' => '',
					// 	'required' => 0,
					// 	'conditional_logic' => 0,
					// 	'wrapper' => array(
					// 		'width' => '',
					// 		'class' => '',
					// 		'id' => '',
					// 	),
					// 	'default_value' => '',
					// 	'placeholder' => '',
					// 	'prepend' => '',
					// 	'append' => '',
					// 	'maxlength' => '',
					// ),
					array(
						'key' => 'field_6036469e6db06',
						'label' => __('Website',"quartiersplattform"),
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
				),
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
			'title' => __('Wartungsmodus',"quartiersplattform"),
			'fields' => array(
				array(
					'key' => 'field_6024196b56d53',
					'label' => __('Wartungsmodus',"quartiersplattform"),
					'name' => 'maintenance',
					'type' => 'true_false',
					'instructions' => __('Schalte hier den Wartungsmodus für die Quartiersseite ein.',"quartiersplattform"),
					'required' => 0,
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => 'Ein',
					'ui_off_text' => 'Aus',
				),
				// array(
				// 	'key' => 'field_6047c15b09572',
				// 	'label' => '',
				// 	'name' => '',
				// 	'type' => 'true_false',
				// 	'instructions' => '',
				// 	'required' => 0,
				// 	'conditional_logic' => 0,
				// 	'wrapper' => array(
				// 		'width' => '',
				// 		'class' => '',
				// 		'id' => '',
				// 	),
				// 	'message' => '',
				// 	'default_value' => 0,
				// 	'ui' => 1,
				// 	'ui_on_text' => 'Eingeschaltet',
				// 	'ui_off_text' => 'Ausgeschaltet',
				// ),
				array(
					'key' => 'field_6024e6c4388e2',
					'label' => __('Überschrift',"quartiersplattform"),
					'name' => 'headline',
					'type' => 'text',
					'instructions' => __('Hier kannst du eine Überschrift für die Wartungsseite eintragen.',"quartiersplattform"),
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => __('Deine Quatiersplattform wird aktualisiert.',"quartiersplattform"),
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_6024e751388e3',
					'label' => __('Text',"quartiersplattform"),
					'name' => 'text',
					'type' => 'textarea',
					'instructions' => __('Hier kannst du einen Beschreibungstext für den Wartungsmodus einfügen.',"quartiersplattform"),
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => __('Freue dich auf spannende neue Fuktionen die du nutzen kannst um dein Quatier mit zugestalten. Wir sind bald wieder online.',"quartiersplattform"),
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

	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'group_6036d8ca6862b',
			'title' => 'API-Schlüssel',
			'fields' => array(
				// array(
				// 	'key' => 'field_603765b41a015',
				// 	'label' => 'Google Maps API Schlüssel',
				// 	'name' => 'google_maps_api',
				// 	'type' => 'text',
				// 	'instructions' => 'Trage hier deinen Google Maps API Schlüssel ein.',
				// 	'required' => 0,
				// 	'conditional_logic' => 0,
				// 	'wrapper' => array(
				// 		'width' => '50',
				// 		'class' => '',
				// 		'id' => '',
				// 	),
				// 	'default_value' => '',
				// 	'placeholder' => '',
				// 	'prepend' => '',
				// 	'append' => '',
				// 	'maxlength' => '',
				// ),
				// array(
				// 	'key' => 'field_6036d91042015',
				// 	'label' => 'Mapbox API Schlüssel',
				// 	'name' => 'mapbox_api',
				// 	'type' => 'text',
				// 	'instructions' => 'Trage hier deinen Mapbox API-Schlüssel ein.',
				// 	'required' => 0,
				// 	'conditional_logic' => 0,
				// 	'wrapper' => array(
				// 		'width' => '50',
				// 		'class' => '',
				// 		'id' => '',
				// 	),
				// 	'default_value' => '',
				// 	'placeholder' => '',
				// 	'prepend' => '',
				// 	'append' => '',
				// 	'maxlength' => '',
				// ),
				array(
					'key' => 'field_6036d8d042014',
					'label' => __('Matomo API Schlüssel',"quartiersplattform"),
					'name' => 'matomo_api',
					'type' => 'textarea',
					'instructions' => __('Trage hier deinen Matomo API-Schlüssel ein.',"quartiersplattform"),
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => 22,
					'new_lines' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-api-schluessel',
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

		// if( function_exists('acf_add_local_field_group') ):

		// 	acf_add_local_field_group(array(
		// 		'key' => 'group_606d79da63449',
		// 		'title' => __('Quartierskoordinaten',"quartiersplattform"),
		// 		'fields' => array(
		// 			array(
		// 				'key' => 'field_606d79e0461d4',
		// 				'label' => __('Breitengrad',"quartiersplattform"),
		// 				'name' => 'lat',
		// 				'type' => 'number',
		// 				'instructions' => __('Trage hier den Breitengrad von deinem Quartier ein. Diesen findest du beispielsweise über Google Maps heraus.',"quartiersplattform"),
		// 				'required' => 0,
		// 				'conditional_logic' => 0,
		// 				'wrapper' => array(
		// 					'width' => '',
		// 					'class' => '',
		// 					'id' => '',
		// 				),
		// 				'default_value' => '',
		// 				'placeholder' => '',
		// 				'prepend' => '',
		// 				'append' => '',
		// 				'min' => '',
		// 				'max' => '',
		// 				'step' => '',
		// 			),
		// 			array(
		// 				'key' => 'field_606d7bd1461d6',
		// 				'label' => __('Längengrad',"quartiersplattform"),
		// 				'name' => 'lng',
		// 				'type' => 'number',
		// 				'instructions' => __('Trage hier den Längengrad von deinem Quartier ein. Diesen findest du beispielsweise über Google Maps heraus.',"quartiersplattform"),
		// 				'required' => 0,
		// 				'conditional_logic' => 0,
		// 				'wrapper' => array(
		// 					'width' => '',
		// 					'class' => '',
		// 					'id' => '',
		// 				),
		// 				'default_value' => '',
		// 				'placeholder' => '',
		// 				'prepend' => '',
		// 				'append' => '',
		// 				'min' => '',
		// 				'max' => '',
		// 				'step' => '',
		// 			),
		// 		),
		// 		'location' => array(
		// 			array(
		// 				array(
		// 					'param' => 'options_page',
		// 					'operator' => '==',
		// 					'value' => 'theme-general-settings',
		// 				),
		// 			),
		// 		),
		// 		'menu_order' => 3,
		// 		'position' => 'normal',
		// 		'style' => 'default',
		// 		'label_placement' => 'top',
		// 		'instruction_placement' => 'label',
		// 		'hide_on_screen' => '',
		// 		'active' => true,
		// 		'description' => '',
		// 	));
			
		// 	endif;
	
	
}


