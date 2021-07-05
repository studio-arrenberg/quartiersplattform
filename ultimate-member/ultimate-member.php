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
 * 	5. Redirect User after Login
 * 	6. Redirect User after Register
 * 	7. UM Profile Image upload helper
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

	// foreach ( $wp_styles->queue as $key => $style ) {
		// if ( strpos( $style, 'um_' ) === 0 || strpos( $style, 'um-' ) === 0 || strpos( $wp_styles->registered[$style]->src, '/ultimate-member/assets/' ) !== FALSE ) {
		// 	unset( $wp_styles->queue[$key] );
		// }
	// }
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


/**
 * Redirect after Login
 * 
 * UM Filter
 * @return string url
 */
add_filter( 'um_login_redirect_url', 'my_login_redirect_url', 10, 2 );
function my_login_redirect_url( $url, $id ) {
	// your code here
	$url = home_url( );
	return $url;
}

/**
 * Redirect after Login
 * 
 * UM Filter
 * @return void
 */
add_action( 'um_on_login_before_redirect', 'my_on_login_before_redirect', 10, 1 );
function my_on_login_before_redirect( $user_id ) {
   // your code here
   exit(wp_redirect( home_url(  ).'/projekte/' ));
}


/**
 * Redirect after Register
 * 
 * UM Filter
 * @return string url
 */
add_filter( 'um_registration_pending_user_redirect', 'my_registration_pending_user_redirect', 10, 3 );
function my_registration_pending_user_redirect( $url, $status, $user_id ) {
    // your code here
	$url = home_url( );
    return $url;
}


/**
 * Redirect after Register
 * 
 * UM Filter
 * @return void
 */
add_action( 'um_registration_after_auto_login', 'my_registration_after_auto_login', 10, 1 );
function my_registration_after_auto_login( $user_id ) {
	// your code here
	exit(wp_redirect( home_url(  ) ));
}

/**
 * Set UM Settings
 * 
 * @return void
 */
// in file: class-admin-settings.php line 2702
if (UM()->options()->get('author_redirect') == true) {
	UM()->options()->update('author_redirect', false);
}

if (UM()->options()->get('members_page') == true) {
	UM()->options()->update('members_page', false);
}
// Mail settings
// ...


/**
 * UM Profile Image upload helper
 * 
 */
function qp_um_profile_image_upload_helper() {

	$REQUEST_URI = $_SERVER['REQUEST_URI'];

	if (strpos($REQUEST_URI,'/profil/') !== false) {
		wp_register_script('qp-um-profil-image-upload-helper', get_template_directory_uri() .'/assets/js/qp-um-profil-image-upload-helper.js', false, false, true);
		wp_enqueue_script('qp-um-profil-image-upload-helper');
	}

} add_action('wp_footer', 'qp_um_profile_image_upload_helper');


/**
 * 
 * UM Secondary Button
 * 
 */
add_filter( 'um_register_form_button_two', 'my_register_form_button_two', 10, 2 );
function my_register_form_button_two( $secondary_btn_word, $args ) {
    // your code here
	$secondary_btn_word = __('Login','quartiersplattform');
	return $secondary_btn_word;
}
add_filter( 'um_register_form_button_one', 'my_register_form_button_one', 10, 2 );
function my_register_form_button_one( $primary_btn_word, $args ) {
    // your code here
	$primary_btn_word = __('Register','quartiersplattform');
	return $primary_btn_word;
}

add_filter( 'um_register_form_button_two_url', 'my_register_form_button_two_url', 10, 2 );
function my_register_form_button_two_url( $secondary_btn_url, $args ) {
    // your code here
	$secondary_btn_url = home_url().'/login/';

	// active secondary button if form is register
	if ($args['core'] == 'register' && $args['mode'] == 'register') {
		update_post_meta($args['form_id'], '_um_register_secondary_btn', 1);
	}

	return $secondary_btn_url;
}

/**
 * 
 * UM Login Button one / two
 * 
 */
add_filter( 'um_login_form_button_one', 'my_login_form_button_one', 10, 2 );
function my_login_form_button_one( $primary_btn_word, $args ) {
    // your code here
	$primary_btn_word = __('Login','quartiersplattform');
	return $primary_btn_word;
}
add_filter( 'um_login_form_button_two', 'my_login_form_button_two', 10, 2 );
function my_login_form_button_two( $secondary_btn_word, $args ) {
    // your code here
	$secondary_btn_word = __('Register','quartiersplattform');
	return $secondary_btn_word;
}


/**
 * 
 * Language Debugging
 * 
 */
