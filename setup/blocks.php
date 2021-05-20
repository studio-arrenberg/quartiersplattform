<?php 

/**
 * 
 *  Blocks Setup (ACF)
 * 
 *  1. Init Blocks
 * 	2. Callback function
 * 	3. Init ACF Fields
 * 
 * 	Blocks
 *	- Link Card
 * 	- Geschichten Block
 * 
 */


/**
 * ------------------------------------------------------------
 * 	1. Init Blocks
 * ------------------------------------------------------------
 */


add_action('init', 'qp_acf_block_init');
function qp_acf_block_init() {

	// link block
	if( function_exists('acf_register_block') ) {
		
		// register a testimonial block
		acf_register_block(array(
			'name'				=> 'link-card',
			'title'				=> __('Link Block'),
			'description'		=> __('Link Post and Pages'),
			'render_callback'	=> 'link_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'admin-links',
			'keywords'			=> array( 'link', 'arrenberg' ),
		));

		// register a geschichten block
		// acf_register_block(array(
		// 	'name'				=> 'arrenberg-geschichten',
		// 	'title'				=> __('Arrenberg Geschichten'),
		// 	'description'		=> __('Geschichten am Arrenberg'),
		// 	'render_callback'	=> 'geschichten_block_render_callback',
		// 	'category'			=> 'common', //  quartiersplattform
		// 	'icon'				=> 'text-page',
		// 	'keywords'			=> array( 'geschichten', 'arrenberg', 'menschen' ),
		// ));
	}
}

/**
 * ------------------------------------------------------------
 * 	2. Callback function
 * ------------------------------------------------------------
 */

function link_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/components/gutenberg-blocks/link-card.php") ) ) {
		include( get_theme_file_path("/components/gutenberg-blocks/link-card.php") );
	}
}

// function geschichten_block_render_callback( $block ) {
	
// 	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
// 	$slug = str_replace('acf/', '', $block['name']);
	
// 	// include a template part from within the "template-parts/block" folder
// 	if( file_exists( get_theme_file_path("/components/gutenberg-blocks/geschichten-block.php") ) ) {
// 		include( get_theme_file_path("/components/gutenberg-blocks/geschichten-block.php") );
// 	}

// }


/**
 * ------------------------------------------------------------
 * 	3. Init ACF Fields
 * ------------------------------------------------------------
 */


if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_602f93914132e',
		'title' => __('Link-Block','quartiersplattform'),
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
					'value' => 'acf/link-card',
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