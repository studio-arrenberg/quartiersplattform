<?php

/**
 * 
 * Template Name: Geschichten
 * Template Post Type: page
 * 
 */

get_header();
?>

<main id="site-content" role="main">
<div class="card-container ">

	<?php
		$args = array(
			'post_type'   => 'geschichten',
			'post_status' => 'publish',
			'orderby' => 'rand',
			'posts_per_page'=> -1
		);
		landscape_card($args);
    ?>

</div>

</main><!-- #site-content -->

<?php get_footer(); ?>