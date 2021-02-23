<?php 

/**
 * ------------------------------------------------------------
 * Blocks
 * ------------------------------------------------------------
 */


add_action('init', 'my_acf_init');
function my_acf_init() {
	
	// wetter block
// 	if( function_exists('acf_register_block') ) {
		
// 		// register a testimonial block
// 		acf_register_block(array(
// 			'name'				=> 'wetter',
// 			'title'				=> __('Wetter'),
// 			'description'		=> __('Das Wetter am Arrenberg'),
// 			'render_callback'	=> 'wetter_block_render_callback',
// 			'category'			=> 'common', //  quartiersplattform
// 			'icon'				=> 'cloud',
// 			'keywords'			=> array( 'wetter', 'arreberg' ),
// 		));
// 	}

// 	// link block
// 	if( function_exists('acf_register_block') ) {
		
// 		// register a testimonial block
// 		acf_register_block(array(
// 			'name'				=> 'link',
// 			'title'				=> __('Link Block'),
// 			'description'		=> __('Link Card'),
// 			'render_callback'	=> 'link_block_render_callback',
// 			'category'			=> 'quartiersplattform',
// 			'icon'				=> 'admin-links',
// 			'keywords'			=> array( 'link', 'arreberg' ),
// 		));
// 	}
// }


// function wetter_block_render_callback( $block ) {
	
// 	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
// 	$slug = str_replace('acf/', '', $block['name']);
	
// 	// include a template part from within the "template-parts/block" folder
// 	if( file_exists( get_theme_file_path("/components/wetter.php") ) ) {
// 		include( get_theme_file_path("/components/wetter.php") );
// 	}
// }


function link_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/components/link-card.php") ) ) {
		include( get_theme_file_path("/components/link-card.php") );
	}
}


/**
 * ------------------------------------------------------------
 * Set ACF fields for Blocks
 * ------------------------------------------------------------
 */


if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_602f93914132e',
		'title' => 'Link-Block',
		'fields' => array(
			array(
				'key' => 'field_602f9399a7cfc',
				'label' => 'link',
				'name' => 'link',
				'type' => 'page_link',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => '',
				'taxonomy' => '',
				'allow_null' => 0,
				'allow_archives' => 1,
				'multiple' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/link',
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