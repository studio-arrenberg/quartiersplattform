<?php

/**
 * 
 * Template Name: Fragen [Default]
 * Template Post Type: gemeinsam
 * 
 */

if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { // Execute code if user is logged in or user is the author
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}

get_header();

?>

<main id="site-content" role="main">

    <?php

    if ( have_posts() ) {

        while ( have_posts() ) {
            the_post();

            if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ){

                ?>
                <div class="card-container card-container__center card-container__large ">

                    <?php get_template_part('elements/card', get_post_type()); ?>

                </div>

                <h4>Kontakt</h4>
                <?php author_card(true); ?>

            <?php 

            if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
                ?>
                    <a class="button is-style-outline" href="<?php get_permalink(); ?>?action=edit">Frage bearbeiten</a>
                    <a class="button is-style-outline button-red" onclick="return confirm('Diese Frage endgültig löschen?')" href="<?php get_permalink(); ?>?action=delete">Frage löschen</a>
                <?php
            }
        ?>

        </div>

    <?php
    }
    # post löschen
    else if (isset($_GET['action']) && $_GET['action'] == 'delete' && is_user_logged_in() && $current_user->ID == $post->post_author) {

        wp_delete_post(get_the_ID());

        wp_redirect( get_site_url()."/gemeinsam" );

        ?>

        <h2><?php _e('Deine Frage wurde gelöscht.', 'quartiersplattform'); ?></h2>
        <br>
        <a class="button" href="<?php echo get_site_url(); ?>/gemeinsam"><?php _e('Gemeinsam', 'quartiersplattform'); ?> </a>


        <?php 
    }
    # Post bearbeiten
    else {
        if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
            echo '<h2>Bearbeite deine Frage</h2><br>';
            acf_form (
                array(
                    'form' => true,
                    'return' => '%post_url%',
                    'submit_value' => __('Änderungen speichern','quartiersplattform'),
                    'post_title' => false,
                    'post_content' => false,    
                    'field_groups' => array('group_5fcf56cd99219'), //Arrenberg App
                )
            );
            
        }

    }
?>
    <!-- kommentare -->
    <?php			
    if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ) {
    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
    ?>  

        <div class="comments-wrapper">
            <?php comments_template('', true); ?>
        </div><!-- .comments-wrapper -->

    <?php } ?>
    </div>
    <?php			
        }
    }
}



?>


<?php emoji_picker_init('acf-field_5fcf56cd9e356'); // load emoji picker ?>


</main><!-- #site-content -->


<?php get_footer(); ?>