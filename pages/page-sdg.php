<?php

/**
 * 
 * Template Name: SDG
 * Template Post Type: page
 * 
 */

get_header();
?>

<main id="site-content" class="full-width page-grid" role="main">
	
	<div class="left-sidebar">
		<?php projekt_carousel(); ?>
	</div>


	<div class="main-content">

		<div class="">
			<h1 class="page-title">
				<?php _e(' Ziele für nachhaltige Entwicklung', 'quartiersplattform'); ?>
			</h1>
			<h2> 
				<?php _e('Die Vereinten Nationen haben 2015 im Rahmen der Agenda 2030 Ziele für eine nachhaltige Entwicklung (Sustainable Development Goals, SDGs) verabschiedet. Die SDGs spielen nicht nur international, sonder auch lokal in deinem Quartier eine wichtige Rolle.', 'quartiersplattform'); ?> 
			</h2>
		</div>

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
				<div class="sdg-section" id="sdg-card sdg-id-<?php the_field('goal'); ?>" 

				style="
					background: linear-gradient(<?php the_field('color'); ?>20, rgba(255,255,255,0));
					color: <?php the_field('color'); ?>;">
				
						<div class="content">    
							<span class="sdg-number">
								<?php the_field('goal'); ?>
							</span >
							<h3 class="card-title-large">
								<?php the_title(); echo get_field('number'); ?>
							</h3>

							<h4 class="preview-text-large">
								<?php the_field('slogan'); ?>
							</h4>
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
						'posts_per_page'=> -1, 
						// 'order' => 'rand',
						'tax_query' => array(
							array(
								'taxonomy' => 'sdg',
								'field' => 'slug',
								'terms' => get_post_field( 'post_name' ),
								// 'terms' => array('sgds',0,1,'0','1','06',8,19,'06. Sauberes Wasser und sanitäre Einrichtungen', 'Verfügbarkeit und nachhaltige Bewirtschaftung von Wasser und Sanitärversorgung für alle gewährleisten'),
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