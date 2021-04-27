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
		'orderby'   => 'meta_value_num',
    	'meta_key'  => 'goal',
		'order'     => 'ASC',
	);

	$args = new WP_Query($args);
	while ( $args->have_posts() ) {
		$args->the_post();

		?>
			<div id="sdg-card" style="background-color: <?php the_field('color'); ?>;" class="card card-sgd shadow">
                <a class="card-link" >

                    <div class="content">    
						<h1>
							<?php the_field('goal'); ?>
						</h1>
						<h3 class="card-title">
                        	<?php the_title(); ?>
                        </h3>
                        <p class="preview-text">
                        	<?php the_content(); ?>
                        </p>
                    </div>
                </a>
            </div>


			<?php
				$args4 = array(
					'post_type'=> 'projekte', 
					'post_status'=> 'publish', 
					'posts_per_page'=> 6, 
					'order' => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'sdg',
							'field' => 'slug',
							'terms' => get_post_field( 'post_name' ),
						)
					)
				);
				slider($args4, $type = 'badge', $slides = '1', $dragfree = 'false');
			?>


		<?php

	}
	?>

</main><!-- #site-content -->

<?php get_footer(); ?>