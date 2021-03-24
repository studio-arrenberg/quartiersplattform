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
		<a class="card-link" href="<?php echo get_site_url(); ?>/projekt-erstellen/">
			<div class="content content-shrink">
				<h1 class="card-title-large">
					Projekte
				</h1>
				<h3>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt sed veritatis et quibusdam molestiae repellendus fugiat in dolorum. Tempore illo eum itaque voluptate, nulla exercitationem laborum placeat eius odio possimus?	
				</h3>

			</div>
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

		<script src="<?php echo get_template_directory_uri()?>/assets/js/bricks.js"></script>
		<!-- <script src="bundle.js"></script> -->

		<script>
		const sizes = [
		{ columns: 1, gutter: 0 }, // assumed to be mobile, because of the missing mq property
		{ mq: '800px', columns: 4, gutter: 30 },
		{ mq: '2000px', columns: 4, gutter: 150 },
		]

		// create an instance

		const instance = Bricks({
		container: '.grid-4col',
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