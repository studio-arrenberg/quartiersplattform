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

		// get_template_part( 'components/sdg/sdg-card' );

		// echo get_post_field( 'post_name' );

		?>
			<div id="sdg-card" class="card card-sgd shadow <?php echo get_post_meta( get_the_ID(), 'class', true ); ?>">
                <a class="card-link"  onclick="myFunction()">

                    <div class="content">    
						<h3 class="card-title">
                        	<?php echo get_the_title(); ?>
                        </h3>
                        <p class="preview-text">
                        	<?php
                                the_content();
                    		?>

                        </p>
                    </div>
                </a>
            </div>


			<!-- <div id="sdg-projekts" class="card-content-hidden"> -->

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
					slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');
				?>

			<!-- </div> -->



		<?php

	}
	?>

</main><!-- #site-content -->

<?php get_footer(); ?>