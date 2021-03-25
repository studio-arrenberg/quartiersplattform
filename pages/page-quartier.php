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
redirect_visitor();

get_header();

?>

<main class="quartier" role="main" data-track-content>
    <?php
          # map picture variables
          $latlong = "7.128,51.2485,";
          $map_zoom = 13.48; 
          $width = 1280;
          $height = 900;
    ?>

    <section class="section-full-width" style="background: url('https://api.mapbox.com/styles/v1/studioarrenberg/ckl9rpmct17pi17mxw1zw46h0/static/<?php echo $latlong.$map_zoom."/".$width."x".$height; ?>@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ')">
        <div class="stage-center">
            <div class="pre-header highlight"><b>Quartiersplattform</b></div>
            <h1 class="stage-title">Willkommen am digitalen Arrenberg</h1>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
            <a class="button">Zum Dashboard</a>
        </div>
    </section>

    <section>
        <div class="stage-left">
            <div class="pre-header highlight"><b>Quartiersplattform</b></div>
            <h1 class="stage-title">Lerne dein Quartier kennen</h1>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
            <a class="button">Zum Dashboard</a>
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
            <div class="pre-header highlight"><b>Quartiersplattform</b></div>
            <h1 class="stage-title">Entdecke spannende Projekte aus deinem Quartier</h1>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
            <a class="button">Zum Dashboard</a>
           
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
            <div class="pre-header highlight"><b>Quartiersplattform</b></div>
            <h1 class="stage-title">Save the dates</h1>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
            <a class="button">Zum Dashboard</a>
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



</main><!-- #site-content -->

<?php get_footer(); ?>