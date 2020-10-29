<?php
/**
 * Template Name: Landing Page
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

    <!-- neuste meldung (list_card + carousel query + function) -->
    <?php
	$args = array(
		'post_type'=>'veranstaltungen', 
		'post_status'=>'publish', 
		'posts_per_page'=> 1
	);
	featured_card($args);
	?>
    <!-- link card -->
    <?php link_card('Entdecke das Quartier','Alles über den Arrenberrg','/assets/images/400x200.png', '/das-quartier'); ?>

    <!-- call to register -->
    <?php get_template_part( 'components/call', 'register' ); ?>

    <!-- *urbane transformation* -->
    <!-- not ready yet -->

    <!-- featured projects (square_card + carousel query + function) -->

    <!-- *zahlen und fakten* -->
    <!-- not ready yet -->

    <!-- projekt updates (list_card query function) -->
    <?php
	$args2 = array(
		'post_type'=>'veranstaltungen', 
		'post_status'=>'publish', 
		'posts_per_page'=> 3
	);
	card_list($args2);
	?>

    <!-- zur karte (call map) -->
    <!-- not ready yet -->

    <!-- geschichten link card -->
    <?php // link_card('Menschen und Geschichtne am Arrenberg','','/assets/images/400x200.png', '/veranstaltungen'); ?>

    <!-- energie ampel -->
    <?php get_template_part('components/energieampel'); ?>

    <!-- Aufbruch am Arrenberg link card -->
    <?php link_card('Über den Verein und Initiator Aufbruch am Arrenberg','','/assets/images/400x200.png', '/aufbruch-am-arrenberg'); ?>

    <!-- add website to homescreen -->
    <!-- not ready yet -->

    <!-- feedback (acf?) -->
    <!-- not ready yet -->

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>