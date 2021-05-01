<?php
/**
 * Twenty Twenty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentytwenty_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'F7F7F7',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 ); // this

	// Add custom image size used in Cover Template.
	// add_image_size( 'twentytwenty-fullscreen', 1980, 9999 );

	// custom image sizes/ratios 
	// https://developer.wordpress.org/reference/functions/add_image_size/
	// with array( 'center', 'center' ) = (cropped to fit)

	// square (1:1)
	add_image_size( 'square_s', 80, 80, array( 'center', 'center' ));
	add_image_size( 'square_m', 180, 180, array( 'center', 'center' ));
	add_image_size( 'square_m2', 300, 300, array( 'center', 'center' ));
	add_image_size( 'square_l', 400, 400, array( 'center', 'center' ));
	// preview (4:3)
	add_image_size( 'preview_s', 160, 120, array( 'center', 'center' ));
	add_image_size( 'preview_m', 200, 150, array( 'center', 'center' )); 
	add_image_size( 'preview_m2', 400, 300, array( 'center', 'center' ));
	add_image_size( 'preview_m3', 600, 450, array( 'center', 'center' )); 
	add_image_size( 'preview_l', 800, 600, array( 'center', 'center' ));
	// landscape (2:1)
	add_image_size( 'landscape_s', 400, 200, array( 'center', 'center' ));
	add_image_size( 'landscape_m', 750, 375, array( 'center', 'center' ));
	add_image_size( 'landscape_l', 970, 485, array( 'center', 'center' ));

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty, use a find and replace
	 * to change 'twentytwenty' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwenty' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	/*
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 */
	if ( is_customize_preview() ) {
		require get_template_directory() . '/inc/starter-content.php';
		add_theme_support( 'starter-content', twentytwenty_get_starter_content() );
	}

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new TwentyTwenty_Script_Loader();
	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );

}

add_action( 'after_setup_theme', 'twentytwenty_theme_support' );

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';

// Handle SVG icons.
require get_template_directory() . '/classes/class-twentytwenty-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';

// Handle Customizer settings.
require get_template_directory() . '/classes/class-twentytwenty-customize.php';

// Require Separator Control class.
require get_template_directory() . '/classes/class-twentytwenty-separator-control.php';

// Custom comment walker.
require get_template_directory() . '/classes/class-twentytwenty-walker-comment.php';

// Custom page walker.
require get_template_directory() . '/classes/class-twentytwenty-walker-page.php';

// Custom script loader class.
require get_template_directory() . '/classes/class-twentytwenty-script-loader.php';

// Non-latin language handling.
require get_template_directory() . '/classes/class-twentytwenty-non-latin-languages.php';

// Custom CSS.
require get_template_directory() . '/inc/custom-css.php';

/**
 * Register and Enqueue Styles.
 */
function twentytwenty_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'twentytwenty-style', get_stylesheet_uri(), array(), $theme_version );

	// Add output of Customizer settings as inline style.
	wp_add_inline_style( 'twentytwenty-style', twentytwenty_get_customizer_css( 'front-end' ) );

	// Add print CSS.
	wp_enqueue_style( 'twentytwenty-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );

}

add_action( 'wp_enqueue_scripts', 'twentytwenty_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function twentytwenty_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'twentytwenty-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false );
	wp_script_add_data( 'twentytwenty-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'twentytwenty_register_scripts' );


// admin.css einbinden
function admin_style() {
	wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/admin.css');
	}
	add_action('admin_enqueue_scripts', 'admin_style');

	
/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentytwenty_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
<script>
/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window
    .addEventListener("hashchange", function() {
        var t, e = location.hash.substring(1);
        /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i
            .test(t.tagName) || (t.tabIndex = -1), t.focus())
    }, !1);
</script>
<?php
}
add_action( 'wp_print_footer_scripts', 'twentytwenty_skip_link_focus_fix' );

/** Enqueue non-latin language styles
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_non_latin_languages() {
	$custom_css = TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twentytwenty-style', $custom_css );
	}
}

add_action( 'wp_enqueue_scripts', 'twentytwenty_non_latin_languages' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function twentytwenty_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'twentytwenty' ),
		'expanded' => __( 'Desktop Expanded Menu', 'twentytwenty' ),
		'mobile'   => __( 'Mobile Menu', 'twentytwenty' ),
		'footer'   => __( 'Footer Menu', 'twentytwenty' ),
		'social'   => __( 'Social Menu', 'twentytwenty' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'twentytwenty_menus' );

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 * @return string
 */
function twentytwenty_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

// add_filter( 'get_custom_logo', 'twentytwenty_get_custom_logo' );

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function twentytwenty_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'twentytwenty' ) . '</a>';
}

// add_action( 'wp_body_open', 'twentytwenty_skip_link', 5 );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentytwenty_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'twentytwenty' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'twentytwenty' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
			)
		)
	);

}

// add_action( 'widgets_init', 'twentytwenty_sidebar_registration' );

/**
 * Enqueue supplemental block editor styles.
 */
function twentytwenty_block_editor_styles() {

	// Enqueue the editor styles.
	wp_enqueue_style( 'twentytwenty-block-editor-styles', get_theme_file_uri( '/assets/css/editor-style-block.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );

	// Add inline style from the Customizer.
	wp_add_inline_style( 'twentytwenty-block-editor-styles', twentytwenty_get_customizer_css( 'block-editor' ) );

	// Add inline style for non-latin fonts.
	wp_add_inline_style( 'twentytwenty-block-editor-styles', TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'block-editor' ) );

	// Enqueue the editor script.
	wp_enqueue_script( 'twentytwenty-block-editor-script', get_theme_file_uri( '/assets/js/editor-script-block.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'twentytwenty_block_editor_styles', 1, 1 );

/**
 * Enqueue classic editor styles.
 */
function twentytwenty_classic_editor_styles() {

	$classic_editor_styles = array(
		'/assets/css/editor-style-classic.css',
	);

	add_editor_style( $classic_editor_styles );

}

add_action( 'init', 'twentytwenty_classic_editor_styles' );

/**
 * Output Customizer settings in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function twentytwenty_add_classic_editor_customizer_styles( $mce_init ) {

	$styles = twentytwenty_get_customizer_css( 'classic-editor' );

	if ( ! isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;

}

add_filter( 'tiny_mce_before_init', 'twentytwenty_add_classic_editor_customizer_styles' );

/**
 * Output non-latin font styles in the classic editor.
 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.
 *
 * @param array $mce_init TinyMCE styles.
 * @return array TinyMCE styles.
 */
function twentytwenty_add_classic_editor_non_latin_styles( $mce_init ) {

	$styles = TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'classic-editor' );

	// Return if there are no styles to add.
	if ( ! $styles ) {
		return $mce_init;
	}

	if ( ! isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] = $styles . ' ';
	} else {
		$mce_init['content_style'] .= ' ' . $styles . ' ';
	}

	return $mce_init;

}

add_filter( 'tiny_mce_before_init', 'twentytwenty_add_classic_editor_non_latin_styles' );

/**
 * Block Editor Settings.
 * Add custom colors and font sizes to the block editor.
 */
function twentytwenty_block_editor_settings() {

	// Block Editor Palette.
	$editor_color_palette = array(
		array(
			'name'  => __( 'Accent Color', 'twentytwenty' ),
			'slug'  => 'accent',
			'color' => twentytwenty_get_color_for_area( 'content', 'accent' ),
		),
		array(
			'name'  => __( 'Primary', 'twentytwenty' ),
			'slug'  => 'primary',
			'color' => twentytwenty_get_color_for_area( 'content', 'text' ),
		),
		array(
			'name'  => __( 'Secondary', 'twentytwenty' ),
			'slug'  => 'secondary',
			'color' => twentytwenty_get_color_for_area( 'content', 'secondary' ),
		),
		array(
			'name'  => __( 'Subtle Background', 'twentytwenty' ),
			'slug'  => 'subtle-background',
			'color' => twentytwenty_get_color_for_area( 'content', 'borders' ),
		),
	);

	// Add the background option.
	$background_color = get_theme_mod( 'background_color' );
	if ( ! $background_color ) {
		$background_color_arr = get_theme_support( 'custom-background' );
		$background_color     = $background_color_arr[0]['default-color'];
	}
	$editor_color_palette[] = array(
		'name'  => __( 'Background Color', 'twentytwenty' ),
		'slug'  => 'background',
		'color' => '#' . $background_color,
	);

	// If we have accent colors, add them to the block editor palette.
	if ( $editor_color_palette ) {
		add_theme_support( 'editor-color-palette', $editor_color_palette );
	}

	// Block Editor Font Sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => _x( 'Small', 'Name of the small font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the block editor.', 'twentytwenty' ),
				'size'      => 18,
				'slug'      => 'small',
			),
			array(
				'name'      => _x( 'Regular', 'Name of the regular font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the block editor.', 'twentytwenty' ),
				'size'      => 21,
				'slug'      => 'normal',
			),
			array(
				'name'      => _x( 'Large', 'Name of the large font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the block editor.', 'twentytwenty' ),
				'size'      => 26.25,
				'slug'      => 'large',
			),
			array(
				'name'      => _x( 'Larger', 'Name of the larger font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the block editor.', 'twentytwenty' ),
				'size'      => 32,
				'slug'      => 'larger',
			),
		)
	);

	add_theme_support( 'editor-styles' );

	// If we have a dark background color then add support for dark editor style.
	// We can determine if the background color is dark by checking if the text-color is white.
	if ( '#ffffff' === strtolower( twentytwenty_get_color_for_area( 'content', 'text' ) ) ) {
		add_theme_support( 'dark-editor-style' );
	}

}

add_action( 'after_setup_theme', 'twentytwenty_block_editor_settings' );

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 * @return string
 */
function twentytwenty_read_more_tag( $html ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}

add_filter( 'the_content_more_link', 'twentytwenty_read_more_tag' );

