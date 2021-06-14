<?php

/**
 * 
 * Template Name: Einstellungen
 * Template Post Type: page
 * 
 */


if (!current_user_can('administrator')) {
    exit(wp_redirect( home_url().'/profil'));
}

# redirect before acf_form_head
wp_maintenance_mode();

// redirect to intro page when new visitor
// redirect_visitor();

acf_form_head();
get_header();

?>

<main id="site-content" class="page-grid" role="main">


    <div class="left-sidebar">
        <?php projekt_carousel(); ?>
    </div>

    <div class="main-content">

    <!-- heading -->
    <h1 class="heading-size-1"><?php echo __('Quartiersplattform Einstellungen','quartiersplattform'); ?></h1>
    <p><?php _e('Hier kannst du Einstellung für die Quartiersplattform vorhnehmen. Alle Einstellungen treten direkt in kraft und gelten für die gesamte Quartiersseite.', 'quartiersplattform')." ".get_field('quartiersplattform-name','option'); ?></p>
    <br>
    <a href="<?php echo home_url().'/wp-admin/admin.php?page=theme-general-settings' ?>" class="button">Wordpress Einstellungen</a>
    
    <br><br><br>

    <h2 class="heading-size-2"> Allgemeine Einstellungen <span class="highlight">beta</span> </h2>
    
    <?php

    $text = __('Allgemeine und öffentliche Informationen zu der Quartiersplattform.','quartiersplattform');
    // reminder_card('qp_info', __('Plattform information','quartiersplattform'), $text, __('Informationen','quartiersplattform'), home_url().'/quartiersplattform' );

    acf_form(
        array(
            'id' => 'einstellung-form',
            'html_before_fields' => '',
            'html_after_fields' => '',
            'label_placement'=> '',
            'post_id'=>'options',
            'honeypot' => true,
            'field_el' => 'div',
            'uploader' => 'basic',
            'post_content' => false,
            'post_title' => false,
            'return' => home_url().'/einstellungen',
            'field_groups' => array('group_6023ea77ebd53'),
            'submit_value'=> __('Einstellungen speichern', 'quartiersplattform'),
        )
    ); 

    ?>

    </div>
    


</main><!-- #site-content -->

<?php get_footer(); ?>