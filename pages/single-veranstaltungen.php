<?php
/**
 * Template Name: Veranstaltung [Default]
 * Template Post Type: projekte
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
                <span class="date"><?php echo wp_date('j. F', strtotime(get_field('event_date'))); ?></span>
            </h3>

        <?php
            if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
            ?>
            <a class="button is-style-outline" href="<?php get_permalink(); ?>?action=edit">Veranstaltung bearbeiten</a>
            <a class="button is-style-outline button-red" onclick="return confirm('Diese Veranstaltung entgültig löschen?')"
                href="<?php get_permalink(); ?>?action=delete">Veranstaltung löschen</a>
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
        the_field('text');

        // temp fix
        echo "<br><br>";

        // livestream
        if (get_field('livestream')) echo "<a class='button' target='_blank' href='".get_field('livestream')."' >Zum Livesstream</a>";

        // Ticket
        if (get_field('ticket')) echo "<a class='button' target='_blank' href='".get_field('ticket')."' >Zum Livesstream</a>";

        // Website
        if (get_field('website')) echo "<a class='button' target='_blank' href='".get_field('website')."' >Zum Livesstream</a>";
        ?>

    </div>
    <!-- Gutenberg Editor Content -->
    <div class="gutenberg-content">
        <?php
        if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
            the_excerpt();
        } else {
            the_content( __( 'Continue reading', 'twentytwenty' ) );
        }
        ?>

    </div>

    <!-- calendar download -->
    <?php calendar_download($post); ?>


    <br>
    <br>

<!-- weitere Nachrichten -->
<?php
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

  <!-- Projekt Kachel -->
  <?php
        $term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
        $the_slug = $term_list[0]->slug;
        if ($the_slug) {
            $args = array(
                'name'        => $term_list[0]->slug,
                'post_type'   => 'projekte',
                'post_status' => 'publish',
                'numberposts' => '1'
            );


            $my_query = new WP_Query($args);
            if ($my_query->post_count > 0) {
     ?>


    <h2>Das Projekt</h2>

    <div class="card-container ">

        <?php
            landscape_card($args);
            } 

            
        }
    ?>

    </div>
    <!-- map: adresse -->
    <!-- not ready yet -->
    
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
            }
        }

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
                            'field_601d9d8ac7c9b', //Bilder
                            'field_60226dfd58a16', //Bilder AP1
                            
                        ),
                        'submit_value'=>'Änderungen speichern',
                        
                    )
                );       
            }
        }
    }
}
    

	?>

</main><!-- #site-content -->


<?php get_footer(); ?>