/**
 * Enqueues scripts for customizer controls & settings.
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_customize_controls_enqueue_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// Add main customizer js file.
	wp_enqueue_script( 'twentytwenty-customize', get_template_directory_uri() . '/assets/js/customize.js', array( 'jquery' ), $theme_version, false );

	// Add script for color calculations.
	wp_enqueue_script( 'twentytwenty-color-calculations', get_template_directory_uri() . '/assets/js/color-calculations.js', array( 'wp-color-picker' ), $theme_version, false );

	// Add script for controls.
	wp_enqueue_script( 'twentytwenty-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array( 'twentytwenty-color-calculations', 'customize-controls', 'underscore', 'jquery' ), $theme_version, false );
	wp_localize_script( 'twentytwenty-customize-controls', 'twentyTwentyBgColors', twentytwenty_get_customizer_color_vars() );
}

// add_action( 'customize_controls_enqueue_scripts', 'twentytwenty_customize_controls_enqueue_scripts' );

// no jquery if not admin
// if ( !is_admin() ) wp_deregister_script('jquery');

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty 1.0
 *
 * @return void
 */
function twentytwenty_customize_preview_init() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'twentytwenty-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview', 'customize-selective-refresh', 'jquery' ), $theme_version, true );
	wp_localize_script( 'twentytwenty-customize-preview', 'twentyTwentyBgColors', twentytwenty_get_customizer_color_vars() );
	wp_localize_script( 'twentytwenty-customize-preview', 'twentyTwentyPreviewEls', twentytwenty_get_elements_array() );

	wp_add_inline_script(
		'twentytwenty-customize-preview',
		sprintf(
			'wp.customize.selectiveRefresh.partialConstructor[ %1$s ].prototype.attrs = %2$s;',
			wp_json_encode( 'cover_opacity' ),
			wp_json_encode( twentytwenty_customize_opacity_range() )
		)
	);
}

// add_action( 'customize_preview_init', 'twentytwenty_customize_preview_init' );

/**
 * Get accessible color for an area.
 *
 * @since Twenty Twenty 1.0
 *
 * @param string $area The area we want to get the colors for.
 * @param string $context Can be 'text' or 'accent'.
 * @return string Returns a HEX color.
 */
function twentytwenty_get_color_for_area( $area = 'content', $context = 'text' ) {

	// Get the value from the theme-mod.
	$settings = get_theme_mod(
		'accent_accessible_colors',
		array(
			'content'       => array(
				'text'      => '#000000',
				'accent'    => '#0091FF',
				'secondary' => '#0091FF',
				'borders'   => '#dcd7ca',
			),
			'header-footer' => array(
				'text'      => '#000000',
				'accent'    => '#0091FF',
				'secondary' => '#0091FF',
				'borders'   => '#dcd7ca',
			),
		)
	);

	// If we have a value return it.
	if ( isset( $settings[ $area ] ) && isset( $settings[ $area ][ $context ] ) ) {
		return $settings[ $area ][ $context ];
	}

	// Return false if the option doesn't exist.
	return false;
}

/**
 * Returns an array of variables for the customizer preview.
 *
 * @since Twenty Twenty 1.0
 *
 * @return array
 */
function twentytwenty_get_customizer_color_vars() {
	$colors = array(
		'content'       => array(
			'setting' => 'background_color',
		),
		'header-footer' => array(
			'setting' => 'header_footer_background_color',
		),
	);
	return $colors;
}

/**
 * Get an array of elements.
 *
 * @since Twenty Twenty 1.0
 *
 * @return array
 */
