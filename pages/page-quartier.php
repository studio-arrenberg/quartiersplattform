<?php

/**
 * 
 * Template Name: Quartier
 * Template Post Type: page
 * 
 */


# redirect before acf_form_head
wp_maintenance_mode();

// redirect to intro page when new visitor
redirect_visitor();

get_header();

?>

<main id="site-content" role="main" data-track-content>

    <h1>🤙 Introduction</h1>

</main><!-- #site-content -->

<?php get_footer(); ?>