<?php

/**
 * 
 * Template Name: Projekt Feed
 * Template Post Type: page
 * 
 */


// redirect before acf_form_head
wp_maintenance_mode();

// acf_form_head(); // before wp header !important!
get_header();

?>


<main id="site-content" class="page-grid" role="main">

	<div class="left-sidebar">

		<button class="button" onclick="add_project();">Projekt anlegen</button>
		<div class="add_project"></div>


		<div class="hidden-small">

			<?php 
				$args4 = array(
					'post_type'=> array('projekte'), 
					'post_status'=>'publish', 
					'posts_per_page'=> 20,
					'orderby' => 'date'
				);
			?>  

			<?php // card_list($args4); ?>
		</div>

		<?php projekt_carousel(); ?>

	</div>


	<div class="main-content">




	<?php
		$text = __('Hier findest du alle Nachrichten, Umfragen und Veranstaltungen in deinem Quartier. Lerne die Menschen in deiner Nachbarschaft und ihre Projekte kennen oder erstelle selbst ein eigenes Projekt!', "quartiersplattform");
		reminder_card('helloss', 'Neuigkeiten und Projektupdates', $text );
		// 'Impressum', home_url( ).'/impressum'
	?>


	<?php // projekt_carousel(); ?>

	<a href="<?php echo home_url() ?>/projekt-erstellen/" class="button">Projekt anlegen</a>


	<?php 
		$args4 = array(
			'post_type'=> array('veranstaltungen', 'nachrichten', 'projekte', 'umfragen'), 
			'post_status'=>'publish', 
			'posts_per_page'=> 20,
			'orderby' => 'date'
		);
	?>  
	
	<div class="newsfeed" data-grid>
		<?php set_query_var( 'additional_info', true ); ?>
		<?php card_list($args4); ?>
		<?php set_query_var( 'additional_info', false ); ?>
    </div>

	<div class="newsfeed_loadmore">
		<a onclick="more()" class="button">Gib mir mehr</a>
		<span class="acf-spinner" style="display: inline-block;"></span>
	</div>

	<a onclick="more()" class="button">Gib mir mehr</a>
		<span class="acf-spinner" style="display: inline-block;"></span>
	
	<script>

		var offset = 0;
		var posts_per_page = 2;

		function more() {
			// alert('hello there');

			$('div.newsfeed_loadmore span.acf-spinner').addClass('is-active');

			var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    
			var data = {
				'action': 'projekt_feed',
				'offset': offset,
				'posts': posts_per_page,
				'request': 1,
				_ajax_nonce: '<?php echo wp_create_nonce( 'my_ajax_nonce' ); ?>'
			};

			$.ajax({
				url: ajax_url,
				type: 'post',
				data: data,
				dataType: 'html',
				success: function(response){
					offset = offset + posts_per_page;
					$('div.newsfeed').append(response);
					$('div.newsfeed_loadmore span.acf-spinner').removeClass('is-active');
				},
				error: function (data) {
					// alert("error");
				}
			});
		}
		
	</script>
	</div>

<div class="right-sidebar">
	<?php 
		// Projekte
		// if ( is_user_logged_in( ) ) {

		// 	get_template_part('components/smart-card/projekte');
			
		// 	// Call to Action Card 
		// 	call_to_action_card('bg_green', 'projekt-erstellen', 'Erstelle ein Projekt', 'Lege ein Projekt an, profitiere von der Community und verändere dein Quartier!' );
	
		// }
		// else {
		// 	$text = 'Registriere dich auf deiner <span class="highlight"> Quartiersplattform</span> und schöpfe dein volles Potenzial aus!<br>';
		// 	reminder_card('register', 'Werde Mitglied in deinem Quartier', $text, 'Jetzt Registieren', home_url( ).'/register' );
		// }

		get_template_part('components/views/veranstaltungen');
	?>	
</div>

<?php get_footer(); ?>