function twentytwenty_get_elements_array() {

	// The array is formatted like this:
	// [key-in-saved-setting][sub-key-in-setting][css-property] = [elements].
	$elements = array(
		'content'       => array(
			'accent'     => array(
				'color'            => array( '.color-accent', '.color-accent-hover:hover', '.color-accent-hover:focus', ':root .has-accent-color', '.has-drop-cap:not(:focus):first-letter', '.wp-block-button.is-style-outline', 'a' ),
				'border-color'     => array( 'blockquote', '.border-color-accent', '.border-color-accent-hover:hover', '.border-color-accent-hover:focus' ),
				'background-color' => array( 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file .wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.bg-accent', '.bg-accent-hover:hover', '.bg-accent-hover:focus', ':root .has-accent-background-color', '.comment-reply-link' ),
				'fill'             => array( '.fill-children-accent', '.fill-children-accent *' ),
			),
			'background' => array(
				'color'            => array( ':root .has-background-color', 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.wp-block-button', '.comment-reply-link', '.has-background.has-primary-background-color:not(.has-text-color)', '.has-background.has-primary-background-color *:not(.has-text-color)', '.has-background.has-accent-background-color:not(.has-text-color)', '.has-background.has-accent-background-color *:not(.has-text-color)' ),
				'background-color' => array( ':root .has-background-background-color' ),
			),
			'text'       => array(
				'color'            => array( 'body', '.entry-title a', ':root .has-primary-color' ),
				'background-color' => array( ':root .has-primary-background-color' ),
			),
			'secondary'  => array(
				'color'            => array( 'cite', 'figcaption', '.wp-caption-text', '.post-meta', '.entry-content .wp-block-archives li', '.entry-content .wp-block-categories li', '.entry-content .wp-block-latest-posts li', '.wp-block-latest-comments__comment-date', '.wp-block-latest-posts__post-date', '.wp-block-embed figcaption', '.wp-block-image figcaption', '.wp-block-pullquote cite', '.comment-metadata', '.comment-respond .comment-notes', '.comment-respond .logged-in-as', '.pagination .dots', '.entry-content hr:not(.has-background)', 'hr.styled-separator', ':root .has-secondary-color' ),
				'background-color' => array( ':root .has-secondary-background-color' ),
			),
			'borders'    => array(
				'border-color'        => array( 'pre', 'fieldset', 'input', 'textarea', 'table', 'table *', 'hr' ),
				'background-color'    => array( 'caption', 'code', 'code', 'kbd', 'samp', '.wp-block-table.is-style-stripes tbody tr:nth-child(odd)', ':root .has-subtle-background-background-color' ),
				'border-bottom-color' => array( '.wp-block-table.is-style-stripes' ),
				'border-top-color'    => array( '.wp-block-latest-posts.is-grid li' ),
				'color'               => array( ':root .has-subtle-background-color' ),
			),
		),
		'header-footer' => array(
			'accent'     => array(
				'color'            => array( 'body:not(.overlay-header) .primary-menu > li > a', 'body:not(.overlay-header) .primary-menu > li > .icon', '.modal-menu a', '.footer-menu a, .footer-widgets a', '#site-footer .wp-block-button.is-style-outline', '.wp-block-pullquote:before', '.singular:not(.overlay-header) .entry-header a', '.archive-header a', '.header-footer-group .color-accent', '.header-footer-group .color-accent-hover:hover' ),
				'background-color' => array( '.social-icons a', '#site-footer button:not(.toggle)', '#site-footer .button', '#site-footer .faux-button', '#site-footer .wp-block-button__link', '#site-footer .wp-block-file__button', '#site-footer input[type="button"]', '#site-footer input[type="reset"]', '#site-footer input[type="submit"]' ),
			),
			'background' => array(
				'color'            => array( '.social-icons a', 'body:not(.overlay-header) .primary-menu ul', '.header-footer-group button', '.header-footer-group .button', '.header-footer-group .faux-button', '.header-footer-group .wp-block-button:not(.is-style-outline) .wp-block-button__link', '.header-footer-group .wp-block-file__button', '.header-footer-group input[type="button"]', '.header-footer-group input[type="reset"]', '.header-footer-group input[type="submit"]' ),
				'background-color' => array( '#site-header', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal', '.menu-modal-inner', '.search-modal-inner', '.archive-header', '.singular .entry-header', '.singular .featured-media:before', '.wp-block-pullquote:before' ),
			),
			'text'       => array(
				'color'               => array( '.header-footer-group', 'body:not(.overlay-header) #site-header .toggle', '.menu-modal .toggle' ),
				'background-color'    => array( 'body:not(.overlay-header) .primary-menu ul' ),
				'border-bottom-color' => array( 'body:not(.overlay-header) .primary-menu > li > ul:after' ),
				'border-left-color'   => array( 'body:not(.overlay-header) .primary-menu ul ul:after' ),
			),
			'secondary'  => array(
				'color' => array( '.site-description', 'body:not(.overlay-header) .toggle-inner .toggle-text', '.widget .post-date', '.widget .rss-date', '.widget_archive li', '.widget_categories li', '.widget cite', '.widget_pages li', '.widget_meta li', '.widget_nav_menu li', '.powered-by-wordpress', '.to-the-top', '.singular .entry-header .post-meta', '.singular:not(.overlay-header) .entry-header .post-meta a' ),
			),
			'borders'    => array(
				'border-color'     => array( '.header-footer-group pre', '.header-footer-group fieldset', '.header-footer-group input', '.header-footer-group textarea', '.header-footer-group table', '.header-footer-group table *', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal nav *', '.footer-widgets-outer-wrapper', '.footer-top' ),
				'background-color' => array( '.header-footer-group table caption', 'body:not(.overlay-header) .header-inner .toggle-wrapper::before' ),
			),
		),
	);

	/**
	* Filters Twenty Twenty theme elements
	*
	* @since Twenty Twenty 1.0
	*
	* @param array Array of elements
	*/
	return apply_filters( 'twentytwenty_get_elements_array', $elements );
}


/**
 *  -------------------------------------------------------- Custom Functions --------------------------------------------------------
 */

/**
 * Table of Contents:
 * 	- Setup
 * 	- File Managment
 * 	- General Functions 
 * 	- Ajax Functions
 * 	- Backend Functions
 * 	- Public functions
 * 
 */


/**
 *  -------------------------------------------------------- Setup --------------------------------------------------------
 */

/**
 * Remove Default WP Widgets
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */

function remove_default_WP_widgets( ){
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
} add_action( 'widgets_init', 'remove_default_WP_widgets' );


/**
 * Call setup files
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
require_once dirname( __FILE__ ) .'/setup/main.php'; # General
require_once dirname( __FILE__ ) .'/setup/immigration.php'; # Immigration
require_once dirname( __FILE__ ) .'/setup/settings.php'; # Setting Page
require_once dirname( __FILE__ ) .'/setup/kontakt.php'; # Kontakt / Biografie
require_once dirname( __FILE__ ) .'/setup/blocks.php'; # Blocks
require_once dirname( __FILE__ ) .'/setup/projekte.php'; # Projekte
require_once dirname( __FILE__ ) .'/setup/nachrichten.php'; # Nachrichten
require_once dirname( __FILE__ ) .'/setup/veranstaltungen.php'; # Veranstaltungen
require_once dirname( __FILE__ ) .'/setup/umfragen.php'; # Umfragen
require_once dirname( __FILE__ ) .'/setup/fragen.php'; # Fragen
require_once dirname( __FILE__ ) .'/setup/angebote.php'; # Angebote
require_once dirname( __FILE__ ) .'/setup/sdg.php'; # SDG
// require_once dirname( __FILE__ ) .'/setup/anmerkungen.php'; # Anmerkungen

/**
 * Call UM & ACF function files
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
if (class_exists('UM')) { # Ultimate Member
	require dirname( __FILE__ ) .'/functions/ultimate-member.php';
}
if (class_exists('acf_pro')) { # Advanced custom fields
	require dirname( __FILE__ ) .'/functions/advanced-custom-fields.php';
}

/**
 * Admin notes & warnings
 *
 * @since Quartiersplattform 1.0
 *
 * @return string
 */
add_action('admin_init', function() {
	# ACF Pro
	if (!class_exists('acf_pro')) {
		add_action('admin_notices', function() {
			$notice = __('Deine Quartiersplattform benötigt das Plugin <strong>Advaced Custom Fields,</strong> um vollständig funktionieren zu können.', 'quartiersplattform');
			$link = '<strong>Advaced Custom Fields</strong> <a href='.get_site_url().'/wp-admin/plugin-install.php?s=Advanced%20custom%20fields&tab=search&type=term">Installiere ACF</a>';
			echo "<div class='error'><p>$notice<br>$link<br></p></div>";
		});
	}
	# Ultimate Memmber
	if (!class_exists('UM')) {

		add_action('admin_notices', function() {
			$notice = __('Deine Quartiersplattform benötigt das Plugin <strong>Ultimate Member,</strong> um vollständig funktionieren zu können.', 'quartiersplattform');
			$link = '<strong>Ultimate Member</strong> <a href="'.get_site_url().'/wp-admin/plugin-install.php?s=Ultimate%20Member&tab=search&type=term">Installiere Ultimate Member</a>';
			echo "<div class='error'><p>$notice<br>$link<br></p></div>";
		});
	}
	# Quartiersplattform is running
	if (class_exists('acf_pro') && class_exists('UM')) {

		add_action('admin_notices', function() {
			$notice = "Gratulation, deine Quartiersplattform wurde erfolgreich aufgesetzt.";
			reminder_backend('setup-finished', $notice, 'updated notice');
		});

	}
	# Install Ultimate Member
	if (class_exists('UM')) {

		add_action('admin_notices', function() {
			$notice = "Richte das Ultimate Member Plugin vollständig ein.";
			$link = '<a href="https://github.com/studio-arrenberg/quartiersplattform/blob/main/documentation/Ultimate_Member.md" class="button button-primary">Anleitung öffnen</a>';
			reminder_backend('install-UM', $notice.'<br>'.$link, 'updated notice');
		});

	}
	# WP Mail SMTP suggestion
	if (class_exists('wp_mail_smtp')) {

		add_action('admin_notices', function() {
			$notice = "Richte das WP Mail SMTP Plugin vollständig ein, um eine zuverlässige E-Mail-Zustellung zu gewährleisten.";
			$link = '<a href="https://github.com/studio-arrenberg/quartiersplattform/blob/main/documentation/WP_Mail_SMTP.md" class="button button-primary" target="_blank">Anleitung öffnen</a>';
			reminder_backend('wp_mail_smtp-setup', $notice.'<br>'.$link, 'updated notice');
		});
	}
	# Datenschutz reminder
	if (!get_privacy_policy_url() && class_exists('acf_pro') && class_exists('UM')) {

		add_action('admin_notices', function() {
			$notice = __('Deine Quartiersplattform hat noch <strong>keine Datenschutzerklärung.</strong>', 'quartiersplattform');
			$link = '<a class="button button-primary" href="'.get_site_url().'/wp-admin/options-privacy.php">Datenschutzerklärung erstellen</a>';
			reminder_backend('datenschutz-reminder-setup', $notice.'<br>'.$link, 'updated notice');
		});

	}
	# reminder for settings
	if (class_exists('acf_pro') && class_exists('UM')) {


		add_action('admin_notices', function() {
			$notice = __('Richte das Logo sowie den Namen deiner Quartiersplattform ein ', 'quartiersplattform');
			$link = '<a class="button button-primary" href="'.get_site_url().'/wp-admin/admin.php?page=theme-general-settings">Zu den Einstellungen</a>';
			reminder_backend('qp-settings-reminder-setup', $notice.'<br>'.$link, 'updated notice');
		});

	}
	# WP Mail SMTP
	if (!function_exists( 'wp_mail_smtp' )) {

		add_action('admin_notices', function() {
			$notice = __('Wir empfehlen das Plugin <strong>WP Mail SMTP</strong> zu installieren, um eine zuverlässige E-Mail Zustellung zu gewährleisten.', 'quartiersplattform');
			$link = '<strong>WP Mail SMTP</strong> <a href="'.get_site_url().'/wp-admin/plugin-install.php?s=WP+Mail+SMTP&tab=search&type=term">installieren</a>';
			reminder_backend('qp-mail-smtp-suggestion', $notice.'<br>'.$link, 'updated notice');
		});

	}
});


/**
 * Assign templates to pages
 *
 * @since Quartiersplattform 1.0
 * @param array $page_template 
 * @param array $post_states
 * @return string
 */
function custom_page_template( $page_template, $post_states ) {
	global $post;

	$post_states = [];
	$prefix = "QP ";

	if ($post->post_title == "Startseite") {
		$post_states[] = $prefix.'Startseite';
		$page_template= get_stylesheet_directory() . '/pages/page-quartier.php';
	}
	else if ($post->post_title == "Projekte") {
		$post_states[] = $prefix.'Projekte';
		$page_template= get_stylesheet_directory() . '/pages/projekt-feed.php';
	}
	else if ($post->post_title == "Veranstaltungen") {
		$post_states[] = $prefix.'Veranstaltungen';
		$page_template= get_stylesheet_directory() . '/pages/page-veranstaltungen.php';
	}
	else if ($post->post_title == "Projektverzeichnis") {
		$post_states[] = $prefix.'Projektverzeichnis';
		$page_template= get_stylesheet_directory() . '/pages/page-projekte.php';
	}
	else if ($post->post_title == "Projekt erstellen") {
		$post_states[] = $prefix.'Projekt erstellen';
		$page_template= get_stylesheet_directory() . '/forms/form-projekte.php';
	}
	else if ($post->post_title == "Gemeinsam") {
		$post_states[] = $prefix.'Gemeinsam';
		$page_template= get_stylesheet_directory() . '/pages/page-gemeinsam.php';
	}
	else if ($post->post_title == "Frage erstellen") {
		$post_states[] = $prefix.'Frage erstellen';
		$page_template= get_stylesheet_directory() . '/forms/form-fragen.php';
	}
	else if ($post->post_title == "Angebot erstellen") {
		$post_states[] = $prefix.'Angebot erstellen';
		$page_template= get_stylesheet_directory() . '/forms/form-angebote.php';
	}
	else if ($post->post_title == "Anmerkungen") {
		$post_states[] = $prefix.'Anmerkungen';
		$page_template= get_stylesheet_directory() . '/pages/page-anmerkungen.php';
	}
	else if ($post->post_title == "Profil") {
		$post_states[] = $prefix.'Profil';
		$page_template= get_stylesheet_directory() . '/pages/page-profil.php';
	}
	else if ($post->post_title == "Nachricht erstellen") {
		$post_states[] = $prefix.'Nachricht erstellen';
		$page_template= get_stylesheet_directory() . '/forms/form-nachrichten.php';
	}
	else if ($post->post_title == "Umfrage erstellen") {
		$post_states[] = $prefix.'Umfrage erstellen';
		$page_template= get_stylesheet_directory() . '/forms/form-umfragen.php';
	}
	else if ($post->post_title == "Veranstaltung erstellen") {
		$post_states[] = $prefix.'Veranstaltung erstellen';
		$page_template= get_stylesheet_directory() . '/forms/form-veranstaltungen.php';
	}
	else if ($post->post_title == "SDGs") {
		$post_states[] = $prefix.'SDGs';
		$page_template= get_stylesheet_directory() . '/pages/page-sdg.php';
	}
	else if ($post->post_title == "Anmelden") {
		$post_states[] = $prefix.'Anmelden';
		$page_template= get_stylesheet_directory() . '/templates/center-header.php';
	}
	else if ($post->post_title == "Registrieren") {
		$post_states[] = $prefix.'Registrieren';
		$page_template= get_stylesheet_directory() . '/templates/center-header.php';
	}
	else if ($post->post_title == "Passwort zurücksetzen") {
		$post_states[] = $prefix.'Passwort zurücksetzen';
		$page_template= get_stylesheet_directory() . '/templates/center-header.php';
	}
	
	
	if (doing_filter( 'page_template') && !empty($page_template)) {
		return $page_template;
	}
	else if (doing_filter( 'display_post_states') && !empty($post_states)) {
		return $post_states;
	}
}
add_filter( 'page_template', 'custom_page_template', 10, 2 );
add_filter( 'display_post_states', 'custom_page_template', 1, 2);


/**
 * Assign templates for custom post types
 *
 * @since Quartiersplattform 1.0
 *
 * @return string
 */
add_filter( 'single_template', 'single_template_hook', 11 );
function single_template_hook() {

	global $post;

	if ( 'umfragen' === $post->post_type ) {
        $single_template = dirname( __FILE__ ) . '/pages/single-umfragen.php';
    }
	else if ( 'projekte' === $post->post_type ) {
        $single_template = dirname( __FILE__ ) . '/pages/single-projekte.php';
    }
	else if ( 'geschichten' === $post->post_type ) {
        $single_template = dirname( __FILE__ ) . '/pages/single-geschichten.php';
    }
	else if ( 'fragen' === $post->post_type ) {
        $single_template = dirname( __FILE__ ) . '/pages/single-fragen.php';
    }
	else if ( 'angebote' === $post->post_type ) {
        $single_template = dirname( __FILE__ ) . '/pages/single-angebote.php';
    }
	else if ( 'nachrichten' === $post->post_type ) {
        $single_template = dirname( __FILE__ ) . '/pages/single-nachrichten.php';
    }
	else if ( 'anmerkungen' === $post->post_type ) {
        $single_template = dirname( __FILE__ ) . '/pages/single-anmerkungen.php';
    }
	else if ( 'veranstaltungen' === $post->post_type ) {
        $single_template = dirname( __FILE__ ) . '/pages/single-veranstaltungen.php';
    }

	if (doing_filter( 'single_template') && !empty($single_template) ) {
		return $single_template;
	}
}

/**
 *  -------------------------------------------------------- File Managment --------------------------------------------------------
 */

/**
 * Remove dashicons in frontend to non-admin  
 *
 * @since Quartiersplattform 1.0
 *
 * @return string
 */
function wpdocs_dequeue_dashicon() {
	if (current_user_can( 'update_core' )) {
		return;
	}
	wp_deregister_style('dashicons');
} add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );


/**
 * Disable twenty twenty inline styles
 *
 * @since Quartiersplattform 1.0
 *
 * @return string
 */
add_action( 'wp_enqueue_scripts', function() {
	$styles = wp_styles();
	$styles->add_data( 'twentytwenty-style', 'after', array() );
}, 20 );


/**
 * Replace Core jQuery Version
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function replace_core_jquery_version() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.1.1.min.js", array(), '3.1.1' );
} add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );

/**
 * Register Scripts & Stylesheets
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function register_scripts() {

	// !!! update wp_register_script &  wp_register_style with timestemp

	// create my own version codes
    // $my_js_ver  = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'js/custom.js' ));
    // $my_css_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'style.css' ));
     
    // wp_enqueue_script( 'custom_js', plugins_url( 'js/custom.js', __FILE__ ), array(), $my_js_ver );
    // wp_register_style( 'my_css',    plugins_url( 'style.css',    __FILE__ ), false,   $my_css_ver );
    // wp_enqueue_style ( 'my_css' );

} add_action('init', 'register_scripts', 9);

/**
 * Control comment author URL
 *
 * @param $return
 * @param $author
 * @param $comment_ID
 *
 * @return string
 */
function qp_comment_url_to_profile( $return, $author, $comment_ID ) {

	$comment = get_comment( $comment_ID );

	if( isset( $comment->user_id ) && ! empty(  $comment->user_id ) ){
		$return = home_url( ).'/author/'.get_the_author();
	}

	return $return;
} add_filter('get_comment_author_url', 'qp_comment_url_to_profile', 10000, 3 );

/**
 * Control comment author Name
 *
 * @param $return
 * @param $author
 * @param $comment_ID
 *
 * @return string
 */
function qp_comment_author( $return, $author, $comment_ID ) {

	$comment = get_comment( $comment_ID );
	// %&/ghjUiiou56
	$author =  get_user_by('ID', $comment->user_id);

	if ($comment->user_id) {
		return $author->first_name." ".$author->last_name;
	}

	return $return;

} add_filter('get_comment_author', 'qp_comment_author', 10000, 3 );


/**
 * Conditinally load jQuery and Emoji files
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function load_scripts() {

	$REQUEST_URI = $_SERVER['REQUEST_URI'];

    if (
		!is_admin() 
		// && is_front_page()
		&& strpos($REQUEST_URI,'/profil/') === false
		&& strpos($REQUEST_URI,'/frage-erstellen/') === false
		&& strpos($REQUEST_URI,'/angebot-erstellen/') === false
		&& strpos($REQUEST_URI,'/projekt-erstellen/') === false
		&& strpos($REQUEST_URI,'/nachricht-erstellen/') === false
		&& strpos($REQUEST_URI,'/umfrage-erstellen/') === false
		&& strpos($REQUEST_URI,'/veranstaltung-erstellen/') === false
		&& strpos($REQUEST_URI,'/register/') === false
		&& !$_GET['action'] == 'edit'
	 ) {

		// jQuery min
		wp_deregister_script('jquery-ui-draggable');
		wp_deregister_script('jquery-ui-mouse');
		wp_deregister_script('jquery-ui-resizable');
		wp_deregister_script('jquery-ui-sortable');
		wp_deregister_script('jquery-ui-widget');
		wp_deregister_script('jquery-ui-selectable');
		// wp_deregister_script('jquery-ui-core');
		// wp_deregister_script( 'jquery-core' );

		// initially called for ajax
		// wp_deregister_script( 'jquery-core' );

		// jQuery
        // wp_deregister_script('jquery');
		wp_register_script('jquery', false, false, true);

		// emoji picker
		wp_deregister_script('emoji_picker-config');
		wp_deregister_script('emoji_picker-util');
		wp_deregister_script('emoji_picker-emojiarea');
		wp_deregister_script('emoji_picker-picker');

		// wp customize scripts
		wp_deregister_script('twentytwenty-color-calculations');

		// scripts for ajax
		wp_enqueue_script( 'jquery-form' );
		wp_enqueue_script( 'jquery-core' );

	 }

}
add_action('init', 'load_scripts', 11);

/**
 * Register emoji picker script
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function emoji_picker() { 

	$REQUEST_URI = $_SERVER['REQUEST_URI'];

    if (
		strpos($REQUEST_URI,'/frage-erstellen/') !== false
		|| strpos($REQUEST_URI,'/angebot-erstellen/') !== false
		|| strpos($REQUEST_URI,'/projekt-erstellen/') !== false
		|| $_GET['action'] == 'edit'
		// || is_front_page()
	 ) {
		
		wp_register_script('emoji_picker-config', get_template_directory_uri() .'/assets/emoji-picker/config.js',  false, false, true);
		wp_enqueue_script('emoji_picker-config');
		wp_register_script('emoji_picker-util', get_template_directory_uri() .'/assets/emoji-picker/util.js',  false, false, false);
		wp_enqueue_script('emoji_picker-util');
		wp_register_script('emoji_picker-emojiarea', get_template_directory_uri() .'/assets/emoji-picker/jquery.emojiarea.js',  false, false, true);
		wp_enqueue_script('emoji_picker-emojiarea');
		wp_register_script('emoji_picker-picker', get_template_directory_uri() .'/assets/emoji-picker/emoji-picker.js', false, false, true);
		wp_enqueue_script('emoji_picker-picker');
		wp_register_style( 'emoji_picker-css', get_template_directory_uri() .'/assets/emoji-picker/emoji.css' );
		wp_enqueue_style( 'emoji_picker-css' );

		// wp_register_script('emoji-picker-init', get_template_directory_uri() .'/assets/js/emoji-picker-init.js', array('jQuery', 'emoji_picker-config'), false, true);
		// wp_enqueue_script('emoji-picker-init');

	}
      
}
add_action("wp_enqueue_scripts", "emoji_picker");


/**
 * Register embla carousel script
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function embla_carousel() { 
    wp_register_script('embla-carousel', get_template_directory_uri() .'/assets/embla-carousel-master/embla-carousel.umd.js', false, false);
    wp_enqueue_script('embla-carousel');
} add_action("wp_enqueue_scripts", "embla_carousel");


/**
 *  -------------------------------------------------------- General Functions --------------------------------------------------------
 */


/**
 * Prolong loged in session cookie
 *
 * @since Quartiersplattform 1.0
 *
 * @param integer $expire
 * @return void
 */
function wpdev_login_session( $expire ) {
    return YEAR_IN_SECONDS;
} add_filter ( 'auth_cookie_expiration', 'wpdev_login_session' );

/**
 * Set visitor cookie
 *
 * @since Quartiersplattform 1.6
 *
 * @return string
 */
function display_cookie_warning() {

	$REQUEST_URI = $_SERVER['REQUEST_URI'];

	if (!isset($_COOKIE['visitor']) && !is_user_logged_in() && ( strpos($REQUEST_URI,'/impressum/') === false && strpos($REQUEST_URI,'/datenschutzerklaerung/') === false ) ) {
		get_template_part( 'components/cookie/cookie-alert' );
	}

}

/**
 * Set guest cookie (ajax)
 *
 * @since Quartiersplattform 1.7
 *
 * @return string
 */
function set_cookie_callback(){
	# check if cookie not set
    if (!isset($_COOKIE['visitor']) && !is_user_logged_in()) {
		# get/increase or set guest counter
		if (!get_option('visitor_counter')) {
			add_option('visitor_counter', 1);
		}
		// get/increase guest counter
		else {
			$counter = get_option('visitor_counter') + 1;
			update_option('visitor_counter', $counter);
		}
		// set guest cookie
		$path = parse_url(get_option('siteurl'), PHP_URL_PATH);
		$host = parse_url(get_option('siteurl'), PHP_URL_HOST);
		$expiry = strtotime('+1 year');
		setcookie('visitor', md5($counter), $expiry, $path, $host);

		return;
    }  
} 
// add_action('init', 'set_user_cookie_inc_guest');
add_action( 'wp_ajax_set_cookie', 'set_cookie_callback' );
add_action( 'wp_ajax_nopriv_set_cookie', 'set_cookie_callback' );



/**
 * Set Cookie on login
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function add_custom_cookie_admin() {
	wp_set_auth_cookie( get_current_user_id( ), true, is_ssl() );
} 
add_action('wp_login', 'add_custom_cookie_admin');


/**
 * Redirect WP Login
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function redirect_wp_login(){
	global $pagenow;
	if (('wp-login.php' == $pagenow )&&(!is_user_logged_in())){
		wp_redirect(get_site_url().'/login');
		exit();
	}
}
add_action('init','redirect_wp_login');


/**
 * Veranstaltungen archive custom order
 *
 * @since Quartiersplattform 1.0
 *
 * @param array $query
 * @return array
 */
add_action( 'pre_get_posts', function ( $query ) {
    if ( is_post_type_archive( 'veranstaltungen' ) && $query->is_main_query() ) {
        $query->set( 'orderby', 'meta_value' );
        $query->set( 'order', 'DESC' );
        $query->set( 'meta_key', 'event_date' );
    }
} );

/**
 * Projekt archive custom post types
 *
 * @since Quartiersplattform 1.0
 *
 * @param array $query
 * @return array
 */
add_action( 'pre_get_posts', function ( $query ) {
    if ( is_tax( 'projekt' ) && $query->is_main_query() && !current_user_can('administrator') ) {
        $query->set( 'post_type', array('veranstaltungen','nachrichten') );
    }
} );


/**
 * Remove Website field form Comments
 *
 * @since Quartiersplattform 1.0
 *
 * @return array
 */
add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}

/**
 * Custom Post Type Save function
 * (Anmerkungen, Angebote & Fragen, Nachrichten, Umfragen, Veranstaltungen)
 *
 * @since Quartiersplattform 1.0
 *
 * @param integer $post_id
 * @return void
 */
add_action('acf/save_post', 'cpt_save_worker', 20);
function cpt_save_worker( $post_id ) {

	// Post Type Anmerkungen
	if ( get_post_type($post_id) == 'anmerkungen' ) {
		// Get Post ID 
		$my_post = array();
		$my_post['ID'] = $post_id;
		// Get Text
		$text = get_field( 'text', $post_id );
		$my_post['post_title'] = shorten($text, 50);
		wp_update_post( $my_post ); 
		// update taxonomy
		if(!has_term('', 'anmerkungen_status') ){
			wp_set_object_terms( $post_id, 'vorschlag', 'anmerkungen_status', false );
		}

	}
	// Post type fragen & angebote 
	else if ( get_post_type($post_id) == 'angebote' || get_post_type($post_id) == 'fragen' ) {
		// Get Post ID 
		$my_post = array();
		$my_post['ID'] = $post_id;
		$text = get_field( 'text', $post_id );		
		$my_post['post_title'] = shorten($text, 50);
		// create slug
		$my_post['post_name'] = wp_unique_post_slug( sanitize_title($my_post['post_title']), $my_post['ID'], $my_post['post_status'], $my_post['post_type'], $my_post['post_parent'] );
		// set expire meta field with timestamp
		if (get_field('duration', $post_id ) == 'Stunde') $duration = (60*60);
		else if (get_field('duration', $post_id ) == 'Tag') $duration = (60*60*24);
		else if (get_field('duration', $post_id ) == 'Woche') $duration = (60*60*24*7);
		// set field
		update_post_meta($post_id, 'expire_timestamp', current_time('timestamp') + get_field('duration', $post_id ));
		// update post
		wp_update_post( $my_post ); // Update the post into the database
	}
	// Umfragen
	else if ( get_post_type($post_id) == 'umfragen' ) {

		// create poll count array
    	$array;
		$i = 0;
		$rows = get_field('questions', $post_id);
		if( $rows ) {
			foreach( $rows as $row ) {
				$array[$i] = array('field' => $row['item'], 'user' => array(), 'count' => 0);
				$i++;
			}
		}
		$array_prev = get_post_meta(get_the_ID(), 'polls', true);
		// add or update array
		if ( ! add_post_meta($post_id, 'polls', $array, true) || $array_prev[0]['total_voter'] == 0 || !isset($array_prev[0]['total_voter']) ) { 
			update_post_meta ( $post_id, 'polls', $array );
    	}
  	}
	// assign post to project
	if (in_array( get_post_type($post_id), array('nachrichten', 'veranstaltungen', 'umfragen') )) {

		// set projekt visibility
		$visibilty_status = get_field('qp_visibility', $post_id);
		if (empty($visibilty_status)) {
			$status = 'publish';
		}
		else if ($visibilty_status === true) {
			$status = 'publish';
		}
		else if ($visibilty_status === false) {
			$status = 'draft';
		}
		// update post
		$my_post = array();
		$my_post['ID'] = $post_id;
		$my_post['post_status'] = $status;
		wp_update_post( $my_post );
		
		// assign post to project
		$tax = $_POST['project_tax'];
		if (!empty($tax)) {
			// set taxonomy 
			wp_set_object_terms( $post_id, $tax, 'projekt', false);
			// update project date
			$page = get_page_by_path($tax, OBJECT, 'projekte');
			if ($page) {
				$my_post = array();
				$my_post['ID'] = $page->ID;
				$my_post['post_modified'] = gmdate( "Y-m-d H:i:s", time() );
				$my_post['post_modified_gmt'] = gmdate( "Y-m-d H:i:s", ( $time + get_option( 'gmt_offset' ) * HOUR_IN_SECONDS )  );
				// update post 
				wp_update_post( $my_post );
			}
		}

		wp_redirect( get_post_permalink($post_id) ); 
		exit;

	}
	if ( get_post_type($post_id) == 'projekte' ) {

		$status = $_POST['project_status'];

		if ($_POST['project_status']) {

			$my_post = array();
			$my_post['ID'] = $post_id;
			$my_post['post_status'] = $status;
			wp_update_post( $my_post ); // Update the post into the database

		}

	}

}

/**
 * Maintenance Mode
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function wp_maintenance_mode() {

	$REQUEST_URI = $_SERVER['REQUEST_URI'];

	// if plugins not installed
	if (!class_exists('acf_pro') || !class_exists('UM')) {
		header("Location: ".get_template_directory_uri().'/maintenance.php');
		exit();
	}
	// if maintenance mode on and not administrator
	else if (get_field('maintenance', 'option') == true && !current_user_can('skip_maintenance') && ( strpos($REQUEST_URI,'/register/') === false && strpos($REQUEST_URI,'/login/') === false && strpos($REQUEST_URI,'/password-reset/') === false )) {
		header("Location: ".get_template_directory_uri().'/maintenance.php');
		exit();
	}

}



/**
 *  -------------------------------------------------------- AJAX Functions --------------------------------------------------------
 */

/**
 * Polling Function
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
add_action('wp_ajax_polling','polling');
function polling() {

	// if no user input --> abort
	if (!is_user_logged_in() || !is_numeric($_POST['poll'])) exit;

	// get meta field data (array)
	$array = get_post_meta($_POST['ID'], 'polls', true);

	// find user in meta field --> if true add || remove
	for ($i = 0; $i < count($array); $i++) {

		// when array has no user and should not -> nothing && when array has user and should -> nothing
		if (($i != $_POST['poll'] && !in_array(get_current_user_id(),$array[$i]['user']))||($i == $_POST['poll'] && in_array(get_current_user_id(),$array[$i]['user']))) {
			// nothing
		}
		// when array has user but should not -> unset id
		else if ($i != $_POST['poll'] && in_array(get_current_user_id(),$array[$i]['user'])) {
			unset($array[$i]['user'][ array_search(get_current_user_id(),$array[$i]['user']) ]);
		}
		// when array has no user and shouold -> push id
		else if ($i == $_POST['poll'] && !in_array(get_current_user_id(),$array[$i]['user'])) {
			array_push($array[$i]['user'], get_current_user_id());
		}
	}

	// count all votes
	$total_voter = 0;
	for ($i = 0; $i < count($array); $i++) {
		$total_voter = $total_voter + count($array[$i]['user']);
	}

	// write into array
	for ($i = 0; $i < count($array); $i++) {
		# count
		$array[$i]['count'] = count($array[$i]['user']);
		$array[$i]['percentage'] = (count($array[$i]['user']) / $total_voter) * 100;
		$array[$i]['total_voter'] = $total_voter;
	}

	// update meta field
	update_post_meta($_POST['ID'], 'polls', $array);

	// prepare response (delete user and set choice)
	for ($i = 0; $i < count($array); $i++) {
		$array[$i]['user'] = array(false);
		if ($i == $_POST['poll']) {
			$array[$i]['user'] = array(true);
		}
	}

	// send response
	wp_send_json_success( $array );
	// wp_send_json_success( $_POST );	

}


/**
 *  -------------------------------------------------------- Backend Functions --------------------------------------------------------
 */

/**
 * Remove Posts from Admin Menu
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function post_remove () { 
	remove_menu_page('edit.php');
 }
 add_action('admin_menu', 'post_remove');
 
/**
 * Restrict Blocks for the Landing Page
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
 add_filter('allowed_block_types', 'block_limit', 10, 2);
 function block_limit($block_types, $post) {
	 $allowed = [
		 'core/paragraph',
		 'core/heading',
		 'acf/link-card',
		 'acf/arrenberg-wetter',
		 'acf/arrenberg-geschichten'
		 // 'core/image'
	 ];
	 // !!! dynaisch nicht statisch
	 if ($post->post_title == "Überblick") {
		 return $allowed;
	 }
	 return $block_types;
 }
 

/**
 * Adding a "Copyright" field to the media uploader $form_fields array
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function add_copyright_field_to_media_uploader( $form_fields, $post ) {
	$form_fields['copyright_field'] = array(
		'label' => __('Copyright'),
		'value' => get_post_meta( $post->ID, '_custom_copyright', true ),
		'helps' => 'Set a copyright credit for the attachment'
	);

	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'add_copyright_field_to_media_uploader', null, 2 );

/**
 * Save our new "Copyright" field
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function add_copyright_field_to_media_uploader_save( $post, $attachment ) {
	if ( ! empty( $attachment['copyright_field'] ) ) 
		update_post_meta( $post['ID'], '_custom_copyright', $attachment['copyright_field'] );
	else
		delete_post_meta( $post['ID'], '_custom_copyright' );

	return $post;
}
add_filter( 'attachment_fields_to_save', 'add_copyright_field_to_media_uploader_save', null, 2 );

/**
 * Display our new "Copyright" field
 *
 * @since Quartiersplattform 1.0
 *
 * @return string
 */
function get_featured_image_copyright( $attachment_id = null ) {
	$attachment_id = ( empty( $attachment_id ) ) ? get_post_thumbnail_id() : (int) $attachment_id;

	if ( $attachment_id )
		return get_post_meta( $attachment_id, '_custom_copyright', true );
}
/**
 * Display our new "Copyright" field
 *
 * @since Quartiersplattform 1.0
 *
 * @return string
 */
function copywrite_beitragsbild() {
    if (get_featured_image_copyright()) {
        return "<p class='copyright'>© ".get_featured_image_copyright()."</p>";
    }
}

/**
 * Create Taxonomy 'projekt' in veranstaltung & nachrichten
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
function update_taxonomy_projekt($post_id) {

    // only update terms if it's a post-type-B post
    if ( 'projekte' != get_post_type($post_id)) {
        return;
    }
    // don't create or update terms for system generated posts
    if (get_post_status($post_id) == 'auto-draft') {
        return;
    }
    /*
    * Grab the post title and slug to use as the new 
    * or updated term name and slug
    */
    $term_title = get_the_title($post_id);
    $term_slug = get_post( $post_id )->post_name;
    /*
    * Check if a corresponding term already exists by comparing 
    * the post ID to all existing term descriptions. 
    */
    $existing_terms = get_terms('projekt', array(
        'hide_empty' => false
        )
    );
    foreach($existing_terms as $term) {
        if ($term->description == $post_id) {
            //term already exists, so update it and we're done
            wp_update_term($term->term_id, 'projekt', array(
                'name' => $term_title,
                'slug' => $term_slug
                )
            );
            return;
        }
    }
    /* 
    * If we didn't find a match above, this is a new post, 
    * so create a new term.
    */
    wp_insert_term($term_title, 'projekt', array(
        'slug' => $term_slug,
        'description' => $post_id
        )
    );
}
//run the update function whenever a post is created or edited
add_action('save_post', 'update_taxonomy_projekt');


/**
 *  -------------------------------------------------------- Public Functions --------------------------------------------------------
 */

/**
 * Shorten Text
 *
 * @since Quartiersplattform 1.6
 *
 * @param string $text
 * @param integer $count
 * @return void
 */
function shorten($text, $count = '55') {
	$text = $text." ";
	$text = strip_tags($text);
	$text = substr( $text , 0 , $count );
	$text = substr( $text, 0, strripos( $text , ' ' ) );
  
	if ( strlen( $text ) > $count ) { 
		$text = $text."..."; 
	}
	echo $text;
}


/**
 * Debug Function
 *
 * @since Quartiersplattform 1.2
 *
 * @return string
 */
function debugToConsole($msg) { 
	echo "<script>console.log(".json_encode($msg).")</script>";
}

/**
 * Display Author of Post
 *
 * @since Quartiersplattform 1.2
 *
 * @return string
 */
function get_cpt_term_owner($post_ID, $term, $type = 'name') {

	if (wp_get_post_terms( $post_ID, $term, array( 'fields' => 'all' ) )) {
		return wp_get_post_terms( $post_ID, $term, array( 'fields' => 'all' ) )[0]->name;
	}
	else if(get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) )) {
		return get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) );
	}
	                     
}

