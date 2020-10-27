<?php
/**
 * Template Name: Landingpage Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">
	<header class="entry-header has-text-align-center header-footer-group">

		<div class="entry-header-inner section-inner medium">
			<h1 class="entry-title">Landingpage Template</h1>
		</div>
	</header>

	<div class="card shadow">
		<div class="content">
			<div class="pre-title">Pre-Title <span class="date">vor 30 Minuten<span></div>
			<h3 class="card-title">
				Card Title
			</h3>
			<p class="preview-text">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. 
			</p>
		</div>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt=""/>	
	</div>

	<div class="card preview shadow">
		<div class="preview-item">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt=""/>	
			<div class="content">
				<h3 class="card-title">
					Card Title
				</h3>
				<p class="preview-text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. 
				</p>
			</div>
		</div>
		<div class="preview-item">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt=""/>	
			<div class="content">
				<h3 class="card-title">
					Card Title
				</h3>
				<p class="preview-text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. 
				</p>
			</div>
		</div>
		<div class="preview-item">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt=""/>	
			<div class="content">
				<h3 class="card-title">
					Card Title
				</h3>
				<p class="preview-text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. 
				</p>
			</div>
		</div>
		<div class="preview-item">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt=""/>	
			<div class="content">
				<h3 class="card-title">
					Card Title
				</h3>
				<p class="preview-text">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. 
				</p>
			</div>
		</div>
		
	</div>



	<div class="card shadow">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt=""/>	
		<div class="content">
			<h3 class="card-title">
				Card Title
			</h3>
			<p class="preview-text">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. 
			</p>
		</div>
	</div>



	<?php 

		$kind =  "nachricht";
		get_template_part('elements/card', $kind); 
		
	?>

<div class="card landscape shadow">
		<div class="content">
			<h3 class="card-title">
				Landscape Card Title
			</h3>
			<p class="preview-text">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. 
			</p>
		</div>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt=""/>	
	</div>

<?php get_template_part('elements/landscape_card'); ?>

	<?php get_template_part('elements/card', 'veranstaltung'); ?>

	<?php get_template_part('components/energieampel'); ?>

	<?php get_template_part('components/call', 'register'); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
