<?php
/**
 * Template Name: Gemeinsam [Default]
 * Template Post Type: gemeinsam
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

<main id="site-content" class="gemeinsam" role="main">


    <?php

if ( have_posts() ) {

    while ( have_posts() ) {
        the_post();

    ?>

<div class="card-container  card-container__center card-container__large ">
    
    <?php get_template_part('elements/card', get_post_type()); ?>
</div>

    <!-- author -->

    <?php edit_post_link(); ?>

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

    <?php

if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
    echo '<h3>Bearbeite deine Frage</h3>';
    acf_form (
        array(
            'form' => true,
            'return' => '%post_url%',
            'submit_value' => 'Änderungen speichern',
            'post_title' => false,
            'post_content' => false,    
            'fields' => array(
                'text',                
            )
        )
    );
    
}
echo $post->post_author;
?>


        <!-- kommentare -->
        <?php			
    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
?>

        <div class="comments-wrapper">

            <?php comments_template('', true); ?>

        </div><!-- .comments-wrapper -->

    </div>
    <?php			
        }

    }
}



?>



</main><!-- #site-content -->



<?php get_footer(); ?>