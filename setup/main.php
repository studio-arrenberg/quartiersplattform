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