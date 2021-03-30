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

		if ( !is_user_logged_in()  ) {
			$text = 'Lorem <strong>ipsum</strong> dolor sit amet consectetur adipisicing elit. Sunt sed veritatis et quibusdam molestiae repellendus fugiat in dolorum. Tempore illo eum itaque voluptate, nulla exercitationem laborum placeat eius odio possimus?';
			reminder_card('register', 'registiere dich', $text, 'Registieren', home_url( ).'/register' );
		}
		else {
			get_template_part( 'components/call', 'projekt' ); 

			get_template_part('components/smart-card/projekte');
		}

		?>
	</div>


<!-- </div> -->

<?php get_footer(); ?>