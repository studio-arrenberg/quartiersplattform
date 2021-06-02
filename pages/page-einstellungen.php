<?php

/**
 * 
 * Template Name: Einstellungen
 * Template Post Type: page
 * 
 */


# redirect before acf_form_head
wp_maintenance_mode();

// redirect to intro page when new visitor
// redirect_visitor();

acf_form_head();
get_header();

?>

<main class="quartier" role="main" data-track-content>
    

    <br><br><br><br><br><br><br><br>
    <!-- heading -->
    <h1 class="heading-size-1"><?php echo __('Quartiersplattform Einstellungen','quartiersplattform'); ?></h1>
    <p><?php _e('Hier kannst du Einstellung für die Quartiersplattform vorhnehmen. Alle Einstellungen treten direkt in kraft und gelten für die gesamte Quartiersseite.', 'quartiersplattform')." ".get_field('quartiersplattform-name','option'); ?></p>


    <?php

    acf_form(
        array(
            'id' => 'einstellung-form',
            'html_before_fields' => '',
            'html_after_fields' => '',
            'label_placement'=> '',
            'post_id'=>'new_post',
            'new_post'=>array(
                'post_type' => 'anmerkungen',
                'post_status' => 'publish',
            ),
            'honeypot' => true,
            'field_el' => 'div',
            'post_content' => false,
            'post_title' => false,
            'return' => get_site_url(),
            'field_groups' => array('group_6023ea77ebd53'),
            'submit_value'=> __('Einstellungen speichern', 'quartiersplattform'),
        )
    ); 


    ?>


</main><!-- #site-content -->

<?php get_footer(); ?>