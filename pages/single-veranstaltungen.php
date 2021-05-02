<?php

/**
 * 
 * Template Name: Veranstaltung [Default]
 * Template Post Type: projekte
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

			// prep image url
			$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), 'preview_l' ) : '';

			if ( $image_url ) {
				$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
				$cover_header_classes = ' bg-image';
            }
            
            // get project by Term
            $term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
            $the_slug = $term_list[0]->slug;
            $project_id = $term_list[0]->description;
            ?>

            <div class="single-header">
                <!-- post title -->
                <div class="single-header-content">
                    <h1><?php the_title(); ?></h1>
                    <h3 class="single-header-slogan">
                        <?php echo get_cpt_term_owner($post->ID, 'projekt'); ?> 
                        <span class="date"><?php echo qp_date(get_field('event_date'), true, get_field('event_time')); ?></span>
                    </h3>

                    <?php
                    if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
                        // post_visibility_toggle( get_the_ID(  ) ); 
                        pin_toggle();
                    ?>
                    
                    <a class="button is-style-outline" href="<?php get_permalink(); ?>?action=edit"><?php _e('Veranstaltung bearbeiten', 'quartiersplattform'); ?></a>
                    <a class="button is-style-outline button-red" onclick="return confirm('<?php _e('Diese Veranstaltung endgültig löschen?', 'quartiersplattform'); ?>')"
                        href="<?php get_permalink(); ?>?action=delete"><?php _e('Veranstaltung löschen', 'quartiersplattform'); ?></a>
                        
                    <?php
                    }
                ?>

                </div>

                <!-- Bild -->
                <img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />

            </div>

            <!-- Eventtext felder gibt es noch nicht -->
            <div class="site-content">
            
                <?php 
                // text
                extract_links(get_field('text'));

                // temp fix
                echo "<br><br>";

                // livestream
                if (get_field('livestream')) echo "<a class='button' target='_blank' href='".get_field('livestream')."' >Zum Livestream</a>";

                // Ticket
                if (get_field('ticket')) echo "<a class='button' target='_blank' href='".get_field('ticket')."' >Zum Livestream</a>";

                // Website
                if (get_field('website')) echo "<a class='button' target='_blank' href='".get_field('website')."' >Zum Livestream</a>";

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

            <?php author_card(); ?>

            <?php 
                // calendar download
                calendar_download($post); 
            ?>

            <br>
            <br>


            <?php
                // weitere Nachrichten
                $args2 = array(
                    'post_type'=> array('nachrichten', 'veranstaltungen'), 
                    'post_status'=>'publish', 
                    'posts_per_page'=> 6,
                    'order' => 'DESC',
                    'post__not_in' => array(get_the_ID()),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'projekt',
                            'field' => 'slug',
                            'terms' => ".$the_slug."
                        )
                    )
                );
                
                $my_query = new WP_Query($args2);
                if ($my_query->post_count > 0) {
                ?>
                    <h2>Weitere Nachrichten & Veranstaltungen</h2>
                <?php
                    slider($args2,'card', '1','false');
                }
            ?>
            <br>

        <?php 
        // Projekt Kachel
        project_card($post->ID);
        ?>

    

        <!-- Map -->
        <!-- not ready yet -->
        <?php if ( current_user_can('administrator') ) { // new feature only for admins 
            
            // the_field('map');
            if (get_field('map')) {
                get_template_part('components/map-card');
            }    

        } 
        ?>
    
        <!-- Backend edit link -->
        <?php edit_post_link(); ?>

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
        else if (isset($_GET['action']) && $_GET['action'] == 'delete' && is_user_logged_in() && $current_user->ID == $post->post_author) {

            $term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
            $the_slug = $term_list[0]->slug;
            $project_id = $term_list[0]->description;

            wp_delete_post(get_the_ID());
            

            if ($project_id) {
                wp_redirect( get_permalink($project_id) );
            }
            else {
                wp_redirect( get_site_url() );
            }
            
        }
        # posst bearbeiten
        else {
            
            if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
                echo '<h2>Bearbeite deine Veranstaltung</h2><br>';
                acf_form (
                    array(
                        'id' => 'veranstaltungen-form',
                        'field_el' => 'div',
                        'post_content' => false,
                        'post_title' => true,
                        'return' => get_site_url().'/projekte'.'/'.$_GET['project'], 
                        'fields' => array(
                            'field_5fc8d0b28edb0', //Text
                            'field_5fc8d15b8765b', //Date
                            'field_5fc8d16e8765c', //Start AP1
                            'field_5fc8d18b8765d', //End AP1 
                            'field_5fc8d1e0d15c9', //Livestream
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

</main><!-- #site-content -->


<?php get_footer(); ?>