/**
 * Get Projekt ID
 *
 * @since Quartiersplattform 1.2
 *
 * @return string
 */
function get_term_id($post_ID, $term = 'projekt') {

	if (wp_get_post_terms( $post_ID, $term, array( 'fields' => 'all' ) )) {
		return wp_get_post_terms( $post_ID, $term, array( 'fields' => 'all' ) )[0]->description;
	}
	else {
		return false;
	}
	                     
}

/**
 * Get Author Card
 *
 * @since Quartiersplattform 1.6
 *
 * @param boolean $contact show contact information
 * @return string
 */
function author_card($contact = false, $user = '') {

	set_query_var('contact_inforation', $contact);
	set_query_var('contact_user_id', $user);

	if (get_the_author_meta( 'ID' ) || $user) {
		get_template_part( 'components/author-card' );
	}
	else {
		return false;
	}

	set_query_var('contact_inforation', false);
	set_query_var('contact_user_id', false);

}

/**
 * Check if Current Page is in Menu
 *
 * @since Quartiersplattform 1.5
 *
 * @param string $menu by Slug
 * @param string $object_id Page ID
 * @return boolean
 */
function cms_is_in_menu( $menu = null, $object_id = null ) {

    // get menu object
    $menu_object = wp_get_nav_menu_items( esc_attr( $menu ) );

    // stop if there isn't a menu
    if( ! $menu_object )
        return false;

    // get the object_id field out of the menu object
    $menu_items = wp_list_pluck( $menu_object, 'object_id' );

    // use the current post if object_id is not specified
    if( !$object_id ) {
        global $post;
        $object_id = get_queried_object_id();
    }

    // test if the specified page is in the menu or not. return true or false.
    return in_array( (int) $object_id, $menu_items );
}

