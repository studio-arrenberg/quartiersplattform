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
		
	<?php 
		$text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt sed veritatis et quibusdam molestiae repellendus fugiat in dolorum. Tempore illo eum itaque voluptate, nulla exercitationem laborum placeat eius odio possimus?';
		reminder_card('projekte-intro', 'Projekte', $text );
	?>

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
			<?php 

			$text = 'Es gibt eine Sitebar die beliebig erweitert werden kann';
			reminder_card('css-grid', '🏗 Wir laufen jetzt unter <span class="highlight">CSS GRID</span>', $text );

			$text = 'Lorem <strong>ipsum</strong> dolor sit amet consectetur adipisicing elit. Sunt sed veritatis et quibusdam molestiae repellendus fugiat in dolorum.';
			reminder_card('huhu', '🐝 Huhu', $text );
			?>
		</div>
	</div>

<?php get_footer(); ?>