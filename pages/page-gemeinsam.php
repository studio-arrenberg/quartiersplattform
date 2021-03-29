<?php

/**
 * 
 * Template Name: Gemeinsam
 * Template Post Type: page
 * 
 */

get_header();
?>

<main id="site-content" role="main">



<div class="card-container">

	<?php 
	$args4 = array(
		'post_type'=> array('angebote', 'fragen'), 
		'post_status'=>'publish', 
		'posts_per_page'=> -1,
		'meta_query' => array(
			array(
				'key'     => 'expire_timestamp',
				'value'   => current_time('timestamp'),
				'compare' => '>',
				'type' 	=> 'timestamp',       
			),
		),
		'meta_key'          => 'expire_timestamp',
		'orderby'           => 'expire_timestamp',
		'order'             => 'ASC'
	);

	card_list($args4);
	?>

</div>


</main><!-- #site-content -->

	<div class="right-sidebar">
		
		<div class="card-container card-container__small">
			<?php get_template_part( 'components/call', 'frage' ); ?>
			<?php get_template_part( 'components/call', 'angebot' ); ?>
		</div>

		<?php 
			if ( ( is_user_logged_in() ) ) {
				get_template_part( 'components/call', 'projekt' ); 
			}
		?>
	
		<?php 

		$text = 'Es gibt eine Sitebar die beliebig erweitert werden kann';
		reminder_card('css-grid', '🏗  Wir haben jetzt eine Sidebar <span class="highlight">CSS GRID</span>', $text );

		$text = 'Lorem <strong>ipsum</strong> dolor sit amet consectetur adipisicing elit. Sunt sed veritatis et quibusdam molestiae repellendus fugiat in dolorum.';
		reminder_card('huhu', '🐝 Huhu', $text );
		?>

	
	</div>

<?php get_footer(); ?>



