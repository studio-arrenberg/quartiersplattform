<?php

if ( ( is_user_logged_in() && qp_project_owner() ) ) { // Execute code if user is logged in or user is the author
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}

get_header();

?>

<main id="site-content" class="page-grid" role="main">

	<div class="left-sidebar">
		<?php projekt_carousel(); ?>
	</div>

	<div class="main-content">

    <div class="page-card shadow">
        <a class="close-card-link" onclick="history.go(-1);">
                <img class="close-card-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/close.svg" />
        </a>

    <?php

    if ( have_posts() ) {

        while ( have_posts() ) {
            the_post();

            if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ){

            ?>

                <?php get_template_part('elements/card', get_post_type()); ?>
            <br>

            <?php if ( qp_project_owner() ) { ?>
            <div class="simple-card">
                <div class="button-group">

                    <?php
                    
                        $array = get_post_meta(get_the_ID(), 'polls', true);
                        $array[$i]['total_voter'];

                        if ( $array[0]['total_voter'] == 0 || !isset($array[0]['total_voter']) ) {
                        
                        ?>
                            <a class="button is-style-outline" href="<?php qp_parameter_permalink('action=edit'); ?>"><?php _e('Umfrage bearbeiten', 'quartiersplattform'); ?></a>

                        <?php
                        }
                        ?> 
                        <a class="button is-style-outline button-red" onclick="return confirm('<?php _e('Willst du diesen Beitrag endgültig löschen?','quartiersplattform'); ?>')" href="<?php qp_parameter_permalink('action=delete'); ?>"><?php _e('Umfrage löschen', 'quartiersplattform'); ?></a>
                    </div>
                </div>
            <?php } ?>

            


        </div>


            <?php
            if ( ( is_user_logged_in() && qp_project_owner() ) ) {
                pin_toggle();
                visibility_toggle(get_the_ID(  ));
            }

            get_template_part('components/general/share-post');

            // project is not public
            if (get_post_status() == 'draft' && qp_project_owner()) {
                reminder_card('!warning visibilty-warning-'.get_the_ID(  ), __('Dein Beitrag ist nicht öffentlich sichtbar.','quartiersplattform'), '');
            }
                // Projekt Kachel
                project_card($post->ID);
            ?>


            <?php
            }
            # post löschen
            else if (isset($_GET['action']) && $_GET['action'] == 'delete' && is_user_logged_in() && qp_project_owner()) {

                // get projekt link
                $term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
                $project_id = $term_list[0]->description;

                // delete post
                wp_delete_post(get_the_ID());

                // redirect
                if (!empty(get_permalink($project_id))) {
                    exit( wp_redirect( get_permalink($project_id) ) );
                }
                else {
                    exit( wp_redirect( get_site_url() ) );
                }
            }
            # post bearbeiten
            else {
                if ( ( is_user_logged_in() && qp_project_owner() ) ) {
                    echo '<h2>Bearbeite deine Umfrage</h2><br>';
                    acf_form (
                        array(
                            'form' => true,
                            'return' => '%post_url%',
                            'submit_value' => __('Änderungen speichern','quartiersplattform'),
                            'post_title' => true,
                            'post_content' => false,    
                            'field_groups' => array('group_601855a265b19'), 
                        )
                    );
                    
                }
            }			

        // kommentare
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

</div>

</main><!-- #site-content -->

<?php get_footer(); ?>