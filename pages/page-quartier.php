<?php

/**
 * 
 * Template Name: Quartier
 * Template Post Type: page
 * 
 */


# redirect before acf_form_head
wp_maintenance_mode();

// redirect to intro page when new visitor
// redirect_visitor();

get_header();

?>

<main class="quartier" role="main" data-track-content>
    <?php
          # map picture variables
          $location = get_field('map', 'option');
          $latlong = "7.128,51.2485,";
          $map_zoom = 16.48; 
          $bearing = 0;
          $pitch = 60;
          $width = 1280;
          $height = 900;
    ?>

    <section class="section-full-width" style="background: url('https://api.mapbox.com/styles/v1/studioarrenberg/ckl9rpmct17pi17mxw1zw46h0/static/<?php echo $location['lng'].",".($location['lat'] - 0.008).",".$map_zoom.",".$bearing.",".$pitch."/".$width."x".$height; ?>@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ')">
        <div class="stage-center">
            <div class="pre-header highlight"><b><?php _e("Quartiersplattform", "quartiersplattform"); ?></b></div>
            <h1 class="stage-title"><?php _e("Willkommen in deinem digitalen Quartier", "quartiersplattform"); ?></h1>
            <p><?php _e("Hier findest du alle Aktionen und Aktivitäten in deinem Quartier. Sieh dir alle Neuigkeiten, Veranstaltungen und Umfragen aus deiner Nachbarschaft an und beteilige dich an der Entwicklung von deinem Viertel!","quartiersplattform"); ?></p>
        </div>
    </section>

    <section>
        <div class="stage-left">
            <div class="pre-header highlight"><b><?php _e("Dein Quartier", "quartiersplattform"); ?></b></div>
            <h1 class="stage-title"><?php _e("Lerne deine Nachbarschaft kennen", "quartiersplattform"); ?></h1>
            <p><?php _e("Entdecke dein Quartier sowie die Organisationen und Menschen vor Ort. Hier kannst du dich informieren und so an einer demokratischen Stadtentwicklung in deinem Quartier beteiligen.", "quartiersplattform"); ?></p>
            <a class="button" href="<?php echo get_site_url()."/aktuelles"; ?>"><?php _e("Zum Dashboard", "quartiersplattform"); ?></a>
        </div>
        <div class="link-card-container">
            <?php
                // Gutenberg Editor Content
                if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
                    the_excerpt();
                } else {
                    the_content( __( 'Continue reading', 'twentytwenty' ) );
                }
            ?>
        </div>
    </section>

    <section class="section-full-width">
        <div class="stage-center">
            <div class="pre-header highlight"><b><?php _e("Lokale Projekte", "quartiersplattform"); ?></b></div>
            <h1 class="stage-title"><?php _e("Entdecke spannende Projekte aus deinem Quartier", "quartiersplattform"); ?></h1>
            <p><?php _e("Sieh dir die Projekte in deiner Nachbarschaft an und beteilige dich am Quartiersleben! Veröffentliche eigene Projekte und finde Untersützung in deiner Nachbarschaft.", "quartiersplattform"); ?></p>
            <a class="button" href="<?php echo get_site_url()."/projekte"; ?>"><?php _e("Zu den Projekten", "quartiersplattform"); ?></a>
           
        </div>
        <div class="grid projekt-card-container">
                    
            <?php 
                $args4 = array(
                'post_type'=> array('projekte'), 
                'post_status'=>'publish', 
                'posts_per_page'=> 5,
                'orderby' => 'modified'
            );
            ?>  
                <?php card_list($args4);?>
        </div>
    </section>


    <section>
        <div class="stage-left">
            <div class="pre-header highlight"><b><?php _e("Lokale Veranstaltungen", "quartiersplattform"); ?></b></div>
            <h1 class="stage-title"><?php _e("Save the date!", "quartiersplattform"); ?></h1>
            <p><?php _e("Verpasse keine Veranstaltung mehr in deinem Quartier. Egal ob das nächste Konzert oder die nächste Party in deiner Nachbarschaft - mit der Quartiersplattform bist du immer auf dem Laufenden!", "quartiersplattform"); ?></p>
            <a class="button" href="<?php echo get_site_url()."/veranstaltungen"; ?>"><?php _e("Zu den Veranstaltungen", "quartiersplattform"); ?></a>
        </div>
        <div class="link-card-container">
            <?php 
                    $args4 = array(
                    'post_type'=> array('veranstaltungen'), 
                    'post_status'=>'publish', 
                    'posts_per_page'=> 4,
                    'orderby' => 'modified'
                );
                ?>  
                    <?php card_list($args4);?>
            </div>
        </div>
    </section>

    <section>
        <h1>SDGs im Quartier</h1>
        <p>preview....</p>
        <a class="button" href="<?php echo get_site_url( ) ?>/sdgs">Übersicht der Ziele für nachhaltige Entwicklung</a>
    </section>


    <section>
        <h1>Projekte im Quartier</h1>
        <p>preview....</p>
        <a class="button" href="<?php echo get_site_url( ) ?>/projektverzeichnis">Projekt liste</a>
    </section>



</main><!-- #site-content -->

<?php get_footer(); ?>