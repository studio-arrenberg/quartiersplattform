<?php

/**
 * 
 * Template Name: Aktuelles
 * Template Post Type: page
 * 
 */


// redirect before acf_form_head
wp_maintenance_mode();

// acf_form_head(); // before wp header !important!
get_header();

?>


<main id="site-content" role="main" data-track-content>

	<?php
		$text = 'Lorem <strong>ipsum</strong> dolor sit amet consectetur adipisicing elit. Sunt sed veritatis et quibusdam molestiae repellendus fugiat in dolorum. Tempore illo eum itaque voluptate, nulla exercitationem laborum placeat eius odio possimus?';
		reminder_card('helloss', 'Neuigkeiten und Projektupdates', $text );
		// 'Impressum', home_url( ).'/impressum'
	?>


	<?php
		if ( current_user_can('administrator') ) {
			get_search_form(
				array(
					'label' => __( '404 not found', 'twentytwenty' ),
				)
			);
		}
		?>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

    <?php 
	// ---------------------------------- Logged in ----------------------------------
	// if (is_user_logged_in()) {
	?>

	<?php 

		

		// get last login from cookie 'feed_timestamp'
		if (isset($_COOKIE['feed_timestamp'])) $feed_timestamp = $_COOKIE['feed_timestamp'];
		// set cookie to new timestamo
		$path = parse_url(get_option('siteurl'), PHP_URL_PATH);
		$host = parse_url(get_option('siteurl'), PHP_URL_HOST);
		$expiry = strtotime('+1 year');
		$timespamp = time();
		// $timespamp = time() - 80000 * 10;
		setcookie('feed_timestamp', $timespamp, $expiry, $path, $host);
		// query num missed posts from db (veranstaltung issue (different date))
		if (isset($_COOKIE['feed_timestamp'])) {
			$args = array(
				'post_type'=> array('veranstaltungen', 'nachrichten', 'projekte', 'angebote', 'fragen'), 
				'post_status'=>'publish', 
				'posts_per_page'=> $num_missed_posts,
				'orderby' => 'date',
				'date_query' => array(
					array(
						// 'after'     => 'January 1st, 2015',
						'after'		=> date('Y-m-d', $_COOKIE['feed_timestamp']),
						// 'before'    => 'December 31st, 2015',
						// 'inclusive' => true,
					),
				),
			);
	
			$thePosts = query_posts($args);
			global $wp_query; 
			$num_missed_posts = $wp_query->found_posts;
			// $my_query = new WP_Query($args4);
            // if ($my_query->post_count > 0) {
			// echo $num_missed_posts;
		}
		// echo "missed posts: ".$num_missed_posts;
		// defne 'posts_per_page'
		if (isset($_COOKIE['feed_timestamp'])) $num_missed_posts = 30;
		else if ($num_missed_posts > 30) $num_missed_posts = 30;
		else if ($num_missed_posts < 5) $num_missed_posts = 5;
		// query
		$args = array(
			'post_type'=> array('veranstaltungen', 'nachrichten', 'projekte', 'angebote', 'fragen'), 
			'post_status'=>'publish', 
			'posts_per_page'=> $num_missed_posts,
			'orderby' => 'modified' // ..?
		);

		// grid

		// *up to date*

	?>


	<?php 
		$args4 = array(
		'post_type'=> array('veranstaltungen', 'nachrichten', 'projekte', 'angebote', 'fragen', 'umfragen'), 
		'post_status'=>'publish', 
		'posts_per_page'=> 12,
		'orderby' => 'modified'
	);
	?>  
	
	<div class="grid" data-grid>
		<?php set_query_var( 'additional_info', true )?>
		<?php card_list($args4);?>
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
	<?php 
		// Projekte
		if (is_user_logged_in(  )) {
			get_template_part('components/smart-card/projekte');
		}
		else {
			$text = 'Lorem <strong>ipsum</strong> dolor sit amet consectetur adipisicing elit. Sunt sed veritatis et quibusdam molestiae repellendus fugiat in dolorum. Tempore illo eum itaque voluptate, nulla exercitationem laborum placeat eius odio possimus?';
			reminder_card('register', 'registiere dich', $text, 'Registieren', home_url( ).'/register' );
		// 'Impressum', home_url( ).'/impressum'
		}
	?>	
</div>

<?php get_footer(); ?>