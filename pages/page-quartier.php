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

    <section class="quartier-header bg-image" style="background: url('<?php 
    $image = get_field('field_609021bb178d8', 'option');
    if( !empty( $image ) ){ ?>
        <?php echo esc_url($image['url']); ?>
    <?php 
    }  
    else
    {
        $image_url = get_template_directory_uri()."/assets/images/quartier.png";
        ?>
        <?php echo $image_url; ?>
    <?php 
    }  // !!! define vaariable and maake editable with acf
    ?>')">
        <div class="stage-center has-bg-blur">
            <div class="heading-size-2"><b><?php _e("Entdecke dein Quartier", "quartiersplattform"); ?></b></div>
            <h1 class="heading-size-1"><?php _e("Willkommen am Arrenberg", "quartiersplattform"); ?></h1>
        </div>
    </section>
    <?php 

    if (current_user_can('administrator') && !get_field('field_609021bb178d8','option') ) {
        // !!! add link to backend!
        reminder_card('no_quartiers_info', 'Bild und Text für die Startseite festlegen', 'In den Quartierseinstellungen kannst du das Bild sowie den Textfür die Startseite anpassen.'); 
    }

    ?>

    <section>
        <div class="stage-center">
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

    <section class="">
        <div class="stage-center">
            <!-- <div class="pre-header highlight"><b><?php _e("Lokale Projekte", "quartiersplattform"); ?></b></div> -->
            <h2 class="heading-size-1 stage-title"><?php _e("Entdecke spannende Projekte aus deinem Quartier", "quartiersplattform"); ?></h2>
            <p><?php _e("Sieh dir die Projekte in deiner Nachbarschaft an und beteilige dich am Quartiersleben! Veröffentliche eigene Projekte und finde Untersützung in deiner Nachbarschaft.", "quartiersplattform"); ?></p>
           
        </div>
        <div class="link-card-container">
            <?php 
                    $pinned_projects = array(
                        'post_type' => 'projekte',
                        'posts_per_page' => -1,
                        'order_by' => 'date',
                        'order' => 'DESC',
                        'meta_key'   => 'pin_main',
                        'meta_value' => array(true, 'true')
                    );
                    card_list($pinned_projects);
                ?>
         </div>
        
         <div class="button-container">

            <a class="button  is-style-outline" href="<?php echo get_site_url()."/projekte"; ?>"><?php _e("Neuigkeiten & Projektupdates", "quartiersplattform"); ?></a>
            <a class="button" href="<?php echo get_site_url()."/Projektverzeichnis"; ?>"><?php _e("Alle Projekte anzeigen", "quartiersplattform"); ?></a>
                </div>
    </section>


    <section>
        <div class="stage-center">
            <h2 class="heading-size-1 stage-title"><?php _e("Veranstaltungen in deinem Quartier", "quartiersplattform"); ?></h2>
            <p><?php _e("Verpasse keine Veranstaltung mehr in deinem Quartier. Egal ob das nächste Konzert oder die nächste Party in deiner Nachbarschaft - mit der Quartiersplattform bist du immer auf dem Laufenden!", "quartiersplattform"); ?></p>
            <div class="link-card-container">
                <?php 
                        $args4 = array(
                            'post_type'=>'veranstaltungen', 
                            'post_status'=>'publish', 
                            'posts_per_page'=> 20,
                            'meta_key' => 'event_date',
                            'orderby' => 'meta_val',
                            'order' => 'ASC',
                            'offset' => '0', 
                            'meta_query' => array(
                                array(
                                    'key' => 'event_date', 
                                    'value' => date("Y-m-d"),
                                    'compare' => '>=', 
                                    'type' => 'DATE'
                                )
                            )
                        );
                    ?>  
                    <?php card_list($args4);?>
                </div>
            <a class="button" href="<?php echo get_site_url()."/veranstaltungen"; ?>"><?php _e("Zu den Veranstaltungen", "quartiersplattform"); ?></a>
            </div>

        </div>

    </section>

    <section>
        <div class="stage-center">
            <h2 class="heading-size-1 stage-title"><?php _e('Ziele für nachhaltige Entwicklung im Quartier', 'quartiersplattform'); ?> </h2>
            <p><?php _e("Die Vereinten Nationen haben 2015 Ziele für eine nachhaltige Entwicklung (Sustainable Development Goals, SDGs) verabschiedet. Die SDGs spielen nicht nur international, sonder auch lokal in deinem Quartier eine wichtige Rolle.", "quartiersplattform"); ?></p>
            <div class="card-stack shadow-on-hover">
                <?php 
                    $args = array(
                        'post_type'=>'sdg', 
                        'post_status'=>'publish', 
                        'posts_per_page'=> 4,
                        'meta_key'   => 'number',
                        'meta_value' => $slug,
                    );
                        
                    // slider($args, $type = 'badge', $slides = '2', $dragfree = 'false', $align = 'start');
                    card_list($args, $type = 'badge');

                ?>
                <a class="button" href="<?php echo get_site_url( ) ?>/sdgs"><?php _e('Übersicht der Ziele für nachhaltige Entwicklung', 'quartiersplattform'); ?> </a>
            </div>

        </div>
    </section>
    
    <?php
        // pinned pages
        $pinned_pages = array(
            'post_type' => 'page',
            'posts_per_page' => -1,
            'order_by' => 'date',
            'order' => 'DESC',
            'meta_key'   => 'pin_main',
            'meta_value' => array(true, 'true')
        );

        if (count_query($pinned_pages)) {
            ?>

                 <h4 class="heading-size-2 stage-title"><?php _e('Wichtige Seiten', 'quartiersplattform'); ?> </h4>
                <?php card_list($pinned_pages); ?>

            <?php            
        }
    ?>


</main><!-- #site-content -->

<?php get_footer(); ?>