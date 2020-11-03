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

<div class="list-item">
    <?php the_post_thumbnail( 'preview_m' ); ?>
    <div class="content">
        <h3 class="card-title">
            <?php shorten_title(get_the_title(), '30'); ?>
        </h3>
        <p class="preview-text">
            <?php  get_excerpt(get_the_content(), '55'); ?>
        </p>
    </div>
</div>