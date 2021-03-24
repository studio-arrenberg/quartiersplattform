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
			$args4 = array(
			'post_type'=> array('projekte'), 
			'post_status'=>'publish', 
			'posts_per_page'=> 50,
			'orderby' => 'modified'
		);
		?>  
		
		<div class="grid" data-grid>
			<?php card_list($args4);?>
		</div>

		<script src="<?php echo get_template_directory_uri()?>/assets/js/bricks.js"></script>
		<!-- <script src="bundle.js"></script> -->

		<script>
		const sizes = [
		{ columns: 1, gutter: 0 }, // assumed to be mobile, because of the missing mq property
		{ mq: '800px', columns: 2, gutter: 150 },
		{ mq: '2000px', columns: 4, gutter: 150 },
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