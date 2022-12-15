<?php

wp_maintenance_mode(); // redirect for maintenance mode

?>

<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?> >

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;700&display=swap" rel="stylesheet">

    <link rel="alternate" href="https://example.com" hreflang="x-default" />

    <?php wp_head(); ?>

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri()?>/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri()?>/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri()?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri()?>/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri()?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

   
    <!-- Open Graph Tags  --> 
    <?php
        // read: https://ogp.me/
        // page specific
        $image = get_field('quartier_image', 'option');
        if (is_page( 'Startseite' )) {
            ?>
                <meta property="og:title" content="<?php echo 'Quartiersüberblick | '.get_field('quartiersplattform-name','option'); ?>" />
                <meta property="og:description" content="Lerne deinen Stadtteil kennen, entdecke interesannte Projekte und partizipiere in der Gemeinschaft." />
                <meta property="og:image" content="<?php echo esc_url($image['url']); ?>" />
                <meta property="og:image:alt" content="Quartier <?php the_field('quartiersplattform-name','option'); ?>"/>
                <meta property="og:type" content="website" />

                <meta name="description" content="Lerne deinen Stadtteil kennen, entdecke interesannte Projekte und partizipiere in der Gemeinschaft."/>

                <meta name="twitter:title" content="<?php echo 'Quartiersüberblick | '.get_field('quartiersplattform-name','option'); ?>"/>
                <meta name="twitter:description" content="Lerne deinen Stadtteil kennen, entdecke interesannte Projekte und partizipiere in der Gemeinschaft."/>
                <meta name="twitter:image" content="<?php echo esc_url($image['url']); ?>"/>
                <meta name="twitter:image:alt" content="Quartier <?php the_field('quartiersplattform-name','option'); ?>"/>

                <meta property="og:url" content="<?php echo home_url(); ?>" />
                <meta name="twitter:url" content="<?php echo home_url(); ?>"/>
                <meta property="og:locale" content="<?php echo home_url(); ?>"/>
            <?php
        }
        else if (is_page( 'Projekte' )) {
            ?>
                <meta property="og:title" content="<?php echo 'Neuigkeiten und Projektupdates | '.get_field('quartiersplattform-name','option'); ?>" />
                <meta property="og:description" content="Hier findest du alle Nachrichten, Umfragen und Veranstaltungen in deinem Quartier. Lerne die Menschen in deiner Nachbarschaft und ihre Projekte kennen oder erstelle selbst ein eigenes Projekt." />
                <meta property="og:image" content="<?php echo esc_url($image['url']); ?>" />
                <meta property="og:image:alt" content="Projekte im Quartier <?php the_field('quartiersplattform-name','option'); ?>"/>
                <meta property="og:type" content="website" />

                <meta name="description" content="Hier findest du alle Nachrichten, Umfragen und Veranstaltungen in deinem Quartier. Lerne die Menschen in deiner Nachbarschaft und ihre Projekte kennen oder erstelle selbst ein eigenes Projekt."/>

                <meta name="twitter:title" content="<?php echo 'Neuigkeiten und Projektupdates | '.get_field('quartiersplattform-name','option'); ?>"/>
                <meta name="twitter:description" content="Hier findest du alle Nachrichten, Umfragen und Veranstaltungen in deinem Quartier. Lerne die Menschen in deiner Nachbarschaft und ihre Projekte kennen oder erstelle selbst ein eigenes Projekt."/>
                <meta name="twitter:image" content="<?php echo esc_url($image['url']); ?>"/>
                <meta name="twitter:image:alt" content="Projekte im Quartier <?php the_field('quartiersplattform-name','option'); ?>"/>

                <meta property="og:url" content="<?php echo home_url().'/projekte/'; ?>" />
                <meta name="twitter:url" content="<?php echo home_url().'/projekte/'; ?>"/>
                <meta property="og:locale" content="<?php echo home_url().'/projekte/'; ?>"/>
            <?php
        }
        else if (is_page( 'Veranstaltungen' )) {
            ?>
                <meta property="og:title" content="<?php echo 'Veranstaltungen in deiner Nachbarschaft | '.get_field('quartiersplattform-name','option'); ?>" />
                <meta property="og:description" content="Hier kannst du lokale Veranstaltungen in deinem Quartier entdecken. So verpasst du keine Aktionen mehr in deiner Nachbarschaft und bleibst immer auf dem Laufenden." />
                <meta property="og:image" content="<?php echo esc_url($image['url']); ?>" />
                <meta property="og:image:alt" content="Veranstaltungen im Quartier <?php the_field('quartiersplattform-name','option'); ?>"/>
                <meta property="og:type" content="website" />

                <meta name="description" content="Hier kannst du lokale Veranstaltungen in deinem Quartier entdecken. So verpasst du keine Aktionen mehr in deiner Nachbarschaft und bleibst immer auf dem Laufenden."/>

                <meta name="twitter:title" content="<?php echo 'Veranstaltungen in deiner Nachbarschaft | '.get_field('quartiersplattform-name','option'); ?>"/>
                <meta name="twitter:description" content="Hier kannst du lokale Veranstaltungen in deinem Quartier entdecken. So verpasst du keine Aktionen mehr in deiner Nachbarschaft und bleibst immer auf dem Laufenden."/>
                <meta name="twitter:image" content="<?php echo esc_url($image['url']); ?>"/>
                <meta name="twitter:image:alt" content="Veranstaltungen im Quartier <?php the_field('quartiersplattform-name','option'); ?>"/>

                <meta property="og:url" content="<?php echo home_url().'/veranstaltungen/'; ?>" />
                <meta name="twitter:url" content="<?php echo home_url().'/veranstaltungen/'; ?>"/>
                <meta property="og:locale" content="<?php echo home_url().'/veranstaltungen/'; ?>"/>
            <?php
        }
        else if (is_page( 'SDGs' )) {
            ?>
                <meta property="og:title" content="<?php echo 'Ziele für nachhaltige Entwicklung | '.get_field('quartiersplattform-name','option'); ?>" />
                <meta property="og:description" content="Die Vereinten Nationen haben 2016 Ziele für eine nachhaltige Entwicklung (Sustainable Development Goals, SDGs) verabschiedet. Die SDGs spielen nicht nur international, sonder auch lokal in deinem Quartier eine wichtige Rolle." />
                <meta property="og:image" content="<?php echo esc_url($image['url']); ?>" />
                <meta property="og:image:alt" content="Ziele für nachhaltige Entwicklung im Quartier <?php the_field('quartiersplattform-name','option'); ?>"/>
                <meta property="og:type" content="website" />

                <meta name="description" content="Die Vereinten Nationen haben 2016 Ziele für eine nachhaltige Entwicklung (Sustainable Development Goals, SDGs) verabschiedet. Die SDGs spielen nicht nur international, sonder auch lokal in deinem Quartier eine wichtige Rolle."/>

                <meta name="twitter:title" content="<?php echo 'Ziele für nachhaltige Entwicklung | '.get_field('quartiersplattform-name','option'); ?>"/>
                <meta name="twitter:description" content="Die Vereinten Nationen haben 2016 Ziele für eine nachhaltige Entwicklung (Sustainable Development Goals, SDGs) verabschiedet. Die SDGs spielen nicht nur international, sonder auch lokal in deinem Quartier eine wichtige Rolle."/>
                <meta name="twitter:image" content="<?php echo esc_url($image['url']); ?>"/>
                <meta name="twitter:image:alt" content="Ziele für nachhaltige Entwicklung im Quartier <?php the_field('quartiersplattform-name','option'); ?>"/>

                <meta property="og:url" content="<?php echo home_url().'/sdgs/'; ?>" />
                <meta name="twitter:url" content="<?php echo home_url().'/sdgs/'; ?>"/>
                <meta property="og:locale" content="<?php echo home_url().'/sdgs/'; ?>"/>
            <?php
        }
        else if (is_page( 'Quartiersplattform' )) {
            ?>
                <meta property="og:title" content="<?php echo 'Informationen zur Quartiersplattform | '.get_field('quartiersplattform-name','option'); ?>" />
                <meta property="og:description" content="Die wichtigsten informationen zur deiner Quartiersplattform. Hier erhälst du einen technischen Überblick über den Status der Quartiersplattform wie auch allen hinuzgefügten Plugins. Bei Fragen oder Problemen kannst du die Betreiber kontaktieren." />
                <meta property="og:type" content="website" />

                <meta name="description" content="Die wichtigsten informationen zur deiner Quartiersplattform. Hier erhälst du einen technischen Überblick über den Status der Quartiersplattform wie auch allen hinuzgefügten Plugins. Bei Fragen oder Problemen kannst du die Betreiber kontaktieren."/>

                <meta name="twitter:title" content="<?php echo 'Informationen zur Quartiersplattform | '.get_field('quartiersplattform-name','option'); ?>"/>
                <meta name="twitter:description" content="Die wichtigsten informationen zur deiner Quartiersplattform. Hier erhälst du einen technischen Überblick über den Status der Quartiersplattform wie auch allen hinuzgefügten Plugins. Bei Fragen oder Problemen kannst du die Betreiber kontaktieren."/>

                <meta property="og:url" content="<?php echo home_url().'/quartiersplattform/'; ?>" />
                <meta name="twitter:url" content="<?php echo home_url().'/quartiersplattform/'; ?>"/>
                <meta property="og:locale" content="<?php echo home_url().'/quartiersplattform/'; ?>"/>
            <?php
        }
        // page, post, project, ...
        else {
            ?>
                <meta property="og:title" content="<?php echo get_the_title(); ?>  |  <?php echo get_cpt_term_owner($post->ID, 'projekt'); ?><?php if (get_field('slogan')) echo " - ".get_field('slogan'); ?>" />
                <meta property="og:description" content="<?php if (get_field('text')) { shorten(get_field('text'), 200); } else { shorten(get_the_content(), 200); } ?>" />
                <meta property="og:image" content="<?php the_post_thumbnail_url('landscape_s' ); ?> " />
                <meta property="og:image:alt" content="<?php echo get_the_title(); ?>"/>
                <meta property="og:type" content="article" />
                
                <meta property="article:section" content="Quartiersentwicklung" />
                <meta property="article:author" content="<?php echo get_cpt_term_owner($post->ID, 'projekt'); ?>" />

                <meta name="description" content="<?php if (get_field('text')) { shorten(get_field('text'), 200); } else { shorten(get_the_content(), 200); } ?>"/>

                <meta name="twitter:title" content="<?php echo get_the_title(); ?>  |  <?php echo get_cpt_term_owner($post->ID, 'projekt'); ?><?php if (get_field('slogan')) echo " - ".get_field('slogan'); ?>"/>
                <meta name="twitter:description" content="<?php if (get_field('text')) { shorten(get_field('text'), 200); } else { shorten(get_the_content(), 200); } ?>"/>
                <meta name="twitter:image" content="<?php the_post_thumbnail_url('landscape_s' ); ?>"/>
                <meta name="twitter:image:alt" content="<?php echo get_the_title(); ?>"/>

                <meta property="og:url" content="<?php echo esc_url( get_page_link() ); ?>" />
                <meta name="twitter:url" content="<?php echo esc_url( get_page_link() ); ?>"/>
                <meta property="og:locale" content="<?php echo esc_attr( get_locale() ); ?>"/>
            <?php
        }
    ?>
    

    <meta property="og:locale" content="de_DE" />
    <meta property="og:locale:alternate" content="en_GB" />
    <meta property="og:locale:alternate" content="tr_TR" />
    <meta property="og:locale:alternate" content="it_IT" />
    <meta property="og:site_name" content="<?php echo 'Quartiersplattform '.get_field('quartiersplattform-name','option'); ?>"/>
    <meta name="twitter:card" content="summary"/>

    <!-- Matomo Tracking API Key -->
    <?php the_field('matomo_api', 'option'); ?>