/**
 * Calendar Download Button
 *
 * @since Quartiersplattform 1.5
 *
 * @param array $post Post ID
 * @return string
 */
function calendar_download($post) {
	
	// needed variabels
	$date = get_field('event_date', $post);
	$time = get_field('event_time', $post);
	$time_end = get_field('event_end', $post);
			
    $title = get_the_title();
    $start = date('Ymd', strtotime("$date $time")) . "T" . date('His', strtotime("$date $time"));
    $ende = date('Ymd', strtotime("$date $time")) . "T" . date('His', strtotime("$date $time_end"));

	// directory
	$links = get_template_directory_uri();
	$destination_folder = $_SERVER['DOCUMENT_ROOT'];
	$man_link = getcwd()."/wp-content/themes/".get_template();
    
    // get ort name
    $taxonomies = get_object_taxonomies( $post );
    $product_terms = wp_get_object_terms( $post->ID, $taxonomies[1]);
    
    if (!empty($product_terms[0]->name)) {
        $ort = $product_terms[0]->name;
    }
    else {
        $ort = "";
    }
    
    $kurz = get_field( "kurzbeschreibung" );
    $file_name = $post->post_name;
    $dir = "/assets/generated/calendar-files/";

    $kb_start = $start;
    $kb_end = $ende;
    $kb_current_time = $creation;
    $kb_title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');
    $kb_location = preg_replace('/([\,;])/','\\\$1',$ort); 
    $kb_location = html_entity_decode($kb_location, ENT_COMPAT, 'UTF-8');
    $kb_description = html_entity_decode($kurz, ENT_COMPAT, 'UTF-8');
    $kb_file_name = $file_name;

    $kb_url = get_permalink($post);
    
    if($ende == '19700101T000000') {
        die(); 
	}
	
	$kb_ical = fopen($man_link.$dir.$kb_file_name.'.ics', 'w') or die('Datei kann nicht gespeichert werden!'); 
        
    $eol = "\r\n";

    $kb_ics_content =
    'BEGIN:VCALENDAR'.$eol.
    'VERSION:2.0'.$eol.
    'PRODID:-//kulturbanause//kulturbanause.de//DE'.$eol.
    'CALSCALE:GREGORIAN'.$eol.
    'BEGIN:VEVENT'.$eol.
    'DTSTART:'.$kb_start.$eol.
    'DTEND:'.$kb_end.$eol.
    'LOCATION:'.$kb_location.$eol.
    'DTSTAMP:'.$kb_current_time.$eol.
    // 'RRULE:FREQ='.$kb_freq.';UNTIL='.ende_der_widerholung.
    'SUMMARY:'.$kb_title.$eol.
    'URL;VALUE=URI:'.$kb_url.$eol.
    'DESCRIPTION:'.$kb_description.$eol.
    'UID:'.$kb_current_time.'-'.$kb_start.'-'.$kb_end.$eol.
    'END:VEVENT'.$eol.
    'END:VCALENDAR';
    // header('HTTP/1.0 200 OK', true, 200);
    fwrite($kb_ical, $kb_ics_content);
    fclose($kb_ical);

	echo '<a class="button" href="'.get_bloginfo('template_url') .'/assets/generated/calendar-files/'.$kb_file_name.'.ics" target="_self">Termin im Kalender speichern</a>';   
}

