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


    <div class="my-slider">
        <?php get_template_part('elements/square_card'); ?>
        <?php get_template_part('elements/square_card'); ?>
        <?php get_template_part('elements/square_card'); ?>
        <?php get_template_part('elements/square_card'); ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

    <script>
  var slider = tns({
    container: '.my-slider',
    items: 2,
    gutter: 0,
    controls: false,
    nav: false,
    mouseDrag: true,
    preventScrollOnTouch: true,
    responsive: {
      0: {
        items: 2
      },
      782: {
        items: 4
      }
    }
  });
</script>


   


    <div class="card list shadow">
        <?php get_template_part('elements/list_card'); ?>
        <?php get_template_part('elements/list_card'); ?>
        <?php get_template_part('elements/list_card'); ?>
    </div>





    <?php 
		$kind =  "nachricht";
		// get_template_part('elements/card', $kind); 
	?>

    <?php  get_template_part('elements/card', 'veranstaltung'); ?>

    <?php  get_template_part('components/energieampel'); ?>

    <?php // get_template_part('components/call', 'register'); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>