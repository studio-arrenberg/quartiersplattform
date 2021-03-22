<?php

/**
 * 
 * Template Name: Projekte
 * Template Post Type: page
 * 
 */

get_header();

?>

<main id="site-content" role="main">
<div class="card-container card-container__center card-container__long">

	<?php 
		if ( ( is_user_logged_in() ) ) {
			get_template_part( 'components/call', 'projekt' ); 
		}
	?>
	
</div>

    <?php
	// featured projekte
	$args3 = array(
		'post_type'=>'projekte', 
		'post_status'=>'publish', 
		'posts_per_page'=> 4,
		'orderby' => 'rand'
	);

	slider($args3,'square_card', '2','true'); 
	?>

	
    <?php 
	// veranstaltung list
	$args4 = array(
		'post_type'=>'projekte', 
		'post_status'=>'publish', 
		'posts_per_page'=> -1,
		'orderby' => 'modified'
	);
	?>
	
	<div class="card-container-col-4">
	<?php card_list($args4);
	?>
</div>
</main><!-- #site-content -->

<?php get_footer(); ?>