/**
 * Slider
 *
 * @since Quartiersplattform 1.5
 *
 * @param array $args WP Query
 * @param string $type element type (card, landscape_card, list_card, square_card)
 * @param integer $slides Slides visible at once on mobile (desktop x2)
 * @param boolean $dragfree determins if slider stops at exact cars postion
 * @param boolean $align where to align slider
 * @return string
 */
function slider($args, $type = 'card', $slides = '1', $dragfree = 'true', $align = 'center') {

	$slider_class = "q".uniqid();
	$style_class = "embla-one";
	// $slides = "4";

	if ($slides == '2') $style_class = "embla-two";

	$query2 = new WP_Query($args);
	?>
	<div class="embla <?php echo $style_class; ?>" id="<?php echo $slider_class; ?>">
    	<div class="embla__container">

			<!-- Button back -->
			<!-- <button class="embla__button embla__button--prev" type="button">
				<svg
				class="embla__button__svg"
				viewBox="137.718 -1.001 366.563 643.999"
				>
				<path
					d="M428.36 12.5c16.67-16.67 43.76-16.67 60.42 0 16.67 16.67 16.67 43.76 0 60.42L241.7 320c148.25 148.24 230.61 230.6 247.08 247.08 16.67 16.66 16.67 43.75 0 60.42-16.67 16.66-43.76 16.67-60.42 0-27.72-27.71-249.45-249.37-277.16-277.08a42.308 42.308 0 0 1-12.48-30.34c0-11.1 4.1-22.05 12.48-30.42C206.63 234.23 400.64 40.21 428.36 12.5z"
				></path>
				</svg>
			</button> -->

			<!-- Button forwards -->
			<!-- <button class="embla__button embla__button--next" type="button">
				<svg class="embla__button__svg" viewBox="0 0 238.003 238.003">
				<path
					d="M181.776 107.719L78.705 4.648c-6.198-6.198-16.273-6.198-22.47 0s-6.198 16.273 0 22.47l91.883 91.883-91.883 91.883c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.071-103.039a15.741 15.741 0 0 0 4.64-11.283c0-4.13-1.526-8.199-4.64-11.313z"
				></path>
				</svg>
			</button> -->


			<?php
				while ( $query2->have_posts() ) {
					$query2->the_post();
					echo "<div class='embrela-slide'>";
					get_template_part('elements/'.$type.'', get_post_type());
					echo "</div>";
				}
				wp_reset_postdata();
			?>

			

		</div>
	</div>

	<script>
		var emblaNode = document.getElementById('<?php echo $slider_class; ?>')

		var slides_num = <?php echo $slides; ?>;
		var vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)
		var draggable_state = true;

		if (vw > 768) {
			slides_num = slides_num * 2;
			draggable_state = false;
		}

		var options = {
			dragFree: <?php echo $dragfree; ?>,
			slidesToScroll: slides_num, // viewport > 768px 4
			draggable: draggable_state,
			align: <?php echo "'".$align."'"; ?>,
		}
		var embla = EmblaCarousel(emblaNode, options)

		embla.on('settle', (eventName) => {
			// console.log(`Embla just triggered ${eventName}!`)
			_paq.push(['trackEvent', 'Interaction', 'Slider', '<?php echo get_page_template_slug(); ?>']);
		})

		const wrap = document.querySelector(".embla");
		const nextBtn = wrap.querySelector(".embla__button--next");
		const prevBtn = wrap.querySelector(".embla__button--prev");
		nextBtn.addEventListener('click', embla.scrollNext, false);
		prevBtn.addEventListener('click', embla.scrollPrev, false);

		// https://codesandbox.io/s/embla-carousel-arrows-dots-vanilla-twh0h?file=/src/js/prevAndNextButtons.js:64-126

	
		embla.on('resize', () => {
			var vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)
			slidesToScroll = '<?php echo $slides; ?>';
			// console.log(vw);
			if (vw > 768) {
				slidesToScroll = slidesToScroll * 2;
				draggable = false;
			} else {
				slidesToScroll = slides_num;
				draggable = true;
			}

			embla.reInit({
				slidesToScroll,
				draggable
			});
		});
	</script>
