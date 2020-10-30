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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preload stylesheet" href="<?php echo get_template_directory_uri(); ?>/first.css">

    <?php wp_head(); ?>
    <script src="https://unpkg.com/embla-carousel@latest/embla-carousel.umd.js"> </script>


</head>

<body <?php body_class(); ?>>

    <?php
        wp_body_open();
        // check if menu is needed
        $menu_active = 'off';
        $menu_active_back = 'on';
        if( cms_is_in_menu( 'menu' ) ) {
            $menu_active = 'on';
            $menu_active_back = 'off';
        }
	?>

    <header id="site-header" class="<?php echo $menu_active; ?>" role="banner">
        <div class="header-top-wrapper">
            <div class="header-title">
                <?php twentytwenty_site_logo(); ?>
            </div>
        </div>



        <!-- back button (ultimately this will be a function)  -->
        <button class="<?php echo $menu_active_back; ?>" onclick="history.go(-1);">Back </button>



        <button class="header-button button-has-icon is-style-outline back" onclick="history.go(-1);">
            <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/back.svg" />
            Zurück
        </button>

        <div class="header-navigation-wrapper">
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




        <button class="header-button button-has-icon is-style-outline" href="">
            <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/profil.svg" />
        </button>


    </header><!-- #site-header -->