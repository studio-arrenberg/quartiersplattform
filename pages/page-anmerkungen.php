<?php

/**
 * 
 * Template Name: Anmerkungen
 * Template Post Type: page
 * 
 */
acf_form_head();
get_header();

?>

<main id="site-content" class="page-grid" role="main">


	<div class="left-sidebar">

        <?php projekt_carousel(); ?>

	</div>

	<div class="main-content">

		<?php 
			$text = __('Teile uns dein Feedback oder Anregungen zur Quartiersplattform. Funktionert etwas nicht oder hast du eine Idee zur weiterentwicklung.','quartiersplattform');
			reminder_card('', __('Feedback zur Quartiersplattform','quartiersplattform'), $text );
		?>

        <br>
        <?php 
        acf_form(
            array(
                'id' => 'feedback-form',
                'html_before_fields' => '',
                'html_after_fields' => '',
                'label_placement'=> '',
                'post_id'=>'new_post',
                'new_post'=>array(
                    'post_type' => 'anmerkungen',
                    'post_status' => 'publish',
                ),
                'honeypot' => true,
                'field_el' => 'div',
                'post_content' => false,
                'post_title' => false,
                'return' => get_site_url().'/feedback',
                'field_groups' => array('group_5fb50c8393d52'),
                'submit_value'=> __('Feedback senden', 'quartiersplattform'),
            )
        ); 
        ?>

        <br>

		<?php

		$args4 = array(
			'post_type'=> array('anmerkungen'), 
			'post_status'=> 'publish', 
			'posts_per_page'=> -1,
			'orderby' => 'date',
            'order' => 'DESC'
		);

		if (count_query($args4)) {

			?>
                <div>
                    <br>
                    <?php card_list($args4);?>
                </div>
			<?php 

		}
		else {

			$text = __("",'quartiersplattform');
    		no_content_card("doc-richtext", __("Feedback zur Quartiersplattform",'quartiersplattform'), $text);

		}

		?>  
		
		
	
	</div>

	<div class="right-sidebar">
		<?php 
			
			get_template_part('components/views/veranstaltungen');

			if (!is_user_logged_in(  )) {
				$text = __('Registriere dich auf deiner Quartiersplattform, um eigene Projekte, Umfragen und Veranstaltungen zu erstellen.','quartiersplattform');
				reminder_card('register', __('Mitglied werden im Quartier','quartiersplattform'), $text, __('Jetzt Registieren','quartiersplattform'), home_url( ).'/register' );
			}
			
		?>	
	</div>

</main><!-- #site-content -->

<!-- </div> -->

<?php get_footer(); ?>