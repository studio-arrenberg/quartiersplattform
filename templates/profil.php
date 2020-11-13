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
        
        <?php 
        // User Avatar
        $current_user = wp_get_current_user();
        echo get_avatar( $current_user->user_email, 32 );
        ?>


        <!-- user  name -->
        <div class="single-header-content">
            <h1><?php $current_user = wp_get_current_user(); echo $current_user->user_login; ?></h1>
        </div>

    </div>
  

    <!-- <h2>Profil bearbeiten</h2> -->
    <?php echo do_shortcode("[ultimatemember_account]"); ?>

   
</main><!-- #site-content -->


<?php get_footer(); ?>