<?php
/**
 * Template Name: Profil
 *
 *
 */

get_header();
?>

<main id="site-content" role="main">



    <div class="single-header profil">


        <!-- Bild -->
        

        <?php 
            $current_user = wp_get_current_user();
            echo get_avatar( $current_user->user_email, 32 );
        ?>


        <!-- post title -->
        <div class="single-header-content">
            <h1><?php 
            $current_user = wp_get_current_user(); echo $current_user->user_login; ?>
            </h1>


            <h4></h4>

            <p><?php the_field('kurzbeschreibung'); ?>
        </div>

        <!-- projekt / akteur -->
        <!-- not ready yet -->

        <!-- Bild -->



    </div>



 
    <!-- Gutenberg Editor Content -->
    <div class="gutenberg-content">
        <?php
            if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
                the_excerpt();
            } else {
                the_content( __( 'Continue reading', 'twentytwenty' ) );
            }
        ?>

	</div>
	
  

    <!-- <h2>Profil bearbeiten</h2> -->
    <?php 
	echo do_shortcode("[ultimatemember_account]");


	?>

   

</main><!-- #site-content -->


<?php get_footer(); ?>