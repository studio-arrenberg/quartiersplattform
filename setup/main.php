<?php

/**
 * 
 *  Main Setup
 * 
 *  1. Menu 
 *  2. reset rewrite rules
 *  3. Permalink Structure
 *  4. Set Home Page
 *  5. Create Pages
 *  6. User Role (beta)
 *  7. Admin bar only for admins
 * 
 */


/**
 *  --------------------------------------------------------
 *  1. Menu
 *  --------------------------------------------------------
 */

$menuname = 'qp_menu';
// get menu id
$menu_array = wp_get_nav_menus();
for ($i=0; $i < count($menu_array) ; $i++) { 

    if ($menu_array[$i]->slug == $menuname) {
        $menu_id = $menu_array[$i]->term_id;
    }
    else {
        $menu_id = false;
    }
}

// get Quartier Name
if (class_exists('acf_pro')) {
    $qp_name = get_field('quartiersplattform-name','option');
}
else {
    $qp_name = __("Quartier",'quartiersplattform');
}

// defined menus
$defined_menu_item = array(
    0 => array ('title' => $qp_name, 'page_name' => 'Startseite', 'ID' => '100100', 'attr' => $qp_name),
    1 => array ('title' => __('Projekte','quartiersplattform'), 'page_name' => 'Projekte', 'ID' => '100300', 'attr' => 'Projekte'),
    // 2 => array ('title' => 'Projekte', 'page_name' => 'Projekte', 'ID' => '100300', 'attr' => 'Projekte'),
    // 3 => array ('title' => 'Gemeinsam', 'page_name' => 'Gemeinsam', 'ID' => '100400', 'attr' => 'Gemeinsam'),
    // 4 => array ('title' => 'Impressum', 'page_name' => 'Impressum', 'ID' => '100700', 'attr' => 'fifth'),
);
// create menu if not exists 
if (!$menu_id) {
    $menu_id = wp_create_nav_menu($menuname);        
}

// get menu items
$menu_items = wp_get_nav_menu_items($menu_id);
// print_r($menu_items);

// iterate through given menu items
for ($i=0; $i < count($defined_menu_item); $i++) { 
    $id = '0';
    // iterate and check existing menu items
    for ($a=0; $a < count($menu_items); $a++) { 
        if ($defined_menu_item[$i]['attr'] == $menu_items[$a]->attr_title) {
            $id = $menu_items[$a]->ID;
        }
    }
    // update or create menu item
    wp_update_nav_menu_item($menu_id, $id, array(
        'menu-item-title' =>  __($defined_menu_item[$i]['title']),
        'menu-item-object-id' => get_page_by_title( $defined_menu_item[$i]['page_name'], OBJECT, 'page' )->ID,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type',
        'menu-item-db-id' => $defined_menu_item[$i]['ID'],
        'menu-item-attr-title' => $defined_menu_item[$i]['attr'],
        'menu-item-status' => 'publish')
    );

}

// set menu location
$locations = get_theme_mod('nav_menu_locations');
$locations['primary'] = $menu_id;
set_theme_mod( 'nav_menu_locations', $locations );


