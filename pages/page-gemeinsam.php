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

	?>
	<div class="grid" data-grid>
		<?php
		set_query_var( 'additional_info', true );
		card_list($args4);
		?>
	</div>

</div>

	<script src="<?php echo get_template_directory_uri()?>/assets/js/bricks.js"></script>

    <script>
		const sizes = [
			{ columns: 1, gutter: 25 }, // assumed to be mobile, because of the missing mq property
			{ mq: '750px', columns: 2, gutter: 25 },
			{ mq: '800px', columns: 2, gutter: 100 },
			{ mq: '875px', columns: 2, gutter: 175 },
		]

		// create an instance
		const instance = Bricks({
			container: '.grid',
			packed:    'data-packed',        // if not prefixed with 'data-', it will be added
			sizes:     sizes,
			position: false
		})

		// bind callbacks
		instance
			.on('pack',   () => console.log('ALL grid items packed.'))
			.on('update', () => console.log('NEW grid items packed.'))
			.on('resize', size => console.log('The grid has be re-packed to accommodate a new BREAKPOINT.'))

		// start it up, when the DOM is ready
		// note that if images are in the grid, you may need to wait for document.readyState === 'complete'
		document.addEventListener('DOMContentLoaded', event => {
		instance
			.resize(true)     // bind resize handler
			.pack()           // pack initial items
		})
    </script>


</main><!-- #site-content -->

	<div class="right-sidebar">

		<div class="card-container card-container__small">
			<?php get_template_part( 'components/call', 'frage' ); ?>
			<?php get_template_part( 'components/call', 'angebot' ); ?>
		</div>
	
		<?php 

		$text = 'Es gibt eine Sitebar die beliebig erweitert werden kann';
		reminder_card('css-grid', '🏗  Wir haben jetzt eine Sidebar <span class="highlight">CSS GRID</span>', $text );

		$text = 'Lorem <strong>ipsum</strong> dolor sit amet consectetur adipisicing elit. Sunt sed veritatis et quibusdam molestiae repellendus fugiat in dolorum.';
		reminder_card('huhu', '🐝 Huhu', $text );
		?>

	
	</div>

<?php get_footer(); ?>



