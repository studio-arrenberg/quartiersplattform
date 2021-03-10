<?php

/**
 * 
 * Template Name: Anmerkungen
 * Template Post Type: page
 *
 */

get_header();
?>

<main id="site-content" role="main">
<div class="card-container">

	<?php 
	// veranstaltung list
	$args4 = array(
		'post_type'=>'anmerkungen', 
		'post_status'=>'publish', 
        'posts_per_page'=> -1
	);
	card_list($args4);
	?>

</div>
</main><!-- #site-content -->

<?php get_footer(); ?>
