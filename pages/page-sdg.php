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
		// get_template_part('elements/card', get_post_type());

		?>
			<div class="card shadow projekt">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<div class="content">
					<!-- <div class="pre-title">Pre-Title <span class="date">vor 30 Minuten<span></div> -->
					<h3 class="card-title">
						<?php shorten_title(get_the_title(), '60'); ?>
					</h3>
					<p class="preview-text">
						<?php echo get_the_content(); ?>
					</p>
				</div>
				<div class="projects">

					<?php
						# get projects
						$slug = get_post_field( 'post_name', get_the_ID() );
						$args3 = array(
							'post_type'=>'projekte', 
							'post_status'=>'publish', 
							'posts_per_page'=> 4,
							'orderby' => 'rand',
							'tax_query' => array(
								array(
									'taxonomy' => 'sdg',
									'field' => 'slug',
									'terms' => $slug
								)
							)

						);
						slider($args3,'square_card', '2','true'); 

					?>

				</div>
			</a>
			</div>
		<?php

	}
	?>


</main><!-- #site-content -->

<?php get_footer(); ?>