<?php
}

/**
 * Card List - Display Cards as List
 *
 * @since Quartiersplattform 1.0 - 1.7 update
 *
 * @param array $args WP Query
 * @param string $element element type
 * @return string
 */
function card_list($args, $element = 'card') {

	$query2 = new WP_Query($args);
	// The Loop
	while ( $query2->have_posts() ) {
		$query2->the_post();
		get_template_part('elements/'.$element, get_post_type());
	}
	// Restore original Post Data
	wp_reset_postdata();

}


/**
 * List Card - Multiple Cards in one Card
 *
 * @since Quartiersplattform 1.2
 *
 * @param array $args WP Query
 * @param string $link Link of Card
 * @param string $card_title Title of Card
 * @param string $card_subtitle Subtitle of Card
 * @return string
 */
function list_card($args, $link = '', $card_title = '', $card_subtitle = '') {

	set_query_var( 'list-item', true );
	?>

<div class='card list-card shadow' data-content-piece="<?php echo $card_title; ?>">
	<a class="card-link" href="<?php echo $link; ?>">

		<div class='card-header'>
			<h2><?php echo $card_title; ?></h2>
			<h3><?php echo $card_subtitle; ?></h3>
		</div>

		<?php
		$query2 = new WP_Query( $args );
		// The Loop
		while ( $query2->have_posts() ) {
			$query2->the_post();
			get_template_part('elements/list_card');
			// get_template_part('elements/card', get_post_type());
		}
		// Restore original Post Data
		wp_reset_postdata();
		?>

	</a>
</div>
<?php

}


/**
 * Landscape Card
 *
 * @since Quartiersplattform 1.0
 *
 * @param array $args WP Query
 * @param string $title (if set will overwrite)
 * @param string $text (if set will overwrite)
 * @param string $bg background picture (if set will overwrite)
 * @param string $lnik link (if set will overwrite)
 * @return string
 */
// function template part test
function landscape_card($args = '', $title = '', $text = '', $bg = '', $link = '')  {

	set_query_var( 'link_card_title', $title );
	set_query_var( 'link_card_text', $text );
	set_query_var( 'link_card_bg', $bg );
	set_query_var( 'link_card_link', $link );

	if ($args) {

		$query2 = new WP_Query($args);
		// The Loop
		while ( $query2->have_posts() ) {
			$query2->the_post();
			get_template_part('elements/landscape_card');
		}
		// Restore original Post Data
		wp_reset_postdata();

	}
	else {
		get_template_part('elements/landscape_card');
	}

}

/**
 * Emoji Picker init
 *
 * @since Quartiersplattform 1.6
 *
 * @param integer $id id of emoji field
 * @return string
 */
function emoji_picker_init($id) {

	if ($id) {
		?>

		<script>

			// get element
			var el = $("#<?php echo $id; ?>");
			el.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
			el.attr("data-emojiable", "true");

			// remove previous emojies
			var alt;
			$('div.emoji-picker-container').bind('DOMSubtreeModified', function() {

				console.log($(".emoji-wysiwyg-editor").children().length);

				if ($(".emoji-wysiwyg-editor").children().length > 1) {
					// console.log('remove childs ' + alt);
					if (!alt) {
						$('.emoji-wysiwyg-editor').children('img:nth-of-type(2)').remove();
					} else if (alt) {
						if (alt !== $('.emoji-wysiwyg-editor').children("img:last").attr("alt")) {
							$('.emoji-wysiwyg-editor').children("img[alt='" + alt + "']").remove();
						} else {
							$('.emoji-wysiwyg-editor').children('img:nth-of-type(1)').remove();
						}
					}
					alt = $('.emoji-wysiwyg-editor').children("img:first").attr("alt");
				}

			});

			$(function() {
				window.emojiPicker = new EmojiPicker({
					emojiable_selector: '[data-emojiable=true]',
					assetsPath: '<?php echo get_template_directory_uri(); ?>/assets/emoji-picker/img/',
					popupButtonClasses: 'fa fa-smile-o'
				});
				window.emojiPicker.discover();

				$('div.emoji-wysiwyg-editor').attr('tabindex', '-1');
			});

		</script>

		<?php 
	}
}

/**
 * Text Link & Mail finder
 *
 * @since Quartiersplattform 1.6
 *
 * @param string $text text
 * @return string text with html a tags
 */
function extract_links( $text ) {

	# https://ihateregex.io/expr/email-2/
	# https://regex101.com

	// $pattern_url = '~[a-z]+://\S+~i';
	// $pattern_url = '~www\S+~i';
	$pattern_url = '/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()!@:%_\+.~#?&\/\/=]*)/';
	
	// $pattern_mail = '/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i';
	// $pattern_mail = '/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n\s]+/';
	$pattern_mail = '/(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/';

	preg_match_all($pattern_url, $text, $out);
	preg_match_all($pattern_mail, $text, $out_mail);

	for ($i=0; $i < count($out[0]); $i++) { 
		$text = str_replace($out[0][$i], "<a class='text-link' href='".$out[0][$i]."' target='_blank'>".$out[0][$i]."</a>", $text);
	}

	for ($i=0; $i < count($out_mail[0]); $i++) { 
		$text = str_replace($out_mail[0][$i], "<a class='text-link' href='mailto:".$out_mail[0][$i]."'>".$out_mail[0][$i]."</a>", $text);

	}

	echo $text;

}

/**
 * Display Date 
 *
 * @since Quartiersplattform 1.6
 *
 * @param string $date date
 * @return string text with html a tags
 */
function qp_date( $date, $detail = false, $time = '' ) {

	// get time
	if ($time) {
		$date = strtotime("$date $time");
	}
	else {
		$date = strtotime($date);
	}

	// tomorrow
	if (date("Y-m-d", (current_time('timestamp') + 86400)) == date("Y-m-d", $date) ) {
		$string = "Morgen";
	}
	// today
	else if (date("Y-m-d") == date("Y-m-d", $date) ) {
		$string = "Heute";
	}
	// yesterday
	else if (date("Y-m-d", (current_time('timestamp') - 86400)) == date("Y-m-d", $date) ) {
		$string = "Gestern";
	}
	// date + year
	else if (date("Y") != date("Y", $date) ) {
		$string = wp_date('j. F Y', $date);
	}
	// default (just date)
	else {
		$string = wp_date('j. F', $date);
	}

	if ($detail) {
		$string = $string." um ".wp_date('H:i', $date);
	}

	return $string;

}

/**
 * Display Time Remaining 
 *
 * @since Quartiersplattform 1.6
 *
 * @param string $date date
 * @return string text with html a tags
 */
function qp_remaining( $date ) {

	// minutes
	if (abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true)) < 3600 ) {
		$time = "noch ". round((abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true))/60), 0)." Minuten";
	}
	// hours
	else if (abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true)) < 10800 ) {
		$time = "noch ". round((abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true))/3600), 0)." Stunden";
	}
	// today
	else if (date('Ymd', current_time('timestamp')) == date('Ymd', get_post_meta(get_the_ID(), 'expire_timestamp', true))) {
		$time = "bis um ".wp_date('G:i', get_post_meta(get_the_ID(), 'expire_timestamp', true));    
	}
	// tomorrow
	else if (date('Ymd', (current_time('timestamp') + 86400)) == date('Ymd', get_post_meta(get_the_ID(), 'expire_timestamp', true))) {
		$time = "bis Morgen";
	}
	// no data
	else if (!get_post_meta(get_the_ID(), 'expire_timestamp', true)) {
		$time = "vom ".get_the_date('j. M');
	}
	else if (get_post_meta(get_the_ID(), 'expire_timestamp', true) < current_time('timestamp')) {
		$time = "vom ".date('j. M', get_post_meta(get_the_ID(), 'expire_timestamp', true));
	}
	// other
	else {
		$time = "bis zum ".wp_date('j. M', get_post_meta(get_the_ID(), 'expire_timestamp', true));    
	}

	return " ".$time;

}


/**
 * Reminder Card function
 *
 * @since Quartiersplattform 1.7
 *
 * @param string $slug date
 * @param string $title title
 * @param string $body body
 * @return string html
 */
function reminder_card( $slug, $title, $text, $button = '', $link = '' ) {

	if (empty($title) && empty($text) ) {
		return false;
	}

	// check user option
	if ( is_user_logged_in(  ) ) {
		$array = get_user_option( 'qp_reminder_card', get_current_user_id( ) );
		
		if ($array && in_array($slug, $array, true) ) {
			return false;
		}
	}
	
	// define query vars 
	set_query_var('reminder_card_fix', false);
	set_query_var('reminder_card_slug', $slug);
	set_query_var('reminder_card_title', $title);
	set_query_var('reminder_card_text', $text);
	set_query_var('reminder_card_style', false);

	if (!empty($slug) || !empty($title)) {
		set_query_var('reminder_card_button', $button);
		set_query_var('reminder_card_link', $link);
	}
	if (!$slug || $slug == 'warning') {
		set_query_var('reminder_card_fix', true);
		set_query_var('reminder_card_style', 'warning');
	}
	else if (strpos($slug, 'warning') !== false) {
		set_query_var('reminder_card_style', 'warning');
		
	}
	// template part
	get_template_part( 'components/reminder-card/reminder-card' );

	

}

/**
 * Reminder Backend function
 *
 * @since Quartiersplattform 1.7
 *
 * @param string $slug date
 * @param string $body body
 * @param string $state state (error, notice, updated)
 * @return string html
 */
function reminder_backend( $slug, $html, $state = 'notice' ) {

	if (empty($slug) || empty($html) ) {
		return false;
	}

	// check user option
	if ( is_user_logged_in(  ) ) {
		$array = get_user_option( 'qp_reminder_card', get_current_user_id( ) );
		if (in_array($slug, $array, true) ) {
			return false;
		}
	}
	
	// define query vars 
	set_query_var('reminder_card_slug', $slug);
	set_query_var('reminder_card_html', $html);
	set_query_var('reminder_card_state', $state);

	// template part
	get_template_part( 'components/reminder-card/reminder-backend' );

}

