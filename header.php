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

    <link rel="apple-touch-icon" sizes="57x57"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri()?>/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
        content="<?php echo get_template_directory_uri()?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Emoji Picker -->


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/emoji-picker/emoji.css" rel="stylesheet">





    <!-- Matomo -->
    <script type="text/javascript">
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u = "//abdruck.arrenberg.studio/";
        _paq.push(['setTrackerUrl', u + 'matomo.php']);
        _paq.push(['setSiteId', '12']);
        var d = document,
            g = d.createElement('script'),
            s = d.getElementsByTagName('script')[0];
        g.type = 'text/javascript';
        g.async = true;
        g.src = u + 'matomo.js';
        s.parentNode.insertBefore(g, s);
    })();
    </script>
    <noscript>
        <p><img src="//abdruck.arrenberg.studio/matomo.php?idsite=12&amp;rec=1" style="border:0;" alt="" /></p>
    </noscript>
    <!-- End Matomo Code -->


</head>

<body <?php body_class(); ?>>

    <?php
        wp_body_open();
        // check if menu is needed
        $menu = 'page-header';
        if( cms_is_in_menu( 'menu' ) ) {
            $menu = 'post-header';

        }
    ?>

    <header id="site-header" class="<?php echo $menu; ?>">

        <!-- back button -->
        <?php 

        if (parse_url($_SERVER['HTTP_REFERER'])['host'] == parse_url(get_site_url())['host']) {
            // display back button
            ?>
        <button class="<?php echo $menu_active_back; ?>header-button button-has-icon is-style-outline pull-left"
            onclick="history.go(-1);">
            <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/back.svg" />
            <span class="button-has-icon-label">Zurück</span>
        </button>
        <?php
        }
        else {
            // display home button
            ?>
        <a href="<?php echo get_site_url(); ?>"
            class="<?php echo $menu_active_back; ?> header-button button-has-icon is-style-outline pull-left button">
            <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/back.svg" />
            <span class="button-has-icon-label">Überblick</span>
        </a>
        <?php

        }
        ?>

        <?php 
        // backend login button for admins
        if(current_user_can('administrator')) {
            ?>
        <a class="button header-button  button-has-icon is-style-outline "
            href="<?php echo get_site_url(); ?>/wp-admin">
            <img class="button-icon " src="<?php echo get_template_directory_uri()?>/assets/icons/backend.svg" />
            <span class="button-has-icon-label">Backend</span>
        </a>
        <?php 
        }
        if (is_user_logged_in()) {
            ?>
        <!-- mein profil -->
        <a class="button header-button button-has-icon is-style-outline" href="<?php echo get_site_url(); ?>/profil">
            <img class="button-icon " src="<?php echo get_template_directory_uri()?>/assets/icons/profil.svg" /> 
            <!-- append class gravatar to a tag -->
        </a>


                <!-- if User has profil picture-->

        <a class="button header-button button-has-image is-style-outline" href="<?php echo get_site_url(); ?>/profil">
        <img class="button-image" src="<?php echo get_template_directory_uri()?>/assets/images/avatar.jpeg" />

        </a>
        <?php 
        }
        else {
            ?>
        <a class="button header-button  button-has-icon is-style-outline" href="<?php echo get_site_url(); ?>/anmelden">
            <img class="button-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/profil.svg" />
            <span class="button-has-icon-label">Anmelden</span>

        </a>
        <?php 
        }
        ?>



        <?php
				if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {


					?>

        <ul class="menu reset-list-style" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>"
            role="navigation">

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

        <?php } ?>
        </div><!-- .header-navigation-wrapper -->





    </header><!-- #site-header -->
<script>

    window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("site-header").style.top = "-45px";
  } else {
    document.getElementById("site-header").style.top = "0px";
  }
}

</script>