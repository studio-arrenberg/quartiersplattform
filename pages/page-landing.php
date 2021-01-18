<?php
/**
 * Template Name: Landing Page
 * Template Post Type: page
 */
acf_form_head(); // before wp header !important!
get_header();
?>

<main id="site-content" role="main" data-track-content>
	
	<?php 
	// ---------------------------------- Logged in ----------------------------------
	if (is_user_logged_in()) {
	?>

		<?php
		// neuste meldung (card + carousel query + function)
		$args2 = array(
			'post_type'=> array('veranstaltungen', 'nachrichten', 'projekte'), 
			'post_status'=> 'publish', 
			'posts_per_page'=> 4,
			'order' => 'DESC',
		);

		slider($args2,'card', '1','false'); 
		?>

		<?php
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



		<div class="list-cards"> <!-- Eventuell auch als Slider -->
			<!-- projekt updates (list_card query function) -->
			<?php
			
			$args2 = array(
				'post_type'=>'nachrichten', 
				'post_status'=>'publish', 
				'posts_per_page'=> 3
			);
			list_card($args2, get_post_type_archive_link( 'nachrichten' ),'Neuigkeiten aus deinem Quatier','Updates aus spannenden Projekten');
			?>

			<!-- veranstaltungen -->
			<?php
				$args3 = array(
					'post_type'=>'veranstaltungen', 
					'post_status'=>'publish', 
					'posts_per_page'=> 3,
					'meta_key' => 'zeitpunkt',
					// 'orderby' => 'rand',
					'order' => 'ASC',
					'offset' => '0', 
					'meta_query' => array(
						array(
							'key' => 'zeitpunkt', 
							'value' => date("Y-m-d"),
							'compare' => '>=', 
							'type' => 'DATE'
						)
					)
				);
			list_card($args3, get_site_url().'/veranstaltungen', 'Veranstaltungen am Arrenberg','Hier gehts zur Veranstaltungsübersicht');
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
			landscape_card($args_gesschichten, 'Geschichten & Menschen','', '', '/geschichten'); 
			?>
			<?php get_template_part( 'components/call', 'umfrage' ); ?>
		</div>

		<!-- featured projects (square_card + carousel query + function) -->
		<?php
		$args3 = array(
			'post_type'=>'projekte', 
			'post_status'=>'publish', 
			'posts_per_page'=> 4,
			'orderby' => 'rand'
		);
		slider($args3,'square_card', '2','true'); 
		?>

		<!-- energie ampel -->
		<?php // get_template_part('components/energie_ampel'); ?>

		<!-- Aufbruch am Arrenberg link card -->
		<?php landscape_card(null,'Über den Verein und Initiator Aufbruch am Arrenberg','', get_template_directory_uri().'/assets/images/Aufbruch-am-Arrenberg_900x450.jpg', '/aufbruch-am-arrenberg'); ?>

		<!-- add website to homescreen -->
		<!-- not ready yet -->

		<!-- arrenberg farm wetter station -->
		<?php get_template_part('components/wetter'); ?>

		<!-- feedback (acf) -->
		<?php get_template_part('components/feedback'); ?>
	<?php
	}
	// ---------------------------------- Logged out ----------------------------------
	else {
	?>

		<!-- neuste meldung (card + carousel query + function) -->
		<?php
		$args2 = array(
			'post_type'=> array('veranstaltungen', 'nachrichten', 'projekte'), 
			'post_status'=>'publish', 
			'posts_per_page'=> 6,
			'order' => 'DESC',
		);

		slider($args2,'card', '1','false'); 
		?>
		<!-- link card -->
		<?php landscape_card(null, 'Entdecke das Quartier','Alles über den Arrenberrg',get_template_directory_uri().'/assets/images/Entdecke-den-Arrenberg-Wupptertal_900x450.jpg', '/das-quartier'); ?>
		
		<!-- call to register -->
		<div class="card-container ">
			<?php get_template_part( 'components/call', 'gemeinsam' ); ?>
			<?php // get_template_part( 'components/call', 'update' ); ?>
			<!-- arrenberg farm link card -->
			<?php // link_card('Aquaponik am Arrenberg','', get_site_url().'/wp-content/uploads/2020/05/CTL_Titelbild-1.jpg', '/projekte/arrenberg-farm'); ?>
			<?php 
			$args_gesschichten = array(
				'post_type'   => 'geschichten',
				'post_status' => 'publish',
				'orderby' => 'rand',
				'posts_per_page'=> '1'
			);
			landscape_card($args_gesschichten, 'Geschichten & Menschen','', '', '/geschichten'); 
			?>
			<?php // get_template_part( 'components/call', 'umfrage' ); ?>
		</div>

		<!-- *urbane transformation* -->
		<!-- not ready yet -->

		<!-- featured projects (square_card + carousel query + function) -->
		<?php
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

		<div class="list-cards"> <!-- Eventuell auch als Slider -->
			<!-- projekt updates (list_card query function) -->
			<?php
			
			$args2 = array(
				'post_type'=>'nachrichten', 
				'post_status'=>'publish', 
				'posts_per_page'=> 3
			);
			list_card($args2, get_post_type_archive_link( 'nachrichten' ),'Neuigkeiten aus deinem Quatier','Updates aus spannenden Projekten');
			?>

			<!-- veranstaltungen -->
			<?php
				$args3 = array(
					'post_type'=>'veranstaltungen', 
					'post_status'=>'publish', 
					'posts_per_page'=> 3,
					'meta_key' => 'zeitpunkt',
					'orderby' => 'rand',
					'order' => 'ASC',
					'offset' => '0', 
					'meta_query' => array(
						array(
							'key' => 'zeitpunkt', 
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

		<!-- geschichten link card -->
		<?php // link_card('Menschen und Geschichten am Arrenberg','','/assets/images/400x200.png', '/veranstaltungen'); ?>
		
		<!-- energie ampel -->
		<?php // get_template_part('components/energie_ampel'); ?>

		<!-- Aufbruch am Arrenberg link card -->
		<?php landscape_card(null, 'Über den Verein und Initiator Aufbruch am Arrenberg','', get_template_directory_uri().'/assets/images/Aufbruch-am-Arrenberg_900x450.jpg', '/aufbruch-am-arrenberg'); ?>

		<!-- add website to homescreen -->
		<!-- not ready yet -->

		<!-- arrenberg farm wetter station -->
		<?php get_template_part('components/wetter'); ?>

		<!-- feedback (acf) -->
		<?php get_template_part('components/feedback'); ?>

	<?php } ?>

</main><!-- #site-content -->

<?php get_footer(); ?>