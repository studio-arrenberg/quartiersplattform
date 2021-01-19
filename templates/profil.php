<?php
/**
 * Template Name: Profil
 *
 *
 */

get_header();

if (!is_user_logged_in()){
    header("Location: ".get_site_url());
    exit();
}

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

    <?php // echo do_shortcode('[ultimatemember form_id="63"]'); ?>

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
    <br>

    <!-- user posts -->
    <h2>Deine Angebote und Fragen</h2>
    <?php
        $args4 = array(
            'post_type'=> array('angebote', 'fragen'), 
            'post_status'=>'publish', 
            'author' =>  $current_user->ID,
            'posts_per_page'=> -1, 
            'order' => 'DESC',
            'offset' => '0', 
        );
        slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');
    ?>

    <div class="card-container card-container__small">
		<?php get_template_part( 'components/call', 'frage' ); ?>
		<?php get_template_part( 'components/call', 'angebot' ); ?>
    </div>

    <br>
    <h2>Deine Projekte</h2>
    <?php
        $args4 = array(
            'post_type'=> 'projekte', 
            'post_status'=> 'publish', 
            'author' =>  $current_user->ID,
            'posts_per_page'=> 10, 
            'order' => 'DESC',
            'offset' => '0', 
        );
        slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');

    ?>

    <div class="card-container card-container__center card-container__long">
        <?php get_template_part( 'components/call', 'projekt' ); ?>
    </div>


    <br>
    <br>
    <h2>Profil bearbeiten</h2>
    <?php echo do_shortcode("[ultimatemember_account]"); ?>
    
    <?php if (is_user_logged_in()) : ?>
        <a class="button" href="<?php echo get_site_url().'/logout/'; ?>">Logout</a>
    <?php endif;?>
    

   
</main><!-- #site-content -->


<?php get_footer(); ?>