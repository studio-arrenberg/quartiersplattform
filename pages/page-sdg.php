<?php

/**
 * 
 * Template Name: SDG
 * Template Post Type: page
 * 
 */

get_header();
?>

<main id="site-content" class=" page-grid" role="main">
	
	<div class="left-sidebar">
		<?php projekt_carousel(); ?>
	</div>


	<div class="main-content">

			<h1 class="large-margin-bottom">
				<?php _e(' Ziele für nachhaltige Entwicklung', 'quartiersplattform'); ?>
			</h1>
			<h2 class="text-size-1 large-margin-bottom"> 
				<?php _e('Die Vereinten Nationen haben 2016 Ziele für eine nachhaltige Entwicklung (Sustainable Development Goals, SDGs) verabschiedet. Die SDGs spielen nicht nur international, sonder auch lokal in deinem Quartier eine wichtige Rolle.', 'quartiersplattform'); ?> 
			</h2>
		
		<?php
		// SDGS
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
				<div class="sdg-section" id="sdg-id-<?php the_field('goal'); ?>" 

				style="
					background: linear-gradient(<?php the_field('color'); ?>20, rgba(255,255,255,0));
					color: <?php the_field('color'); ?>;">
				
						<div class="content">    
							<span class="sdg-number">
								<?php the_field('goal'); ?>
							</span >
							<h3 class="heading-size-2">
								<?php 
								_e(get_the_title(),'quartiersplattform'); ?>
							</h3>

							<h4 class="text-size-1">
								<?php _e(get_field('slogan'),'quartiersplattform'); ?>
							</h4>
							<p class="sdg-content">
								<?php _e(get_the_content(),'quartiersplattform'); ?>
							</p>
						</div>
					</a>
				</div>


				<?php
					$args4 = array(
						'post_type'=> 'projekte', 
						'post_status'=> 'publish', 
						'posts_per_page'=> -1, 
						'orderby'        => 'rand',
						'tax_query' => array(
							array(
								'taxonomy' => 'sdg',
								'field' => 'slug',
								'terms' => get_field('number')
							)
						)
					);
					
					slider($args4, $type = 'badge', $slides = '1', $dragfree = 'false');
				?>


		<?php
		}
		?>
	</div>
</main><!-- #site-content -->

<?php get_footer(); ?>