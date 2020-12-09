<?php
/**
 * Template Name: Gemeinsam
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

<div class="card-container card-container__small">
		<?php get_template_part( 'components/call', 'frage' ); ?>
		<?php get_template_part( 'components/call', 'angebot' ); ?>
	</div>



<div class="card-container">
	<?php 
	// veranstaltung list
	$args4 = array(
		'post_type'=> array('angebote', 'fragen'), 
		'post_status'=>'publish', 
        'posts_per_page'=> -1
        // reihenfolge...?
	);
	card_list($args4);
	?>
</div>
</main><!-- #site-content -->

<?php get_footer(); ?>



