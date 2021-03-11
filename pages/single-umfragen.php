<?php

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

            <br>

            <?php

            if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {

                $array = get_post_meta(get_the_ID(), 'polls', true);
                $array[$i]['total_voter'];

                if ( $array[0]['total_voter'] == 0 || !isset($array[0]['total_voter']) ) {
                
                ?>
                    <a class="button is-style-outline" href="<?php get_permalink(); ?>?action=edit">Umfrage bearbeiten</a>
                <?php
                }
                ?>

                <a class="button is-style-outline" onclick="return confirm('Umfrage permanent löschen?')" href="<?php get_permalink(); ?>?action=delete">Umfrage löschen</a>
            
            <?php
            }
            ?>

            <!-- Projekt Teilen -->
            <?php $page_for_posts = get_option( 'page_for_posts' ); ?>

            <div class="share">
                <h2>Umfrage teilen </h2>

                <div class="copy-url">
                    <input type="text" value="<?php echo get_permalink(); ?>" id="myInput">
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
                        href="mailto:?subject=<?php the_title(); ?>&body=%20<?php echo get_permalink(); ?>" target="_blank"
                        rel="nofollow">Email</a>

                </div>
            </div>

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

            <br><br>

            <?php
                // Projekt Kachel
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

            <?php
            }
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
            # post bearbeiten
            else {
                if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
                    echo '<h2>Bearbeite deine Umfrage</h2><br>';
                    acf_form (
                        array(
                            'form' => true,
                            'return' => '%post_url%',
                            'submit_value' => 'Änderungen speichern',
                            'post_title' => true,
                            'post_content' => false,    
                            'field_groups' => array('group_601855a265b19'), //Arrenberg App
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

</main><!-- #site-content -->

<?php get_footer(); ?>