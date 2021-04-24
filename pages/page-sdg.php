<?php

/**
 * 
 * Template Name: SDG
 * Template Post Type: page
 * 
 */

get_header();
?>

<main id="site-content" role="main">

    <?php
	// featured projekte
	$args = array(
		'post_type'=>'sdg', 
		'post_status'=>'publish', 
		'posts_per_page'=> -1,
		'orderby' => 'ASC'
	);

	$args = new WP_Query($args);
	while ( $args->have_posts() ) {
		$args->the_post();

		?>
			<div id="sdg-card" class="card card-sgd shadow bg_red">
                <a class="card-link">
                    <div class="content">    
						<h3 class="card-title">
                        	<?php echo get_the_title(); ?>
                        </h3>
                        <p class="preview-text">
                        	<?php get_the_content(); ?>
                        </p>
                    </div>
                </a>
            </div>

			<?php
				// get projects
				$args4 = array(
					'post_type'=> 'projekte', 
					'post_status'=> 'publish', 
					'author' =>  $current_user->ID,
					'posts_per_page'=> 10, 
					'order' => 'modified',
					'offset' => '0', 
				);
				slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');
			?>

		<?php

	}
	?>

</main><!-- #site-content -->

<?php get_footer(); ?>