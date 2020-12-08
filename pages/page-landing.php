<?php
/**
 * Template Name: Landing Page
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
acf_form_head(); // before wp header !important!
get_header();
?>

<main id="site-content" role="main">
	

    <!-- neuste meldung (card + carousel query + function) -->
    <?php
	$args2 = array(
		'post_type'=>'veranstaltungen', 
		'post_status'=>'publish', 
		'posts_per_page'=> 4, 
		'meta_key' => 'zeitpunkt',
		//'orderby' => 'meta_value',
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

	slider($args2,'card', '1','false'); 
	?>
    <!-- link card -->
    <?php link_card('Entdecke das Quartier','Alles über den Arrenberrg',get_template_directory_uri().'/assets/images/Entdecke-den-Arrenberg-Wupptertal_900x450.jpg', '/das-quartier'); ?>

    <!-- call to register -->
	
	<div class="card-container card-container__center">
		<?php get_template_part( 'components/call', 'update' ); ?>
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
			'posts_per_page'=> 3
		);
		list_card($args3, get_site_url().'/veranstaltungen', 'Veranstaltungen am Arrenberg','Hier gehts zur Veranstaltungsübersicht');
		?>

	</div>
    <!-- zur karte (call map) -->
    <!-- not ready yet -->

    <!-- geschichten link card -->
	<?php // link_card('Menschen und Geschichten am Arrenberg','','/assets/images/400x200.png', '/veranstaltungen'); ?>
	
	<!-- arrenberg farm link card -->
    <?php ink_card('Aquaponik am Arrenberg','', get_site_url().'/wp-content/uploads/2020/05/CTL_Titelbild-1.jpg', '/projekte/arrenberg-farm'); ?>

    <!-- energie ampel -->
    <?php get_template_part('components/energie_ampel'); ?>

    <!-- Aufbruch am Arrenberg link card -->
    <?php link_card('Über den Verein und Initiator Aufbruch am Arrenberg','', get_template_directory_uri().'/assets/images/Aufbruch-am-Arrenberg_900x450.jpg', '/aufbruch-am-arrenberg'); ?>

    <!-- add website to homescreen -->
    <!-- not ready yet -->

    <!-- feedback (acf) -->
	<?php get_template_part('components/feedback'); ?>

</main><!-- #site-content -->

<?php get_footer(); ?>