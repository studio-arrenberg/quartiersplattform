<?php
/**
 * Template Name: Landingpage Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

    <header class="entry-header has-text-align-center header-footer-group">
        <div class="entry-header-inner section-inner medium">
            <h1 class="entry-title">Landingpage Template</h1>
        </div>
    </header>


    <?php // get_template_part('elements/landscape_card'); ?>





    <div class="embla" id="embla-square">
        <div class="embla__container">
            <div class="embrela-slide">
                <?php get_template_part('elements/square_card'); ?>
            </div>
            <div class="embrela-slide">
                <?php get_template_part('elements/square_card'); ?>
            </div>
            <div class="embrela-slide">
                <?php get_template_part('elements/square_card'); ?>
            </div>
            <div class="embrela-slide">
                <?php get_template_part('elements/square_card'); ?>
            </div>
            <div class="embrela-slide">
                <?php get_template_part('elements/square_card'); ?>
            </div>
        </div>
    </div>






    <div class="card list shadow">
        <?php get_template_part('elements/list_card'); ?>
        <?php get_template_part('elements/list_card'); ?>
        <?php get_template_part('elements/list_card'); ?>
    </div>


    <?php // get_template_part('elements/landscape_card'); ?>

    <?php  link_card('Hallo Welt','Text....','/assets/images/400x200.png', '/veranstaltungen'); ?>

    <?php 
		$kind =  "nachricht";
		// get_template_part('elements/card', $kind); 
	?>

    <?php  // get_template_part('elements/card', 'veranstaltung'); ?>

    <?php  // get_template_part('components/energieampel'); ?>

    <?php // get_template_part('components/call', 'register'); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>