<?php

/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>


<div class="card shadow">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt="" />
        <div class="content">
            <div class="pre-title">Pre-Title <span class="date">vor 30 Minuten<span></div>
            <h3 class="card-title">
                <?php the_title(); ?>
            </h3>
            <p class="preview-text">
                <?php get_excerpt(); ?>
            </p>
        </div>
    </a>
</div>