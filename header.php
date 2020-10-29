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

	
</head>

<body <?php body_class(); ?>>

    <?php
		wp_body_open();
		?>

    <header id="site-header" role="banner">
        <div class="header-titles-wrapper">
            <div class="header-titles">
                <?php twentytwenty_site_logo(); ?>
            </div>
            <a class="btn site-header-btn" href="">Login</a>
        </div>

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
    </header><!-- #site-header -->