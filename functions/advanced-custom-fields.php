<?php

/**
 * 
 * Additional functions for 
 * Advanced Custom Fields
 * 
 * 	1. Deregister CSS Styles
 * 	2. Map API Key
 * 	3. Rename Post Title Label
 * 	4. Form show image uploaded
 * 	
 */


// ACF Forms deregister CSS Styles
// disable acf css on front-end acf forms
function my_deregister_styles() {

	wp_deregister_style( 'acf' );
	wp_deregister_style( 'acf-field-group' );
  	wp_deregister_style( 'acf-global' );
  	wp_deregister_style( 'acf-datepicker' );

} add_action( 'wp_print_styles', 'my_deregister_styles', 100 );


// map api key
function my_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyDPfffkf5pnMH5AmDLnVNb-3w1dNpdh-co';
	return $api;	

} add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


// ACF Rename Post Title Label
function my_acf_prepare_field( $field ) {

	$field['label'] = "Titel";
    return $field;
    
} add_filter('acf/prepare_field/name=_post_title', 'my_acf_prepare_field');


// ACF Form show image uploaded
function acf_form_show_image_uploaded(){

	$REQUEST_URI = $_SERVER['REQUEST_URI'];

    if (
		strpos($REQUEST_URI,'/nachricht-erstellen/') !== false /* '/angebot-erstellen/' */
		|| strpos($REQUEST_URI,'/projekt-erstellen/') !== false
		|| strpos($REQUEST_URI,'/veranstaltung-erstellen/') !== false
		|| $_GET['action'] == 'edit' /* || isset($_GET['action']) */
	) {
		wp_register_script('image-upload-preview', get_template_directory_uri() .'/assets/js/image-upload-preview.js', false, false, true);
		wp_enqueue_script('image-upload-preview');
	}

} add_action('wp_footer', 'acf_form_show_image_uploaded');