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
		
	<div class="card card-large">
		<div class="content content-shrink">
			<h1 class="card-title-large">
				Projekte
			</h1>
			<h3>
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt sed veritatis et quibusdam molestiae repellendus fugiat in dolorum. Tempore illo eum itaque voluptate, nulla exercitationem laborum placeat eius odio possimus?	
			</h3>

		</div>
		<a class="close-card-link" href="#">
			<img class="close-card-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/close.svg" />
		</a>
	</div>

	<?php 
			$args4 = array(
			'post_type'=> array('projekte'), 
			'post_status'=>'publish', 
			'posts_per_page'=> 50,
			'orderby' => 'modified'
		);
		?>  
		
		<div class="grid-4col" data-grid>
			<?php card_list($args4);?>
		</div>


	</main><!-- #site-content -->


		<div class="right-sidebar">
			<?php 
				if ( ( is_user_logged_in() ) ) {
					get_template_part( 'components/call', 'projekt' ); 
				}
			?>
		
				<div class="card ">
					<div class="emojis-top">🍾🍰</div>
				<div class="card-header">
					<h2>Wir laufen jetzt unter <span class="highlight">CSS GRID</span></h2>
					<p>Es gibt eine Sitebar die beliebig erweitert werden kann</p>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>