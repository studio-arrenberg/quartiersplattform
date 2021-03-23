<?php

/**
 * 
 * Template Name: Projekt [Default]
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

			?>

            <div class="single-header  ">
                <!-- without-single-header-image -->


                <!-- Bild -->
                <img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />

                <!-- post title -->
                <div class="single-header-content center-mobile">
                    <!-- emoji -->
                    <div class="single-header-emoji"><?php the_field('emoji'); ?></div>

                    <h1><?php the_title(); ?></h1>

                    <!-- slogan -->
                    <div class="single-header-slogan"><?php the_field('slogan'); ?></div>
                    <!-- <h4><?php //if (current_user_can('administrator')) echo get_the_author(); ?></h4> -->

                    <?php
                    if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
                    ?>
                    <a class="button is-style-outline" href="<?php get_permalink(); ?>?action=edit">Projekt bearbeiten</a>
                    <a class="button is-style-outline button-red" onclick="return confirm('Dieses Projekt entgültig löschen?')" href="<?php get_permalink(); ?>?action=delete">Projekt löschen</a>
                    <?php
                    }
                    ?>


                <!-- Nachricht erstellen -->

                <?php
                    if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
                    ?>
                        <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/nachricht-erstellen/?project=<?php echo $post->post_name; ?>">Nachricht erstellen</a>
                    <?php
                    }
                ?>

                <?php
                    if ( is_user_logged_in() && $current_user->ID == $post->post_author && current_user_can('administrator') ) {
                    ?>
                        <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/umfrage-erstellen/?project=<?php echo $post->post_name; ?>">Umfrage erstellen</a>
                    <?php
                    }
                ?>
                <!-- Veranstaltung erstellen -->

                <?php
                    if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
                    ?>
                <a class="button is-style-outline"
                    href="<?php echo get_site_url(); ?>/veranstaltung-erstellen/?project=<?php echo $post->post_name; ?>">Veranstaltung erstellen</a>
                <?php
                    }
                ?>

                </div>

                <!-- akteur -->
                <!-- not ready yet -->


            </div>


            <?php if (get_field('text')) { ?>
            <div class="single-content">
                <h2>Beschreibung</h2>
                <p><?php extract_links(get_field('text')); ?></p>
            </div>
            <?php } ?>

            <?php if (get_field('goal')) { ?>
            <div class="single-content">
                <h2>Projektziel</h2>
                <p><?php the_field('goal'); ?></p>
            </div>
            <?php } ?>


            <?php
                // Last Polling
                if (current_user_can('administrator')) {
                    $args_chronik = array(
                        'post_type'=>'umfragen', 
                        'post_status'=>'publish', 
                        'posts_per_page'=> 1,
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'projekt',
                                'field' => 'slug',
                                'terms' => ".$post->post_name."
                            )
                        )

                    );

                    $my_query = new WP_Query($args_chronik);
                    if ($my_query->post_count > 0) {
                        ?>
                            <h2>Umfrage</h2>
                        <?php 
                        slider($args_chronik,'card', '1','false'); 
                    }
                }
            ?>

            <?php
                // Anstehende Veranstaltungen
                $args_chronik = array(
                    'post_type'=>'veranstaltungen', 
                    'post_status'=>'publish', 
                    'posts_per_page'=> 2,
                    'meta_key' => 'event_date',
                    'orderby' => 'rand',
                    'order' => 'ASC',
                    'offset' => '0', 
                    'meta_query' => array(
                        array(
                            'key' => 'event_date', 
                            'value' => date("Y-m-d"),
                            'compare' => '>=', 
                            'type' => 'DATE'
                        )
                    ),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'projekt',
                            'field' => 'slug',
                            'terms' => ".$post->post_name."
                        )
                    )

                );

                $my_query = new WP_Query($args_chronik);
                if ($my_query->post_count > 0) {
                    ?>
                        <h2>Anstehende Veranstaltung</h2>
                    <?php 
                    // slider($args_chronik,'card', '1','false'); 
                    get_template_part('elements/card', get_post_type());

                }
            ?>

            <?php
                // Projektverlauf
                $args_chronik = array(
                    'post_type' => array('veranstaltungen', 'nachrichten'),
                    'posts_per_page' => '3',
                    'order_by' => 'date',
                    'order' => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'projekt',
                            'field' => 'slug',
                            'terms' => ".$post->post_name."
                        )
                    )
                );

                $my_query = new WP_Query($args_chronik);
                if ($my_query->post_count > 0) {
                    list_card($args_chronik, get_site_url().'/projekt/'.$post->post_name.'/', 'Projektverlauf','Alle Veranstaltungen und Nachrichten');
                }
            ?>



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


            <!-- Ziele für nachhaltige Etwicklung -->
            <!-- not ready yet -->
            <?php if ( current_user_can('administrator') ) { 

                ?>
                    <h2>Ziele für nachhaltige Etwicklung</h2>
                <?php

                $terms = get_field('sdg');
                if( $terms ): ?>

                    <?php 
                    
                    // print_r($terms); 
                    foreach( $terms as $term ): 

                        $tax = get_term( $term, 'sdg' );
                        $slug = $tax->slug;

                        $args = array(
                            'post_type'=>'sdg', 
                            'post_status'=>'publish', 
                            'posts_per_page'=> -1,
                            'name'=> $tax->slug 
                        );

                        $args = new WP_Query($args);
                        while ( $args->have_posts() ) {
                            $args->the_post();
                            ?>
                                <div class="card card-sgd shadow bg_red">
                                    <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
                                        <div class="content">
                                            <h3 class="card-title">
                                                <?php echo get_the_title(); ?>
                                            </h3>
                                            <p class="preview-text">
                                                <?php
                                                    if (strlen(get_field('text')) > 2) {
                                                        shorten(get_field('text'), '55');
                                                    }
                                                    else {
                                                        shorten(get_the_content(), '55');
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>

                            <?php
                        }
                        wp_reset_postdata();

                    endforeach;
                endif;
                    
            } 
            ?>


            <!-- Team -->
            <div class="team">
                <h2> Hutträger </h2>    

                <?php author_card(true); ?>

            </div>



            <!-- Projekt Teilen -->
            <?php  
                $page_for_posts = get_option( 'page_for_posts' );
                ?>
            <div class="share">
                <h2> Projekt teilen </h2>
                <div class="copy-url">
                    <input type="text" value="<?php echo esc_url(get_permalink()); ?>" id="myInput">
                    <button class="copy" onclick="copy()">Kopieren</button>

                </div>

                <div class="share-button">

                    <a class="button is-style-outline " target="blank"
                    onclick="_paq.push(['trackEvent', 'Share', 'Facebook', '<?php the_title(); ?>']);"
                    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr( esc_url( get_page_link( $page_for_posts ) ) ) ?>">Faceboook</a>
                
                    <a class="button is-style-outline" target="blank"
                    onclick="_paq.push(['trackEvent', 'Share', 'Twitter', '<?php the_title(); ?>']);"
                    href="https://twitter.com/intent/tweet?url=<?php echo esc_attr( esc_url( get_page_link( $page_for_posts ) ) ) ?>">Twitter</a>
                
                    <a class="button is-style-outline" target="blank"
                    onclick="_paq.push(['trackEvent', 'Share', 'Email', '<?php the_title(); ?>']);"
                    href="mailto:?subject=<?php the_title(); ?>&body=%20<?php echo get_permalink(); ?>"
                    rel="nofollow">Email</a>

                </div>
            </div>

            <?php 
                

            ?>

            <script>
                function copy() {
                    _paq.push(['trackEvent', 'Share', 'Copy Link', '<?php the_title(); ?>']);
                    var copyText = document.getElementById("myInput");
                    copyText.select();
                    copyText.setSelectionRange(0, 99999)
                    document.execCommand("copy");
                    // alert("Copied the text: " + copyText.value);
                }
            </script>

        <?php
        }

        # post löschen
        else if (isset($_GET['action']) && $_GET['action'] == 'delete' && is_user_logged_in() && $current_user->ID == $post->post_author) {

            # delete taxonomy (projekt)
            $term = get_term_by('slug', $post->post_name, 'projekt');
            wp_delete_term( $term->term_id, 'projekt');

            # delete post
            wp_delete_post(get_the_ID());
            wp_redirect( get_site_url() );

        }
        # post bearbeiten
        else {
            
            if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {

                ?>

                <div class="publish-form">
                    <h2>Bearbeite dein Projekt</h2>
                    <br>

                    <?php
                        acf_form (
                            array(
                                'form' => true,
                                'return' => '%post_url%',
                                'submit_value' => 'Änderungen speichern',
                                'post_title' => true,
                                'post_content' => false,    
                                'uploader' => 'basic',
                                'field_groups' => array('group_5c5de08e4b57c'), //Arrenberg App
                            )
                        );
                    ?>

                </div>
            
            <?php
            }

            emoji_picker_init('acf-field_5fc64834f0bf2'); // load emoji picker 

            }
            ?>

            <!-- Map -->
            <!-- not ready yet -->
            <?php 
            
            if ( current_user_can('administrator') ) { // new feature only for admins 
                
                // the_field('map');
                if (get_field('map')) {
                    get_template_part('elements/map-card');
                }

            } 
            
            ?>

            <!-- Backend edit link -->
            <?php 
            if ( current_user_can('administrator') && !isset($_GET['action']) && !$_GET['action'] == 'edit') {
                edit_post_link(); 
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

                <?php

                }
            }
        }
    }


    if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ) {
    ?>

        <br><br><br>
        <h2>Weitere Projekte</h2>

        <?php
        $args3 = array(
            'post_type'=>'projekte', 
            'post_status'=>'publish', 
            'posts_per_page'=> 4,
            'orderby' => 'rand'
        );

        slider($args3,'square_card', '2','true'); 

    }
    ?>

</main><!-- #site-content -->

<?php get_footer(); ?>