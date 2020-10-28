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


    <?php get_template_part('elements/landscape_card'); ?>

    <div class="card shadow">
        <div class="content">
            <div class="pre-title">Pre-Title <span class="date">vor 30 Minuten<span></div>
            <h3 class="card-title">
                Card Title
            </h3>
            <p class="preview-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt="" />
    </div>



    <div class="owl-carousel owl-theme">
        <div class="card square shadow">
            <div class="content">
                <h3 class="card-title">
                    Square Card Title
                </h3>
                <p class="preview-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt="" />
        </div>

        <div class="card square shadow">
            <div class="content">
                <h3 class="card-title">
                    Square Card Title
                </h3>
                <p class="preview-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt="" />
        </div>

        <div class="card square shadow">
            <div class="content">
                <h3 class="card-title">
                    Square Card Title
                </h3>
                <p class="preview-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt="" />
        </div>

        <div class="card square shadow">
            <div class="content">
                <h3 class="card-title">
                    Square Card Title
                </h3>
                <p class="preview-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt="" />
        </div>
    </div>


    <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                loop: true,
                margin: 10,
                navRewind: false,
                responsive: {
                  0: {
                    items: 2
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            })
          </script>



    <div class="card list shadow">
        <div class="list-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt="" />
            <div class="content">
                <h3 class="card-title">
                    Card Title
                </h3>
                <p class="preview-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
        </div>
        <div class="list-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt="" />
            <div class="content">
                <h3 class="card-title">
                    Card Title
                </h3>
                <p class="preview-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
        </div>
        <div class="list-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt="" />
            <div class="content">
                <h3 class="card-title">
                    Card Title
                </h3>
                <p class="preview-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
        </div>
    </div>





    <?php 
		$kind =  "nachricht";
		get_template_part('elements/card', $kind); 
	?>




    <?php get_template_part('elements/card', 'veranstaltung'); ?>

    <?php get_template_part('components/energieampel'); ?>

    <?php get_template_part('components/call', 'register'); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>