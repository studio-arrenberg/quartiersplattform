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
    
    <!-- user posts -->
    <h2>Deine Angebote und Fragen ans Quartier</h2>
    <div class="card-container">
        <?php
            $args4 = array(
                'post_type'=> array('angebote', 'fragen'), 
                'post_status'=>'publish', 
                'author' =>  $current_user->ID,
                'posts_per_page'=> 10, 
                'order' => 'ASC',
                'offset' => '0', 
            );
            card_list($args4);
            // get_template_part( 'components/call-gemeinsam' );
        ?>
    </div>

    <div class="card-container card-container__small">
		<?php get_template_part( 'components/call', 'frage' ); ?>
		<?php get_template_part( 'components/call', 'angebot' ); ?>
	</div>

  

    <!-- <h2>Profil bearbeiten</h2> -->
    <?php echo do_shortcode("[ultimatemember_account]"); ?>
    
    <?php if (is_user_logged_in()) : ?>
        <a class="button" href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a>
    <?php endif;?>
    

   
</main><!-- #site-content -->


<?php get_footer(); ?>