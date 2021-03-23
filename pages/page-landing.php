<?php

/**
 * 
 * Template Name: Landing Page
 * Template Post Type: page
 * 
 */


// redirect before acf_form_head
wp_maintenance_mode();

// redirect to intro page when new visitor
redirect_visitor();

acf_form_head(); // before wp header !important!
get_header();

?>

<main id="site-content" role="main" data-track-content>

<h1> Wir wollen eine Suche </h1>

    <?php 
	// ---------------------------------- Logged in ----------------------------------
	if (is_user_logged_in()) {
	?>




	<?php 
		$args4 = array(
		'post_type'=> array('veranstaltungen', 'nachrichten','projekte', 'angebote', 'fragen'), 
		'post_status'=>'publish', 
		'posts_per_page'=> 12,
		'orderby' => 'modified'
	);
	?>
	 <section class="grid" data-grid>
	 	<?php card_list($args4);?>
      </section>
	</div>



	<script src="https://unpkg.com/bricks.js/dist/bricks.js"></script>
    <!-- <script src="bundle.js"></script> -->

    <script>
const sizes = [
  { columns: 2, gutter: 10 },                   // assumed to be mobile, because of the missing mq property
  { mq: '768px', columns: 3, gutter: 25 },
  { mq: '1024px', columns: 4, gutter: 50 }
]

// create an instance

const instance = Bricks({
  container: '.grid',
  packed:    'data-packed',        // if not prefixed with 'data-', it will be added
  sizes:     sizes
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
















<script src="https://unpkg.com/magic-grid/dist/magic-grid.cjs.js"></script>


	<?php 
		$args4 = array(
		'post_type'=> array('veranstaltungen', 'nachrichten','projekte', 'angebote', 'fragen'), 
		'post_status'=>'publish', 
		'posts_per_page'=> 12,
		'orderby' => 'modified'
	);
	?>
	
	<div class="masonry">
		<?php card_list($args4);?>
		<!-- <div class="card" style="background: red"> test </div>
		<div class="card" style="background: red"> test </div>
		<div class="card" style="background: red"> test </div>
		<div class="card" style="background: red"> test </div>
		<div class="card" style="background: red"> test </div>
		<div class="card" style="background: red"> test </div>
		<div class="card" style="background: red"> test </div>
		<div class="card" style="background: red"> test </div>
		<div class="card" style="background: red"> test </div>
		<div class="card" style="background: red"> test </div>
		<div class="card" style="background: red"> test </div>
		<div class="card" style="background: red"> test </div> -->

	</div>

<script>
	let magicGrid = new MagicGrid({
	container: ".masonry", // Required. Can be a class, id, or an HTMLElement.
	static: true, // Required for static content. Default: false.
	items: 12, // Required for dynamic content. Initial number of items in the container.
	gutter: 50, // Optional. Space between items. Default: 25(px).
	maxColumns: 2, // Optional. Maximum number of columns. Default: Infinite.
	useMin: false, // Optional. Prioritize shorter columns when positioning items? Default: false.
	useTransform: true, // Optional. Position items using CSS transform? Default: True.
	animate: true, // Optional. Animate item positioning? Default: false.
	center: false, //Optional. Center the grid items? Default: true. 
	});
	
	magicGrid.listen();
</script>





<?php
}
// ---------------------------------- Logged out ----------------------------------
else {
?>




<?php 
	// veranstaltung list
	$args4 = array(
		'post_type'=> array('veranstaltungen', 'nachrichten','projekte', 'angebote', 'fragen'), 
		'post_status'=>'publish', 
		'posts_per_page'=> 12,
		'orderby' => 'modified'
	);
	?>
	
	<div class="masonry">
		<?php card_list($args4);
	?>


</div>

<script>
	let magicGrid = new MagicGrid({
	container: ".masonry", // Required. Can be a class, id, or an HTMLElement.
	static: false, // Required for static content. Default: false.
	items: 12, // Required for dynamic content. Initial number of items in the container.
	gutter: 30, // Optional. Space between items. Default: 25(px).
	maxColumns: 5, // Optional. Maximum number of columns. Default: Infinite.
	useMin: true, // Optional. Prioritize shorter columns when positioning items? Default: false.
	useTransform: true, // Optional. Position items using CSS transform? Default: True.
	animate: true, // Optional. Animate item positioning? Default: false.
	center: true, //Optional. Center the grid items? Default: true. 
	});
	
	magicGrid.listen();
</script>

    <?php
		// Neuste Meldungen
		$args2 = array(
			'post_type'=> array('veranstaltungen', 'nachrichten', 'projekte'), 
			'post_status'=>'publish', 
			'posts_per_page'=> 6,
			'order' => 'DESC',
		);

		slider($args2,'card', '1','false'); 
		?>

    <?php
		// Angebote und Fragen
		$args4 = array(
			'post_type'=> array('angebote', 'fragen'), 
			'post_status'=>'publish', 
			'posts_per_page'=> 4,
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

		slider($args4,'card', '1','false'); 
		?>

    <div class="card-container ">

    	<?php 
			// landscape_card(null, 'Entdecke das Quartier','Alles über den Arrenberg',get_template_directory_uri().'/assets/images/Entdecke-den-Arrenberg-Wupptertal_900x450.jpg', '/das-quartier'); 

			// link_card('Aquaponik am Arrenberg','', get_site_url().'/wp-content/uploads/2020/05/CTL_Titelbild-1.jpg', '/projekte/arrenberg-farm'); 
		?>
       
	    <?php 
			// Geschichten
			$args_gesschichten = array(
				'post_type'   => 'geschichten',
				'post_status' => 'publish',
				'orderby' => 'rand',
				'posts_per_page'=> '1'
			);
			// landscape_card($args_gesschichten, 'Geschichten & Menschen','', '', '/geschichten'); 
			// get_template_part( 'components/call', 'umfrage' ); 
		?>

    </div>

	<div class="card-container ">


	<?php
		// Gutenberg Editor Content
		if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
			the_excerpt();
		} else {
			the_content( __( 'Continue reading', 'twentytwenty' ) );
		}
	?>
</div>
	

    <!-- *urbane transformation* -->
    <!-- not ready yet -->

    <?php
		// featured projects (square_card + carousel query + function)
		$args3 = array(
			'post_type'=>'projekte', 
			'post_status'=>'publish', 
			'posts_per_page'=> 4,
			'orderby' => 'rand'
		);
		slider($args3,'square_card', '2','true'); 
	?>

    <!-- *zahlen und fakten* -->
    <!-- not ready yet -->

    <div class="list-cards">

        <?php
			// projekt updates (list_card query function)
			$args2 = array(
				'post_type'=>'nachrichten', 
				'post_status'=>'publish', 
				'posts_per_page'=> 3
			);
			list_card($args2, get_post_type_archive_link( 'nachrichten' ),'Neuigkeiten aus deinem Quartier','Updates aus spannenden Projekten');
			
			// veranstaltungen
			$args3 = array(
				'post_type'=>'veranstaltungen', 
				'post_status'=>'publish', 
				'posts_per_page'=> 3,
				'meta_key' => 'event_date',
				'orderby' => 'rand',
				'order' => 'ASC',
				'offset' => '0', 
				'meta_query' => array(
					array(
						'key' => 'event_date', 
						'value' => date("Y-m-d"),
						'compare' => '>=', 
						'type' => 'DATE'
					)
				)
			);
			list_card($args3, get_site_url().'/veranstaltungen', 'Veranstaltungen am Arrenberg','Hier gehts zur Veranstaltungsübersicht');
			?>

    </div>

    <!-- zur karte (call map) -->
    <!-- not ready yet -->

    <?php 
		// geschichten link card
		// link_card('Menschen und Geschichten am Arrenberg','','/assets/images/400x200.png', '/veranstaltungen'); 

		// energie ampel
		// get_template_part('components/energie_ampel');

		// Aufbruch am Arrenberg link card
		// landscape_card(null,'Über den Verein und Initiator','Aufbruch am Arrenberg', get_template_directory_uri().'/assets/images/Aufbruch-am-Arrenberg_900x450.jpg', '/aufbruch-am-arrenberg');
		
	?>

    <!-- add website to homescreen -->
    <!-- not ready yet -->

    <?php 
		// arrenberg farm wetter station
		// get_template_part('components/wetter'); 
	?>

	<?php 
		// feedback
		get_template_part('components/feedback'); 
	?>


<?php } ?>

</main><!-- #site-content -->

<div class="right-sidebar">
		<?php 
			// Smart cards 
			// Angebote und fragen
			get_template_part('components/smart-card/angebote-fragen');
			// Projekte
			get_template_part('components/smart-card/projekte');
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