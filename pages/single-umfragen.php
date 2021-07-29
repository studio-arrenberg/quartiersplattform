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

    <div class="page-card umfragen-single shadow">
        <a class="close-card-link" onclick="history.go(-1);">
            <img class="close-card-icon"  alt="Close" src="<?php echo get_template_directory_uri()?>/assets/icons/close.svg" />
        </a>
    <?php

    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            if( empty($_GET['action']) ){

            ?>
                <?php //get_template_part('elements/card', get_post_type()); ?>

                <h2 class="heading-size-3 highlight">
                    <?php echo qp_date(get_the_date('Y-m-d'), false); ?>
                </h2> 
                <h1 class="heading-size-1">
                    <?php  
                        if (!is_single( )) shorten(get_the_title(), '50'); 
                        else echo get_the_title(); 
                    ?>
                </h1>
                <?php visibility_badge(); ?>
                <p class="text-size-2">
                    <?php extract_links(get_field('text')); ?>
                </p>

            <?php
            // get poll meta data
            $array = get_post_meta(get_the_ID(), 'polls', true);
            // set vote state 
            $vote_state = false;
            for ($i = 0; $i < count($array); $i++) if(in_array(get_current_user_id(),$array[$i]['user'])) $vote_state = true;
            $randId = md5(rand());
            ?>

            <form class="poll" id="poll-<?php echo get_the_ID(  ).$randId; ?>" method="POST" action="<?php echo admin_url( 'admin-ajax.php' ); ?>">
                <div class="answers">
                    <?php
                    if( have_rows('questions') ) {
                        $i = 0;
                        while( have_rows('questions') ) : the_row();
                            $sub_value = get_sub_field('item');
                        ?>
                            <button id="poll<?php echo $i; ?>" name="poll" value="<?php echo $i; ?>" <?php  if (!is_user_logged_in()) echo "disabled"; if (is_user_logged_in()) echo "type='submit'"; if(in_array(get_current_user_id(), $array[$i]['user'])) echo "checked='true'"; ?> >
                                <label id="poll<?php echo $i; ?>" for="<?php echo $sub_value; ?>">
                                    <?php echo $sub_value; ?>
                                    <img class="button-icon <?php if(!in_array(get_current_user_id(), $array[$i]['user'])) echo "hide"; ?>" src="<?php echo get_template_directory_uri()?>/assets/icons/star.svg" />
                                </label>
                                <div id="poll<?php echo $i; ?>">
                                    <?php if ($vote_state ) echo $array[$i]['count'].__(" Stimmen",'quartiersplattform'); ?>
                                </div>
                                <span class="scale" id="poll<?php echo $i; ?>"style="width: <?php if ($vote_state ) echo $array[$i]['percentage']; else echo '0'; ?>%">
                                </span>
                            </button>
                        <?php
                            $i++;
                        endwhile;
                    }
                    ?>
                </div>

                <?php 
                if (is_user_logged_in()) {
                ?>
                    <div class="card-footer">
                        <input class="button card-button" type="hidden" name="ID" value="<?php echo get_the_ID(); ?>" />
                        <input class="button card-button" type="hidden" name="action" value="polling" />
                    </div>
                <?php
                }

                if (!is_user_logged_in()) {
                ?>
                    <div class="login-wall hidden">
                        <p><?php _e('Melde dich auf der Quartiersplattform an um an der Umfrage teilzunehmen.', 'quartiersplattform'); ?> </p>
                        <a class="button card-button" href="<?php echo get_site_url(); ?>/login">
                            <?php _e('Anmelden', 'quartiersplattform'); ?> 
                        </a>
                        <a class="button card-button" href="<?php echo get_site_url(); ?>/register">
                            <?php _e('Registrieren', 'quartiersplattform'); ?> 
                        </a>
                        <a class="close-card-link">
                            <img class="close-card-icon"  alt="Close" src="<?php echo get_template_directory_uri()?>/assets/icons/close.svg" />
                        </a>
                    </div>
                <?php
                }
            ?>

            </form>

            <script>
            
            <?php if (is_user_logged_in()) { ?>

            jQuery(document).ready(function($) {
                jQuery('#poll-<?php echo get_the_ID(  ).$randId; ?>').ajaxForm({
                    success: function(response) {
                        $.each(response.data, function(k, v) {
                            $('form#poll-<?php echo get_the_ID(  ).$randId; ?> div#poll' + k).text(v['count'] + '<?php _e(' Stimmen', 'quartiersplattform'); ?>');
                            $('form#poll-<?php echo get_the_ID(  ).$randId; ?> span#poll' + k).css('width', v['percentage'] + '%');
                            
                            if (v['user'] == 'true') {
                                $('form#poll-<?php echo get_the_ID(  ).$randId; ?> label#poll' + k + ' img.button-icon').removeClass('hide');
                            }
                            else {
                                $('form#poll-<?php echo get_the_ID(  ).$randId; ?> label#poll' + k + ' img.button-icon').addClass('hide');
                            }
                        });
                    },
                    error: function(response) { },
                    resetForm: true
                })
            });

            <?php 
            } else {
                ?>
                jQuery('#poll-<?php echo get_the_ID(  ).$randId; ?> div.login-wall').on('click', function(e) {
                    $('#poll-<?php echo get_the_ID(  ).$randId; ?> div.login-wall').toggleClass('hidden');
                });

                <?php 
            } 
            ?>

            </script>
            <?php if (!empty($array[0]['total_voter']) && $array[0]['total_voter'] >= 3) { ?>
                <div class="content">
                    <p class="preview-text"><?php echo $array[0]['total_voter']." ".__('Stimmen','quartiersplattform'); ?></p>
                </div>
            <?php } ?>

            <br>

        </div><?php if ( qp_project_owner() ) { ?>
            <div class="simple-card">
                <div class="button-group">

                        <?php
                        // $array = get_post_meta(get_the_ID(), 'polls', true);
                        // if ( !isset($array[0]['total_voter']) || ( $array[0]['total_voter'] == 0 || !isset($array[0]['total_voter']) )) {
                        ?>
                            <a class="button is-style-outline" href="<?php qp_parameter_permalink('action=edit'); ?>"><?php _e('Umfrage bearbeiten', 'quartiersplattform'); ?></a>

                        <?php
                        // }
                        ?> 
                        <a class="button is-style-outline button-red" onclick="return confirm('<?php _e('Willst du diesen Beitrag endgültig löschen?','quartiersplattform'); ?>')" href="<?php qp_parameter_permalink('action=delete'); ?>"><?php _e('Umfrage löschen', 'quartiersplattform'); ?></a>
                    </div>
                </div>
            <?php } ?>


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

                    $array = get_post_meta(get_the_ID(), 'polls', true);
                    // check if poll already has no voter
                    if ( !isset($array[0]['total_voter']) || ( $array[0]['total_voter'] == 0 || !isset($array[0]['total_voter']) )) {

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
                    // poll has one oor more voter
                    else {

                        acf_form (
                            array(
                                'form' => true,
                                'return' => '%post_url%',
                                'submit_value' => __('Änderungen speichern','quartiersplattform'),
                                'post_title' => true,
                                'post_content' => false,    
                                'fields' => array(
                                    'field_601855a9aa4be' // Description
                                ),
                            )
                        );

                    }

                    
                    
                }
            }			

        // kommentare
        if( empty($_GET['action']) ) {
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