<?php
/**
 * Template Name: Anmerkungen
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">


	<?php 
	// veranstaltung list
	$args4 = array(
		'post_type'=>'anmerkungen', 
		'post_status'=>'publish', 
        'posts_per_page'=> -1
        // reihenfolge...?
	);
	card_list($args4);
	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
