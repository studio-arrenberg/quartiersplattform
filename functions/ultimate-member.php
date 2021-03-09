<?php

/**
 * 
 * Additional functions for 
 * Ultimate Member 
 * 
 * 	1. Show profil image upload
 * 	2. Maybe remove Ultimate Member CSS and JS
 * 	3. Remove widget styles
 * 	4. Deregister UM Styles
 * 
 */


// UM show profil image upload 
function um_show_hidden_field(){
	if ( is_page( 'profil' ) ) {
			echo "<script>document.querySelector('div.um-profile-photo div').style.display = 'block';</script>";
	}
} add_action('wp_footer', 'um_show_hidden_field');

/**
 * Maybe remove Ultimate Member CSS and JS
 * @global WP_Post $post
 * @global bool $um_load_assets
 * @global WP_Scripts $wp_scripts
 * @global WP_Styles $wp_styles
 * @return NULL
 */
function um_remove_scripts_and_styles() {
	global $post, $um_load_assets, $wp_scripts, $wp_styles;

	// Set here IDs of the pages, that use Ultimate Member scripts and styles
	$um_posts = array(0);

	// Set here URLs of the pages, that use Ultimate Member scripts and styles
	$um_urls = array(
		'/account/',
		'/activity/',
		'/profil/',
		'/groups/',
		'/login/',
		'/logout/',
		'/members/',
		'/my-groups/',
		'/password-reset/',
		'/register/',
		// '/user/',
	);

	if ( is_admin() || is_ultimatemember() ) {
		return;
	}
	
	$REQUEST_URI = $_SERVER['REQUEST_URI'];
	if ( in_array( $REQUEST_URI, $um_urls ) ) {
		return;
	}
	foreach ( $um_urls as $key => $um_url ) {
		if ( strpos( $REQUEST_URI, $um_url ) !== FALSE ) {
			return;
		}
	}

	if ( !empty( $um_load_assets ) ) {
		return;
	}
	
	if ( isset( $post ) && is_a( $post, 'WP_Post' ) ) {
		if ( in_array( $post->ID, $um_posts ) ) {
			return;
		}
		if ( strpos( $post->post_content, '[ultimatemember_' ) !== FALSE ) {
			return;
		}
		if ( strpos( $post->post_content, '[ultimatemember form_id' ) !== FALSE ) {
			return;
		}
	}

	if ( empty( $wp_scripts->queue ) || empty( $wp_styles->queue ) ) {
		return;
	}

	foreach ( $wp_scripts->queue as $key => $script ) {
		if ( strpos( $script, 'um_' ) === 0 || strpos( $script, 'um-' ) === 0 || strpos( $wp_scripts->registered[$script]->src, '/ultimate-member/assets/' ) !== FALSE ) {
			unset( $wp_scripts->queue[$key] );
		}
	}

	foreach ( $wp_styles->queue as $key => $style ) {
		if ( strpos( $style, 'um_' ) === 0 || strpos( $style, 'um-' ) === 0 || strpos( $wp_styles->registered[$style]->src, '/ultimate-member/assets/' ) !== FALSE ) {
			unset( $wp_styles->queue[$key] );
		}
	}
}
add_action( 'wp_print_footer_scripts', 'um_remove_scripts_and_styles', 9 );
add_action( 'wp_print_scripts', 'um_remove_scripts_and_styles', 9 );
add_action( 'wp_print_styles', 'um_remove_scripts_and_styles', 9 );
add_action( 'dynamic_sidebar', 'um_remove_scripts_and_styles_widget' );


/**
 * Check whether Ultimate Member widget was used
 * @param array $widget
 */
function um_remove_scripts_and_styles_widget( $widget ) {
	if ( strpos( $widget['id'], 'um_' ) === 0 || strpos( $widget['id'], 'um-' ) === 0 ) {
		$GLOBALS['um_load_assets'] = TRUE;
	}
}

/**
 * Deregister UM Styles
 */
function um_deregister_styles() {

	wp_deregister_style( 'select2');
	wp_deregister_style( 'um_datetime');
	wp_deregister_style( 'um_datetime_date');
	wp_deregister_style( 'um_datetime_time');
	wp_deregister_style( 'um_fileupload');
	wp_deregister_style( 'um_raty');
	wp_deregister_style( 'um_fonticons_ii');
	wp_deregister_style( 'um_fonticons_fa');
	wp_deregister_style( 'um_scrollbar');
	wp_deregister_style( 'um_crop');
	wp_deregister_style( 'um_tipsy');
	wp_deregister_style( 'um_responsive');
	wp_deregister_style( 'um_modal');
	wp_deregister_style( 'um_styles');
	wp_deregister_style( 'um_members');
	wp_deregister_style( 'um_profile');
	wp_deregister_style( 'um_account');
	wp_deregister_style( 'um_misc');
	wp_deregister_style( 'um_default_css');

} add_action( 'wp_print_styles', 'um_deregister_styles', 100 );

