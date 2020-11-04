<?php
/**
 * Template Name: Veranstaltungen
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">


    <?php
	// featured veranstaltungen
	$args3 = array(
		'post_type'=>'veranstaltungen', 
		'post_status'=>'publish', 
		'posts_per_page'=> 4,
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

	slider($args3,'square_card', '2','true'); 
	?>

	<div class="card-container">

    <?php 
	// veranstaltung list
	$args4 = array(
		'post_type'=>'veranstaltungen', 
		'post_status'=>'publish', 
		'posts_per_page'=> 10, 
		'meta_key' => 'zeitpunkt',
		'orderby' => 'meta_value',
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
	card_list($args4);
	?>

	<!-- veranstaltung erstellen -->
	<!-- not ready yet -->
	<!-- <h3>Veranstaltung Erstellen</h3> -->

	<!-- mehr veranstaltungen (offset) -->
	<?php 
	// veranstaltung list
	$args5 = array(
		'post_type'=>'veranstaltungen', 
		'post_status'=>'publish', 
		'posts_per_page'=> 10, 
		'meta_key' => 'zeitpunkt',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'offset' => '10', 
		'meta_query' => array(
			array(
				'key' => 'zeitpunkt', 
				'value' => date("Y-m-d"),
				'compare' => '>=', 
				'type' => 'DATE'
			)
		)
	);
	card_list($args5);
	?>
	<div>

	<!-- archive veranstltungen -->
	<a class="button" href="<?php echo get_post_type_archive_link( 'veranstaltungen' ); ?>">Archiv</a>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>