</head>

<body <?php body_class(); ?> >

<?php display_cookie_warning(); ?>

    <?php
        wp_body_open();
        // check if menu is needed
        $menu = 'page-header';
        if( cms_is_in_menu( 'qp_menu') ) {
            $menu = 'post-header';
        }
    ?>


    <header id="site-header" class="<?php echo $menu; ?>">
        <div class="site-header-content">
            <div class="pull-left">

                <?php
                    // remove menu when in maintenance mode
                    if (get_field('maintenance', 'option') == false || current_user_can('skip_maintenance')) {
                        if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
                        ?>

                            <ul class="menu reset-list-style" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>" role="navigation">
                                <li class="<?php if (is_page( 'Startseite' )) echo "current-menu-item"; ?>">
                                    <a href="<?php echo home_url( ); ?>" aria-current="page"><?php the_field('quartiersplattform-name','option'); ?></a>
                                </li>

                                <li class="<?php if (is_page( 'Projekte' )) echo "current-menu-item"; ?>">
                                    <a title="Projekte" href="<?php echo home_url( ).'/projekte/'; ?>"><?php _e('Projekte', 'quartiersplattform'); ?> </a>
                                </li>                    
                            </ul>

                        <?php 
                        }   
                    }
                ?>

                </div>

                <div class="push-right">


                    <?php 
                    // QP filter for menu buttons 'qp_menu_button' 
                    do_action('qp_menu_button');
                    ?> 

                    <a class="button header-button button-has-icon veranstaltungen-button <?php if (is_page( 'Veranstaltungen' )) echo "is-primary"; ?> " href="<?php echo get_site_url(); ?>/veranstaltungen">
                        <?php require get_template_directory() . '/assets/icons/calendar.svg'; ?>
                    </a>

                    <?php
                    // logged in user
                    if (is_user_logged_in()) {
                    ?>

                        <?php 
                        // backend login button for admins
                        if(current_user_can('administrator')) {
                            ?>
                                <a class="button header-button button-has-icon backend-button" href="<?php echo get_site_url(); ?>/wp-admin">
                                    <?php require get_template_directory() . '/assets/icons/gearshape.svg'; ?>
                                </a>
                            <?php 

                            
                        }
                        ?>

                        <!-- profil button -->
                        <a class="button profil-button header-button button-is-transparent button-has-image profil-button" href="<?php echo get_site_url(); ?>/profil">
                            <img alt="profil-bild" class="button-image" src="<?php echo um_get_user_avatar_url(get_current_user_id(), $size = '300' ) ?>" />
                        </a>

                        <?php 
                    }
                    // logged out user
                    else {

                        ?>
                        <a class="button header-button button-has-icon login-button" href="<?php echo get_site_url(); ?>/login">
                            <?php require get_template_directory() . '/assets/icons/person.svg'; ?>
                        </a>
                        <?php 
                    }
                    ?>

                </div>
            </div>
        </div><!-- .header-navigation-wrapper -->

    </header><!-- #site-header -->

    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        var currentScrollTop = 0;
        var c = 0;

        function scrollFunction() {
            currentScrollTop = document.documentElement.scrollTop;

            if (Math.abs(currentScrollTop - c) > 150) {
                if (currentScrollTop > c) {
                    document.getElementById("site-header").style.top = "0px";
                }
                else {
                    document.getElementById("site-header").style.top = "0px";
                }
                c = currentScrollTop;
            }
        }
    </script>

    <?php 
    // QP filter for overlays 'qp_overlays' 
    do_action('qp_overlays');
    ?> 


    
