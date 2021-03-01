<?php

/**
 * 
 * additional functions to Advanced custom fields
 * 
 */


// ACF Remove Label (Anmerkungen, Angebote, Fragen)
function my_acf_admin_head() {
    ?>
    <style type="text/css">
		/* Anmerkungen Text lable */
        .acf-field-5fa01d66b0f2f > .acf-label {display: none;} /* ap1 */
		.acf-field-5fb50c8a3e93d > .acf-label {display: none;} /* app */
		.acf-field-5fc8fe8aa1786 > .acf-label {display: none;} /* Local */
		
		/* Angebote Text Label */
		.acf-field-5fcf55f35b575 > .acf-label {display: none;} /* ap1 */
		
		/* Fragen Text Label */
		.acf-field-5fcf56cd9e317 > .acf-label {display: none;} /* ap1 */		
    </style>
    <?php
}
// add_action('acf/input/admin_head', 'my_acf_admin_head');






// ACF Forms deregister CSS Styles
// disable acf css on front-end acf forms
function my_deregister_styles() {
	wp_deregister_style( 'acf' );
	wp_deregister_style( 'acf-field-group' );
  	wp_deregister_style( 'acf-global' );
//   wp_deregister_style( 'acf-input' );
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
    
}
add_filter('acf/prepare_field/name=_post_title', 'my_acf_prepare_field');


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