<?php

/**
 * 
 * Template Name: Veranstaltung [Default]
 * Template Post Type: projekte
 * 
 */

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

        <?php 
        // Projekt Kachel
        project_card($post->ID);
        ?>

        <div class="page-card shadow">
            <a class="close-card-link" onclick="history.go(-1);">
                <img class="close-card-icon"  alt="Close" src="<?php echo get_template_directory_uri()?>/assets/icons/close.svg" />
            </a>
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                the_post();

                // get project by Term
                $term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
                $the_slug = $term_list[0]->slug;
                $project_id = $term_list[0]->description;
                
                if( empty($_GET['action']) ){

                // prep image url
                $image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) : '';

                if ( $image_url ) {
                    $cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
                    $cover_header_classes = ' bg-image';
                }
                
                // get project by Term
                ?>
                <h2 class="heading-size-3 highlight">
                    <span class="date">

                    <?php
                        if (get_field('event_end_date')) {
		            echo _e('Veranstaltungsreihe', 'quartiersplattform'). "<br>";
                            echo qp_date(get_field('event_date'), false, get_field('event_time'));
                            echo " ".__('bis','quartiersplattform')." ".qp_date(get_field('event_end_date'), false, get_field('event_end_time'));
                        } else {
                            echo _e('Veranstaltung', 'quartiersplattform'). "<br>";
                            echo qp_date(get_field('event_date'), true, get_field('event_time'));
                            if (get_field('event_end_time')) {
                            	echo " ".__('bis','quartiersplattform')." ".qp_date(get_field('event_date'), true, get_field('event_end_time'), true) . " Uhr <br>";
                            } else {
                            echo " Uhr";
                            }
                        }
                    ?>
                    </span>
                </h2>
                <h1 class="heading-size-1 large-margin-bottom"><?php the_title(); ?></h1>
                
                <?php visibility_badge(); ?>

                <div class="single-content">
                    <?php extract_links(get_field('text')); ?>
                </div>

                <?php if ( !empty(get_post_thumbnail_id())) { ?>
                    <img class="single-thumbnail" src="<?php echo esc_url( $image_url ) ?>" />
                <?php  } ?>


                <!-- Eventtext felder gibt es noch nicht -->
                <div class="button-group --break-button-group">

                <?php 
                // temp fix
                echo "<br>";

                // livestream
                if (get_field('livestream')) echo "<a class='button' target='_blank' href='".get_field('livestream')."' >".__('Zum Livestream', 'quartiersplattform')."</a>";
                // Ticket
                if (get_field('ticket')) echo "<a class='button' target='_blank' href='".get_field('ticket')."' >".__('Ticket erwerben', 'quartiersplattform')."</a>";
                // Website
                if (get_field('website')) echo "<a class='button' target='_blank' href='".get_field('website')."' >".__('Zur Website der Veranstaltung', 'quartiersplattform')."</a>";

                // calendar download
                calendar_download($post);

                ?>

                </div>

                <div class="gutenberg-content">
                    <?php
                    // Gutenberg Editor Content
                    if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
                        the_excerpt();
                    } else {
                        the_content( __( 'Continue reading', 'twentytwenty' ) );
                    }
                    ?>
                </div>

            </div>

            <?php
                if ( ( is_user_logged_in() && qp_project_owner() ) ) {
                ?>

                <div class="simple-card">
                    <div class="button-group">
                        <a class="button is-style-outline" href="<?php qp_parameter_permalink('action=edit'); ?>"><?php _e('Veranstaltung bearbeiten', 'quartiersplattform'); ?></a>
                        <a class="button is-style-outline button-red" onclick="return confirm(' Veranstaltung endgültig löschen?')" href="<?php qp_parameter_permalink('action=delete'); ?>"><?php _e('Veranstaltung löschen', 'quartiersplattform'); ?></a>
                    </div>
                </div>
                <br>
                <?php 
                }
                ?>
            <?php

            // anheften
            pin_toggle(); 

            // sichtbarkeit
            visibility_toggle(get_the_ID(  ));

            // project is not public
            if (get_post_status() == 'draft' && qp_project_owner() ) {
                reminder_card('!warning visibilty-warning-'.get_the_ID(  ), __('Dein Beitrag ist nicht öffentlich sichtbar.','quartiersplattform'), '');
            }

            get_template_part('components/general/share-post');

            // Author
            author_card();

            ?>

    
        <!-- Map -->
        <!-- not ready yet -->
        <?php get_template_part('components/general/map-card'); ?>
    
        <!-- Backend edit link -->
        <?php qp_backend_edit_link(); ?>

        <!-- kommentare -->
        <?php			
            if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
        ?>

        <div class="comments-wrapper">
            <?php comments_template('', true); ?>
        </div><!-- .comments-wrapper -->

        <?php
            } # kommentare

        }   # main loop 

        # post löschen
        else if (isset($_GET['action']) && $_GET['action'] == 'delete' && is_user_logged_in() && qp_project_owner() ) {

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
        # posst bearbeiten
        else {
            
            if ( ( is_user_logged_in() && qp_project_owner() ) ) {
                echo '<h2>Bearbeite deine Veranstaltung</h2><br>';
                acf_form (
                    array(
                        'id' => 'veranstaltungen-form',
                        'field_el' => 'div',
                        'post_content' => false,
                        'post_title' => true,
                        'return' => get_site_url().'/projekte'.'/', 
                        'uploader' => qp_form_uploader(),
                        'fields' => array(
                            'field_5fc8d0b28edb0', //Text
                            'field_5fc8d15b8765b', //Date
                            'field_5fc8d16e8765c', //Start 
                            'field_5fc8d18b8765d', //End
                            'field_5fc8d1ae96113', //EndDate
                            'field_5fc8d1e0d15c9', //Livestream
                            'field_5fc8d1f4d15ca', //Ticket
                            'field_5fc8d1c4d15c8', //Website
                            'field_603f4c75747e9', //Bilder
                            
                        ),
                        'submit_value'=> __('Änderungen speichern','quartiersplattform'),
                    )
                );       
            }
        }
    }
}
    
?>

</div>
</div>


<div class="right-sidebar">
        <?php
        // weitere Nachrichten
		$args2 = array(
			'post_type'=> array('veranstaltungen'), 
			'post_status'=>'publish', 
			'posts_per_page'=> 6,
            // 'order' => 'DESC',
            'post__not_in' => array(get_the_ID()),
            'offset' => '0', 
            'meta_query' => array(
                'relation' => 'AND',
                'date_clause' => array(
                    'key' => 'event_date',
                    // 'value' => date("Y-m-d"),
                    'compare'	=> '=',
                    // 'type' => 'DATE'
                ),
                'time_clause' => array(
                    'key' => 'event_time',
                    'compare'	=> '=',
                ),
            ),
            'orderby' => array(
                'date_clause' => 'DESC',
                'time_clause' => 'ASC',
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'projekt',
                    'field' => 'slug',
                    'terms' => "$the_slug"
                )
            )
        );
        
        $my_query = new WP_Query($args2);
        if ($my_query->post_count > 0 && empty($_GET['action'])) {
        ?>
            <h3><?php _e('Weitere Veranstaltungen aus diesem Projekt', 'quartiersplattform'); ?> </h3>
            <br>
        <?php
            card_list($args2);
        }

    ?>
    <br>
    </div>
</div>

</main><!-- #site-content -->


<?php get_footer(); ?>
