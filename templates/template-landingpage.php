<?php
/**
 * Template Name: Landingpage Template [old]
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




    <div class="embla" id="embla-one">
        <div class="embla__container">
            <div class="embrela-slide">
                <?php get_template_part('elements/card-veranstaltung'); ?>
            </div>
            <div class="embrela-slide">
                <?php get_template_part('elements/card-veranstaltung'); ?>
            </div><div class="embrela-slide">
                <?php get_template_part('elements/card-veranstaltung'); ?>
            </div>
            <div class="embrela-slide">
                <?php get_template_part('elements/card-veranstaltung'); ?>
            </div>
        </div>
    </div>

    <script>
var emblaNode = document.getElementById('embla-one')

var options = {
    dragFree: false,
    slidesToScroll: 1, // viewport > 768px 2
}

var embla = EmblaCarousel(emblaNode, options)
/*embla.on('resize', () => {

  - Check current breakpoint
  - Determine how many slides to scroll for this breakpoint
  - Store it in a variable called slidesToScroll
  - Update Embla options
  */
/*embla.changeOptions({ slidesToScroll }); }) */

</script>




    <div class="embla" id="embla-two">
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





 

<script>


var emblaNode = document.getElementById('embla-two')

var options = {
    dragFree: true,
    slidesToScroll: 2, // viewport > 768px 4
}

var embla = EmblaCarousel(emblaNode, options)
/*embla.on('resize', () => {

  - Check current breakpoint
  - Determine how many slides to scroll for this breakpoint
  - Store it in a variable called slidesToScroll
  - Update Embla options
  */
/*embla.changeOptions({ slidesToScroll }); }) */


</script>

    <div class="card list shadow">
        <?php get_template_part('elements/list_card'); ?>
        <?php get_template_part('elements/list_card'); ?>
        <?php get_template_part('elements/list_card'); ?>
    </div>

    <?php // get_template_part('elements/landscape_card'); ?>

    <?php link_card('Hallo Welt','Text....','/assets/images/400x200.png', '/veranstaltungen'); ?>

    <?php  // get_template_part('elements/card', 'veranstaltung'); ?>

    <?php get_template_part('components/energieampel'); ?>

    <?php // get_template_part('components/call', 'register'); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>