if (count($defined_menu_item) < count($menu_items)) {
    wp_delete_nav_menu($menuname);
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
 *  3. Permalink structure
 *  --------------------------------------------------------
 */


global $wp_rewrite; 

//Write the rule
$wp_rewrite->set_permalink_structure('/%postname%/'); 

//Set the option
update_option( "rewrite_rules", FALSE ); 

//Flush the rules and tell it to write htaccess
$wp_rewrite->flush_rules( true );

/**
 *  --------------------------------------------------------
 *  4. Set Home Page
 *  --------------------------------------------------------
 */


function themename_after_setup_theme() {
    $site_type = get_option('show_on_front');
    $home = get_page_by_title( 'Startseite', OBJECT, 'page' );
    // if($site_type == 'posts') {
        update_option( 'show_on_front', 'page' );
        // update_option( 'page_for_posts', $home->ID );
        update_option( 'page_on_front', $home->ID );
        
    // }
    // $site_type = get_option('page_for_posts');

    // echo "<script>console.log(".json_encode($site_type).")</script>";
}
add_action( 'after_setup_theme', 'themename_after_setup_theme' );


/**
 *  --------------------------------------------------------
 *  5. Create Pages
 *  --------------------------------------------------------
 */

add_action( 'after_setup_theme', 'create_pages' );
function create_pages() {

    $pages = array(
        0 => array('title' => __('Startseite',"quartiersplattform"), 'slug' => 'startseite'),
        1 => array('title' => __('Veranstaltungen', "quartiersplattform"), 'slug' => 'veranstaltungen'),
        2 => array('title' => __('Projektverzeichnis',"quartiersplattform"), 'slug' => 'projektverzeichnis'),
        // 3 => array('title' => 'Gemeinsam', 'slug' => 'gemeinsam'),
        // 4 => array('title' => 'Anmerkungen', 'slug' => 'anmerkung'),
        5 => array('title' => __('Profil',"quartiersplattform"), 'slug' => 'profil'),
        6 => array('title' => __('Impressum',"quartiersplattform"), 'slug' => 'impressum'),
        // 7 => array('title' => 'Kontakt', 'slug' => 'kontakt'),
        8 => array('title' => __('Veranstaltung erstellen',"quartiersplattform"), 'slug' => 'veranstaltung-erstellen'),
        9 => array('title' => __('Nachricht erstellen',"quartiersplattform"), 'slug' => 'nachricht-erstellen'),
        10 => array('title' => __('Angebot erstellen',"quartiersplattform"), 'slug' => 'angebot-erstellen'),
        11 => array('title' => __('Frage erstellen',"quartiersplattform"), 'slug' => 'frage-erstellen'),
        12 => array('title' => __('Projekt erstellen',"quartiersplattform"), 'slug' => 'projekt-erstellen'),
        13 => array('title' => __('Projekte',"quartiersplattform"), 'slug' => 'projekte'),
    );

    for ($i = 0; $i < count($pages); $i++) {

        $my_post = [];
        $my_post = array(
            'post_title'    => wp_strip_all_tags($pages[$i]['title']),
            // 'post_content'  => $sdgs[$i]['content'],
            'post_status'   => 'publish',
            'post_content' => '',
            'post_author'   => 1,
            'post_type'		=> 'page',
            // 'post_slug'     => $pages[$i]['slug']
        );

        if ( ! function_exists( 'post_exists' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/post.php' );
        }

        // wp_insert_post( $my_post, true );
        // echo post_exists($pages[$i]['title'],'','','page');
        if(post_exists($pages[$i]['title'],'','','page') === 0){
            # create post
            wp_insert_post( $my_post, true );
        }
    }

}

/**
 *  --------------------------------------------------------
 *  6. User Role (beta)
 *  --------------------------------------------------------
 */

function firstmover_user_role() {
    add_role( 'firstmover', 'First mover', get_role( 'subscriber' )->capabilities );

    $role_firstmover = get_role( 'firstmover' );
	$role_firstmover->add_cap( 'skip_maintenance' , true );
    $role_administrator = get_role( 'administrator' );
	$role_administrator->add_cap( 'skip_maintenance' , true );
    // $role_user = get_role( 'user' );
	// $role_user->add_cap( 'skip_maintenance' , false );

}
add_action( 'init', 'firstmover_user_role' );



/**
 *  --------------------------------------------------------
 *  7. Admin bar only for admins
 *  --------------------------------------------------------
 */

if (!current_user_can('manage_options')) {
    add_filter('show_admin_bar', '__return_false');
}

/**
 *  --------------------------------------------------------
 *  8. Pins for Pages
 *  --------------------------------------------------------
 */
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_608a6c250869c',
        'title' => 'Seiten Pin',
        'fields' => array(
            array(
                'key' => 'field_608a6c2c1be48',
                'label' => 'Pin',
                'name' => 'pin_main',
                'type' => 'true_false',
                'instructions' => '',
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
                'ui_on_text' => __('Gepinnt','quartiersplattform'),
                'ui_off_text' => __('Nicht gepinnt','quartiersplattform'),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
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