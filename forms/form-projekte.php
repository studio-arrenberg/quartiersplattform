<?php
/**
 * Template Name: Projekt erstellen Formular
 * Template Post Type: projekte, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

// if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { // Execute code if user is logged in or user is the author
//     acf_form_head();
//     wp_deregister_style( 'wp-admin' );
// }

acf_form_head(); // before wp header !important!
get_header();
?>

<main id="site-content" role="main">

<div class="feedback">
    <h3>Erstelle dein Projekt</h3>
    <br>

    <?php // acf_form_head(); ?>

    <?php $hierarchical_tax = array( 1 ); ?>
    <?php 
    acf_form(
			array(
				'id' => 'projekte-form',
				'html_before_fields' => '',
				'html_after_fields' => '',
				'label_placement'=> '',                
				'post_id'=>'new_post',
				'new_post'=>array(
                    'post_type' => 'projekte',
                    'post_status' => 'publish',
				),
				'field_el' => 'div',
				'post_content' => false,
                'post_title' => true,
                'return' => get_site_url().'/projekte', // post gets dublicated
				'fields' => array(
                    'target',
                    'emoji',
                    'text',
                    '_thumbnail_id',
				),
				'submit_value'=>'Projekt veröffentlichen',
			)
    ); 

    ?>
	

</main><!-- #site-content -->

<?php get_footer(); ?>