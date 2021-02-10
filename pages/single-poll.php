<?php
/**
 * Template Name: Poll [Default]
 * Template Post Type: poll
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
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
    <br>

    <?php
    if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
        ?>
        <a class="button is-style-outline" href="<?php get_permalink(); ?>?action=edit">Umfrage bearbeiten</a>
        <a class="button is-style-outline" onclick="return confirm('Umfrage permanent löschen?')" href="<?php get_permalink(); ?>?action=delete">Umfrage löschen</a>
    <?php
    }

    ?>
    </div>
    <?php

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
?>


    <!-- kommentare -->
    <?php			

    // echo "kommentare";

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