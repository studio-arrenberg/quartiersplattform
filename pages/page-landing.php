<?php

/**
 * 
 * Template Name: Landing Page
 * Template Post Type: page
 * 
 */


# redirect before acf_form_head
wp_maintenance_mode();

acf_form_head(); // before wp header !important!
get_header();

?>

<main id="site-content" role="main" data-track-content>

    <?php 
	// ---------------------------------- Logged in ----------------------------------
	if (is_user_logged_in()) {
	?>

    <?php
		// Neuste Meldungen
		$args2 = array(
			'post_type'=> array('veranstaltungen', 'nachrichten'), 
			'post_status'=> 'publish', 
			'posts_per_page'=> 6,
			'order' => 'DESC',
		);

		slider($args2, 'card', '1', 'false', 'start');
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




	<div class="list-cards">

		<?php
			// projekt updates (list_card query function)
			$args2 = array(
				'post_type'=>'nachrichten', 
				'post_status'=>'publish', 
				'posts_per_page'=> 3
			);

			list_card($args2, get_post_type_archive_link( 'nachrichten' ),'Neuigkeiten aus deinem Quartier','Updates aus spannenden Projekten');
		?>

		<?php
			// veranstaltungen
			$args3 = array(
				'post_type'=>'veranstaltungen', 
				'post_staus'=>'publish', 
				'posts_per_page'=> 3,
				'meta_key' => 'event_date',
				// 'orderby' => 'rand',
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
			list_card($args3, get_site_url().'/veranstaltungen', 'Veranstaltungen in deinem Quartier','Hier gehts zur Veranstaltungsübersicht');
			?>

	</div>

	<div class="card-container ">

		<?php 
			// Smart cards 
			// Angebote und fragen
			get_template_part('components/smart-card/angebote-fragen');
			// Projekte
			get_template_part('components/smart-card/projekte');
		?>

	</div>


    <!-- call to register -->
    <div class="card-container ">
        <!-- arrenberg farm link card -->
        <?php // link_card('Aquaponik am Arrenberg','', get_site_url().'/wp-content/uploads/2020/05/CTL_Titelbild-1.jpg', '/projekte/arrenberg-farm'); ?>
        <?php 
			$args_gesschichten = array(
				'post_type'   => 'geschichten',
				'post_status' => 'publish',
				'orderby' => 'rand',
				'posts_per_page'=> '1'
			);
			// landscape_card($args_gesschichten, 'Geschichten & Menschen','', '', '/geschichten'); 
			
			// landscape_card(null, 'Entdecke das Quartier','Alles über den Arrenberg',get_template_directory_uri().'/assets/images/Entdecke-den-Arrenberg-Wupptertal_900x450.jpg', '/das-quartier'); 
		?>
    </div>


    <?php
		// featured projects (square_card + carousel query + function)
		$args3 = array(
			'post_type'=>'projekte', 
			'post_status'=>'publish', 
			'posts_per_page'=> 4,
			'orderby' => 'rand'
		);
		slider($args3,'card', '2','true'); 
		?>

    <?php 
		// Aufbruch am Arrenberg link card
		// landscape_card(null,'Über den Verein und Initiator','Aufbruch am Arrenberg', get_template_directory_uri().'/assets/images/Aufbruch-am-Arrenberg_900x450.jpg', '/aufbruch-am-arrenberg'); 
	?>

    <!-- add website to homescreen -->
    <!-- not ready yet -->


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

    <?php 
		// feedback
		get_template_part('components/feedback'); 
	?>

<?php
}
// ---------------------------------- Logged out ----------------------------------
else {
?>

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
			<div class="emojis-top">🍾🍰
            <div class="card-header">
            <h2>Wir laufen jetzt unter <span class="highlight">CSS GRID</span></h2>
			<p>Es gibt eine Sitebar die beliebig erweitert werden kann</p>
            </div>

           
        </div>
	</div>

<?php get_footer(); ?>