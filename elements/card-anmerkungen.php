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

<div class="card shadow projekt">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
            <div class="pre-title">Ausstehend <span class="date">vor 30 Minuten<span></div>
            <h3 class="card-title">
                <?php shorten_title(get_the_title(), '60'); ?>
            </h3>
            <p class="preview-text">
                <?php  get_excerpt(get_field('text'), '55'); ?>
            </p>
        </div>
        <?php the_post_thumbnail( 'preview_m' ); ?>
    </a>
</div>