// add_action('wp_footer', 'language_debugging');
function language_debugging() {

	?>
	<!-- console logging -->
	<script>
		console.group('Language');
			function Entry(functionRun, ValueReturned) {
				this.functionRun = functionRun;
				this.ValueReturned = ValueReturned;
			}
			var locales = {};
			locales.get_locale = new Entry("get_locale()", "<?php echo get_locale(); ?>");
			locales.qp = new Entry("QP Detect Browser Language", "<?php //echo qp_detect_browser_language(); ?>");
			locales.get_locale_fallback = new Entry("get_locale() with fallback", "<?php echo ( get_locale() != '' ) ? get_locale() : 'en_US'; ?>");
			locales.user_locale = new Entry("User Locale", "<?php echo get_user_locale(get_current_user_id()); ?>");
			locales.lang_cookie = new Entry("Language Cookie", "<?php if (isset($_GET['lang'])) echo $_GET['lang']; ?>");
			locales.wp_filter = new Entry("WP locale Filter", "<?php echo apply_filters( 'locale', "fallback" ); ?>");
			locales.um_filter_locale = new Entry("UM Filter 'um_language_locale' ", "<?php echo has_filter( "um_language_locale"); ?>");
			locales.um_filter = new Entry("UM Filter 'um_language_file' ", "<?php echo has_filter( "um_language_file"); ?>");
			locales.um_filter = new Entry("UM File Filter 'um_language_file' ", "<?php //echo apply_filters( 'um_language_file', "fallback" ); ?>");
			locales.um_language_filter = new Entry("UM Language", "<?php //echo apply_filters( 'um_language_locale', "fallback" ) ?>");
			locales.um_textdomain = new Entry("UM textdomain", "<?php //echo apply_filters( 'um_language_textdomain', 'ultimate-member' ); ?>");
			locales.qp_language = new Entry("QP Language", "<?php echo qp_language(); ?>");
			locales.wp_filesystem_access = new Entry("WP Filesystem Access", "<?php//echo wp_can_install_language_pack(); ?>");
			locales.wp_installed_translations = new Entry("WP installed translations", "<?php // echo wp_get_installed_translations( 'core' ); ?>");
			locales.template_directory = new Entry("WP Template Directory", "<?php echo get_template_directory_uri(  ); ?>");
			locales.wp_lang_detection = new Entry("WP Language Detection", "<?php echo determine_locale(); ?>")
			console.table(locales);

		console.groupEnd();
	</script>

	<?php
}

/**
 * 
 * Copy Translations Files
 * 
 */
function copy_langugae_file() {

	$languages = array('it_IT', 'de_DE', 'tr_TR');
	$filename = array('mo', 'po');

	foreach ($languages as $lang) {
		foreach ($filename as $file) {
			// copy language files
			// $srcfile= get_template_directory() . '/languages/ultimate-member/'.$lang.'.'.$file;
			// $dstfile= WP_LANG_DIR . '/plugins/ultimate-member-'.$lang.'.'.$file;
			// mkdir(dirname($dstfile), 0777, true);
			// copy($srcfile, $dstfile);

			// delete files
			if (file_exists(WP_LANG_DIR . '/plugins/ultimate-member-'.$lang.'.'.$file)) {
				unlink(WP_LANG_DIR . '/plugins/ultimate-member-'.$lang.'.'.$file);
			}
		}
	}	
}

copy_langugae_file();


/**
 * 
 * Add Custom Mail Styling
 * 
 */

add_filter( 'um_email_template_html_formatting', 'my_email_template_html', 10, 2 );
function my_email_template_html( $slug, $args ) {
    ob_start(); ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!--[if gte mso 15]>
        <xml>
           <o:OfficeDocumentSettings>
           <o:AllowPNG/>
           <o:PixelsPerInch>96</o:PixelsPerInch>
           </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!--<![endif]-->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;700&display=swap" rel="stylesheet">
        
        <style type="text/css">
            body { 
				/* font-family: Helvetica, Arial, sans-serif ; */
				font-family: "Titillium Web", "Helvetica Neue", Helvetica, sans-serif; 
			}
			h1{
				/* font-family: Helvetica, sans-serif; */
				font-family: "Titillium Web", "Helvetica Neue", Helvetica, sans-serif; 
				text-align: left;
				margin: 0px;
				font-size: 84px;
				line-height: 84px;
				letter-spacing: 3px;
			}
			.accent{
				color:#0091ff;
			}
			.button{	
				font-family: "Titillium Web", "Helvetica Neue", Helvetica, sans-serif; 
				padding: 15px;		  
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				user-select: none;
				border-radius: 15px;
				background-color: rgb(0, 145, 255);
				border: none;
				color: #ffffff;
				cursor: pointer;
				display: inline-block;
				font-size: 16px;
				line-height: 1.6rem;
				text-align: center;
				text-decoration: none;
				transition: all 0.15s linear;
				box-shadow: 0 1px 2px rgba(0, 145, 255, 0.07),
				0 2px 4px rgba(0, 145, 255, 0.07), 0 4px 8px rgba(0, 145, 255, 0.07),
				0 8px 16px rgba(0, 145, 255, 0.07), 0 16px 32px rgba(0, 145, 255, 0.07),
				0 32px 64px rgba(0, 145, 255, 0.07);"
				
			}     
			a{
				font-family: "Titillium Web", "Helvetica Neue", Helvetica, sans-serif; 
				text-decoration: none;
				color:black;
				font-size: 16px;
			}       
			.footer_link{
				font-weight:normal;
			}
			hr{
				color:red;
			}
			.distance{
				margin-left:20px;
			}
			.text{
				/* font-family: Helvetica, sans-serif; */
				font-family: "Titillium Web", "Helvetica Neue", Helvetica, sans-serif; 
              	margin: 0px;
              	font-size: 16px;
              	line-height: 26px;
              	letter-spacing: 0.5px;
			}
			.hide{
				display: none;
			}
        </style>
        
    </head>
    <?php $head = ob_get_clean();
    return $head;
}

add_filter( 'um_email_template_body_attrs', 'my_email_template_body_attrs', 10, 3 );
function my_email_template_body_attrs( $body_atts, $slug, $args ) {
    $body_atts = "background: #FFFFFF;";
return $body_atts;
}


/**
 * 
 * Change UM User Role After Registration
 * 
 */
add_filter( 'um_registration_user_role', 'my_registration_user_role', 10, 2 );
function my_user_register_submitted__email( $role, $submitted ) {
    $role = "contributor";
	return $role;
}
?>