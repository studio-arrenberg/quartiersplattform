<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preload stylesheet" href="<?php echo get_template_directory_uri(); ?>/first.css">

    <?php wp_head(); ?>
    <script src="<?php echo get_template_directory_uri()?>/assets/embla-carousel-master/embla-carousel.umd.js"> </script>

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri()?>/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri()?>/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri()?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


</head>

<body <?php body_class(); ?>>

    <?php
        wp_body_open();
        // check if menu is needed
        $menu = 'page-header';
        $menu_active = 'off';
        $menu_active_back = 'on';
        if( cms_is_in_menu( 'menu' ) ) {
            $menu_active = 'on';
            $menu_active_back = 'off';
            $menu = 'post-header';

        }
    ?>
    

    <header id="site-header" class="<?php echo $menu; ?>" >
        <div class="header-top-wrapper">
            <div class="header-title">
                <?php twentytwenty_site_logo(); ?>
            </div>
        </div>

        <!-- back button -->
        <?php 
        if (!$_SERVER['HTTP_REFERER']) {
            // display home button
            ?>
            <a href="<?php echo get_site_url(); ?>" class="<?php echo $menu_active_back; ?> header-button button-has-icon is-style-outline back button" >
                <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/back.svg" />
                <span class="button-has-icon-label">Überblick</span>
            </a>
            <?php
        }
        else {
            // display back button
            ?>
            <button class="<?php echo $menu_active_back; ?> header-button button-has-icon is-style-outline back" onclick="history.go(-1);">
                <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/back.svg" />
                <span class="button-has-icon-label">Zurück</span>
            </button>
            <?php
        }
        ?>

        <div class="header-navigation-wrapper <?php echo $menu_active; ?>">
            <?php
				if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {


					?>
            <nav class="menu-container" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>"
                role="navigation">

                <ul class="menu reset-list-style">

                    <?php
								if ( has_nav_menu( 'primary' ) ) {

									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'primary',
										)
									);

								} elseif ( ! has_nav_menu( 'expanded' ) ) {

									wp_list_pages(
										array(
											'match_menu_classes' => true,
											'show_sub_menu_icons' => true,
											'title_li' => false,
											'walker'   => new TwentyTwenty_Walker_Page(),
										)
									);

								}
								?>

                </ul>

            </nav><!-- .primary-menu-wrapper -->
            <?php } ?>
        </div><!-- .header-navigation-wrapper -->

        
        <?php 
        // backend login button for admins
        if(is_admin()) {
            ?>
                <a class="button header-button login button-has-icon is-style-outline " href="<?php echo get_site_url(); ?>/wp-admin">
                    <img class="button-icon " src="<?php echo get_template_directory_uri()?>/assets/icons/profil.svg" />
                </a>
            <?php 
        }
        if (is_user_logged_in()) {
            ?>
                <!-- mein profil -->
                <a  class="button header-button login button-has-icon is-style-outline" href="<?php echo get_site_url(); ?>/profil">
                    <img class="button-icon " src="<?php echo get_template_directory_uri()?>/assets/icons/profil.svg" />
                    <!-- <img class="button-icon " src="<?php // echo get_template_directory_uri()?>/assets/images/avatar.jpeg" /> -->
                    <!-- append class gravatar to a tag -->
                </a>
            <?php 
        }
        else {
            ?>
                <a  class="button header-button login button-has-icon is-style-outline" href="<?php echo get_site_url(); ?>/profil">
                    <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/profil.svg" />
                </a>
            <?php 
        }
        ?>


    </header><!-- #site-header -->