/**
 * Remove Reminder Card (ajax)
 *
 * @since Quartiersplattform 1.7
 *
 * @return void
 */
function remove_reminder_callback(){

	check_ajax_referer('my_ajax_nonce');

	$slug = $_POST['slug'];

	$array = get_user_option( 'qp_reminder_card', get_current_user_id( ) );

	if (!is_array($array)) {
		$array = [];
	}

	$item = $slug;
	array_push($array, $item);
	update_user_option( get_current_user_id( ), 'qp_reminder_card', $array );

	return;

} 
add_action( 'wp_ajax_remove_reminder', 'remove_reminder_callback' );
add_action( 'wp_ajax_nopriv_remove_reminder', 'remove_reminder_callback' );

/**
 * Remove Reminder Option (ajax)
 *
 * @since Quartiersplattform 1.7
 *
 * @return void
 */
function reset_reminder_cards_callback(){

	check_ajax_referer('my_ajax_nonce');

	$array = [];
	update_user_option( get_current_user_id( ), 'qp_reminder_card', $array );
	return;

} 
add_action( 'wp_ajax_reset_reminder_cards', 'reset_reminder_cards_callback' );
add_action( 'wp_ajax_nopriv_reset_reminder_cards', 'reset_reminder_cards_callback' );




/**
 * Call To Action Card function
 *
 * @since Quartiersplattform 1.7
 *
 * @param string $slug date
 * @param string $title title
 * @param string $body body
 * @return string html
 */

// function call_to_action_card( $bg_color, $link, $title, $text) {

// 	// define query vars 
// 	set_query_var('call_to_action_bg_color', $bg_color);
// 	set_query_var('call_to_action_link', $link);
// 	set_query_var('call_to_action_title', $title);
// 	set_query_var('call_to_action_text', $text);
// 	// template part
// 	get_template_part( 'components/call-to-action-card' );

// }

/**
 * Projekt Toggle Function
 *
 * @since Quartiersplattform 1.7
 * 
 * @param string $post_id id
 * @param string $status status
 * @return void
 */
function post_visibility_toggle() { // !!! naming => visibility_toggle

	get_template_part( 'components/settings/visibility_toggle' );

	return;
}


/**
 * Projekt Toggle Status (ajax)
 *
 * @since Quartiersplattform 1.7
 * 
 * @param string $post_id id
 * @param string $status status
 * @return void
 */
function projekt_toggle_status_callback() { // !!! naming => visibility_toggle_callback

	check_ajax_referer('my_ajax_nonce');

	$post_id = $_POST['post_id'];
	$status = $_POST['status'];

	// !!! check if logged in user has privilages

	if ($status == 'true') {
		$status = 'publish';
	}
	else {
		$status = 'draft';
	}

	$my_post = array();
	$my_post['ID'] = $post_id;
	$my_post['post_status'] = $status;
	wp_update_post( $my_post ); // Update the post into the database

	return;
	// echo $status." - ".$post_id;

} 
add_action( 'wp_ajax_projekt_toggle_status', 'projekt_toggle_status_callback' );
add_action( 'wp_ajax_nopriv_projekt_toggle_status', 'projekt_toggle_status_callback' );


/**
 * Pin Toggle Function
 *
 * @since Quartiersplattform 1.7
 * 
 * @param string $post_id id
 * @param string $status status
 * @return void
 */
function pin_toggle($type = 'pin_project') {

	// pin_main :: pages, projects
	// pin_project :: veranstaltungen, nachrichten, umfragen

	set_query_var('pin_type', $type);

	get_template_part( 'components/settings/pin_toggle' );

	return;
}

// general toggle function (metafield, options array, name array)

/**
 * Pin Toggle Status (ajax)
 *
 * @since Quartiersplattform 1.7
 * 
 * @param string $post_id id
 * @param string $status status
 * @return void
 */
function pin_toggle_callback() {

	check_ajax_referer('my_ajax_nonce');

	$post_id = $_POST['post_id'];
	$status = $_POST['status'];
	$type = $_POST['pin_type']; // main_pin & project_pin

	// !!! check if logged in user has privilages

	if ($status != 'true' && $status != 'false') {
		// echo "nooo status";
		return false;
	}
	// validate type
	if ($type != 'pin_main' && $type != 'pin_project') { // !!! wording
		// echo "nooo type";
		return false;
	}

	if ( ! add_post_meta( $post_id, $type, $status, true ) ) { 
		update_post_meta ( $post_id, $type, $status );
	}

	return;
	// echo $status." - ".$post_id;

} 
add_action( 'wp_ajax_pin_toggle', 'pin_toggle_callback' );
add_action( 'wp_ajax_nopriv_pin_toggle', 'pin_toggle_callback' );


/**
 * Projekt Carousel
 *
 * @since Quartiersplattform 1.7
 *
 * @param string $slug date
 * @param string $title title
 * @param string $body body
 * @return string html
 */
function projekt_carousel( ) {

	$array = [];

	// get published posts
	$args_public = array(
		'post_type' => 'projekte',
		'post_status' => array('publish')    
	);
	$args_public = new WP_Query($args_public);
	while ( $args_public->have_posts() ) {
		$args_public->the_post();
		array_push($array, get_the_ID(  ) );
	}
	wp_reset_postdata();

	if (is_user_logged_in(  )) {
		// get drafts by user
		$args_private = array(
			'post_type' => 'projekte',
			'author__in' => $current_user->ID,
			'post_status' => array('pending', 'draft', 'auto-draft')    
		);
		$args_private = new WP_Query($args_private);
		while ( $args_private->have_posts() ) {
			$args_private->the_post();
			array_push($array, get_the_ID(  ) );
		}
		wp_reset_postdata();
	}

	$args4 = array(
		'post_type'=> array('projekte'), 
		'post__in' => $array,
		'post_status'=>'any', 
		'posts_per_page'=> 50,
		'orderby' => 'modified'
	);

	set_query_var( 'highlight_display', true );

	?>  
		<!-- projekt carousel -->
		<div class="projekt-carousel">

			<a class="badge-link shadow-on-hover " href="<?php echo home_url() ?>/projekt-erstellen/">
				<div class="badge badge-button">
				<img src="<?php echo get_template_directory_uri()?>/assets/icons/add.svg" />
				</div>
				<h3 class="card-title-small">
					Projekt erstellen    
				</h3>
			</a>

			<?php  
			
			if (wp_is_mobile(  )) {
				slider($args4, 'badge', 4, 'false');
			}
			else {
				card_list($args4, 'badge');
			}
			
			?>
		</div>

	<?php 

	set_query_var( 'highlight_display', false );
}

/**
 * Projekt Feed (ajax)
 *
 * @since Quartiersplattform 1.7
 * 
 * @param string $post_id id
 * @param string $status status
 * @return void
 */
function projekt_feed_callback() {

	check_ajax_referer('my_ajax_nonce');

	$offset = $_POST['offset'];
	$posts = $_POST['posts'];

	$args = array(
		'post_type'=> array('veranstaltungen', 'nachrichten', 'projekte', 'angebote', 'fragen', 'umfragen'), 
		'post_status'=>'publish', 
		'posts_per_page'=> $posts,
		'offset' => $offset,
		'orderby' => 'date'
	);

	set_query_var( 'additional_info', true );

	card_list($args);
	wp_die(); 
	return;

}
add_action( 'wp_ajax_projekt_feed', 'projekt_feed_callback' );
add_action( 'wp_ajax_nopriv_projekt_feed', 'projekt_feed_callback' );

/**
 * Add Project (ajax)
 *
 * @since Quartiersplattform 1.7
 * 
 * @return string
 */
// function add_project_callback() {

// 	check_ajax_referer('my_ajax_nonce');

// 	echo "<h1>erstelle dein project</h1>";

// 	acf_form(
// 		array(
// 			'id' => 'projekte-form',         
// 			'post_id'=>'new_post',
// 			'new_post'=>array(
// 				'post_type' => 'projekte',
// 				'post_status' => 'publish',
// 			),
// 			'field_el' => 'div',
// 			'uploader' => 'basic',
// 			'post_content' => false,
// 			'post_title' => true,
// 			'return' => get_site_url().'/projekte',
// 			'fields' => array(
// 				'field_5fc64834f0bf2', // Emoji
// 				'field_5fc647f6f0bf0', // Kurzbeschreibung
// 			),
// 			'submit_value'=>'Projekt veröffentlichen',
// 			'html_before_fields' => '<input type="text" name="project_status" value="draft" style="display:none;">',
// 		)
// 	); 

// 	emoji_picker_init('acf-field_5fc64834f0bf2');


// 	wp_die(); 
// 	return;

// } 
// add_action( 'wp_ajax_add_project', 'add_project_callback' );
// add_action( 'wp_ajax_nopriv_add_project', 'add_project_callback' );


/**
 * Count Query
 *
 * @since Quartiersplattform 1.7
 * 
 * @return string
 */
function count_query($query, $amount = 1) {

	if (!$query) {
		return false;
	}

	$my_query = new WP_Query($query);

	if ($my_query->post_count >= $amount) {
		return true;
	}
    
}

/**
 * Project Card
 *
 * @since Quartiersplattform 1.7
 * 
 * @param string $type post / projekt
 * @param string $id id
 * @return string
 */
function project_card($id, $type = "post") {

	if (empty($id)) {
		return false;
	}

	if ($type == "post") {
		// get project id
		$term_list = wp_get_post_terms( $id, 'projekt', array( 'fields' => 'all' ) );
		// query
		$args = array(
			'name'        => $term_list[0]->slug,
			'post_type'   => 'projekte',
			'post_status' => 'publish',
			'numberposts' => '1'
		);

	}
	else if ($type == "projekt") {
		// query
		$args = array(
			'p'         => $id,
  			'post_type' => 'any',
			'post_status' => 'publish',
			'numberposts' => '1'
		);

	}
	else if ($type == "slug") {
		// query
		$args = array(
			'name'        => $id,
			'post_type'   => 'projekte',
			'post_status' => 'publish',
			'numberposts' => '1'
		);

	}

	// query and display
	card_list( $args, 'card' );
	

}



/**
 * 
 * End of File
 * 
 */