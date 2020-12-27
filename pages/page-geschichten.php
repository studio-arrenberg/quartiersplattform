<?php
/**
 * Template Name: Geschichten
 * Template Post Type: page
 * 
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<!-- Projekt Kachel -->
	<?php
		$args = array(
			'post_type'   => 'geschichten',
			'post_status' => 'publish',
			'orderby' => 'rand',
			'posts_per_page'=> -1
		);

		landscape_card($args);
    ?>

	
    <?php 
	// veranstaltung list
	$args4 = array(
		'post_type'=>'geschichten', 
		'post_status'=>'publish', 
		'posts_per_page'=> -1
	);
	?>
	
	<div class="card-container">
	<?php // card_list($args4);
	?>
</div>
</main><!-- #site-content -->

<?php get_footer(); ?>