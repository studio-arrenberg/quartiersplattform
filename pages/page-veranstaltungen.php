<?php

/**
 * 
 * Template Name: Veranstaltungen
 * Template Post Type: page
 * 
 */

get_header();

?>

<main id="site-content" role="main">
		
	<div class="card card-large">
		<div class="content content-shrink">
			<h1 class="card-title-large">
				Veranstaltungen in deinem Viertel
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
			'post_type'=> array('veranstaltungen'), 
			'post_status'=>'publish', 
			'posts_per_page'=> 50,
			'orderby' => 'modified'
		);
		?>  
		
		<div class="grid-3col" data-grid>
			<?php card_list($args4);?>
		</div>

		<script src="<?php echo get_template_directory_uri()?>/assets/js/bricks.js"></script>
		<!-- <script src="bundle.js"></script> -->

		<script>
		const sizes = [
		{ columns: 1, gutter: 0 }, // assumed to be mobile, because of the missing mq property
		{ mq: '800px', columns: 2, gutter: 30 },
		{ mq: '2000px', columns: 2, gutter: 150 },
		]

		// create an instance

		const instance = Bricks({
		container: '.grid-3col',
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



</div>

<!-- archive veranstltungen -->
<a class="button" href="<?php echo get_post_type_archive_link( 'veranstaltungen' ); ?>">Archiv</a>

</main><!-- #site-content -->


<?php get_footer(); ?>