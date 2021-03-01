<?php

/**
 * 
 *  Main Setup
 * 
 *  2. Menu 
 *  2. reset rewrite rules
 *  3. Pages (Pages, Forms)
 *  4. Link Pages with Templates (Pages & Post types)
 * 
 */


/**
 *  --------------------------------------------------------
 *  1. Menu
 *  --------------------------------------------------------
 */

// $menuname = 'qp_menu';
$menuname = 'menu';
// $bpmenulocation = 'lblgbpmenu';
// Does the menu exist already?
$menu_exists = wp_get_nav_menu_object( $menuname );

// If it doesn't exist, let's create it.
if( !$menu_exists){
    $menu_id = wp_create_nav_menu($menuname);

    // Set up default BuddyPress links and add them to the menu.
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Überblick'),
        'menu-item-classes' => 'überblick',
        'menu-item-url' => home_url( '/' ), 
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Veranstaltungen'),
        'menu-item-classes' => 'veranstaltungen',
        'menu-item-url' => home_url( '/veranstaltungen/' ), 
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Projekte'),
        'menu-item-classes' => 'projekte',
        'menu-item-url' => home_url( '/projekte/' ), 
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Gemeinsam'),
        'menu-item-classes' => 'gemeinsam',
        'menu-item-url' => home_url( '/gemeinsam/' ), 
        'menu-item-status' => 'publish'));

    // Grab the theme locations and assign our newly-created menu
    // to the BuddyPress menu location.
    // if( !has_nav_menu( 'primary' ) ){
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    // }
    }

/**
 *  --------------------------------------------------------
 *  2. reset rewrite rules
 *  --------------------------------------------------------
 */

// flush_rewrite_rules( false );
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

/**
 *  --------------------------------------------------------
 *  3. Pages
 *  --------------------------------------------------------
 */

function create_pages() {
/**
 * 
 *  Seiten ::
 *  Angebot erstellen
 *  Anmerkung !
 *  Frage erstellen
 *  Gemeinsam !
 *  impressum !
 *  Profil !
 *  Projekt erstellen
 *  Projekte !
 *  Überblick !
 *  veranstaltungen !
 * 
 *  Done ::
 *  Veranstaltung erstellen
 *  Umfrage erstellen
 *  Nachricht erstellen
 * 
 *  SDGs
 * 
 * 
 *  Not Needed ::
 *  Geschichten
 * 
 */


    $pages = array(
        0 => array('title' => 'Überblick', 'slug' => 'überblick'),
        1 => array('title' => 'Veranstaltungen', 'slug' => 'veranstaltungen'),
        2 => array('title' => 'Projekte', 'slug' => 'projekte'),
        3 => array('title' => 'Gemeinsam', 'slug' => 'gemeinsam'),
        4 => array('title' => 'Anmerkungen', 'slug' => 'anmerkung'),
        5 => array('title' => 'Profil', 'slug' => 'profil'),
        6 => array('title' => 'Impressum', 'slug' => 'impressum'),
        7 => array('title' => 'Kontakt', 'slug' => 'kontakt'),
        8 => array('title' => 'Veranstaltung erstellen', 'slug' => 'veranstaltung-erstellen'),
        9 => array('title' => 'Nachricht erstellen', 'slug' => 'nachricht-erstellen'),
        10 => array('title' => 'Angebot erstellen', 'slug' => 'angeebot-erstellen'),
        11 => array('title' => 'Frage erstellen', 'slug' => 'frage-erstellen'),
        12 => array('title' => 'Projekt erstellen', 'slug' => 'projekt-erstellen'),
    );

    for ($i = 0; $i < count($pages); $i++) {

        $my_post = [];
        $my_post = array(
            'post_title'    => wp_strip_all_tags($pages[$i]['title']),
            // 'post_content'  => $sdgs[$i]['content'],
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'		=> 'page',
            'post_slug'     => $pages[$i]['slug']
        );

        if(post_exists($pages[$i]['title']) === 0){
            # create post
            wp_insert_post( $my_post );
        }
        // else {
        //     $mypost_id = get_page_by_title( $pages[$i]['title'], OBJECT, 'page' );
        //     $my_post['ID'] = $mypost_id->ID;
        //     # update post
        //     wp_update_post( $my_post );
        // }
    }


    // add_action( 'after_setup_theme', 'create_event_page' );
    // function create_event_page(){

    //     $title = 'Veranstaltung erstellen';
    //     $slug = 'veranstaltung-erstellen';
    //     $page_content = ''; // your page content here
    //     $post_type = 'page';

    //     $page_args = array(
    //         'post_type' => $post_type,
    //         'post_title' => $title,
    //         'post_content' => $page_content,
    //         'post_status' => 'publish',
    //         'post_author' => 1,
    //         'post_slug' => $slug
    //     );
        
    //     if ( ! function_exists( 'post_exists' ) ) {
    //         require_once( ABSPATH . 'wp-admin/includes/post.php' );
    //     }

    //     if(post_exists($title) === 0){
    //         $page_id = wp_insert_post($page_args);
    //     }

    // } 




}
add_action( 'init', 'create_pages' );

// add pages
add_action( 'after_setup_theme', 'create_form_page');
function create_form_page(){

    $title = 'Überblick';
    $slug = 'überblick';
    $page_content = ''; // your page content here
    $post_type = 'page';

    $page_args = array(
        'post_type' => $post_type,
        'post_title' => $title,
        'post_content' => $page_content,
        'post_status' => 'publish',
        'post_author' => 1,
        // 'post_slug' => $slug
    );
    
    if ( ! function_exists( 'post_exists' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/post.php' );
    }

    if(post_exists($title) === 0){
        $page_id = wp_insert_post($page_args);
    }

} 