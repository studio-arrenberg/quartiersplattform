<?php

/**
 * Default Square Card
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

<div class="card square shadow gardient">
    <a href="<?php echo esc_url( get_permalink() ); ?>">

        <div class="content">
            <h3 class="card-title">
                <?php shorten_title(get_the_title(), '30'); ?>
            </h3>
            <p class="preview-text">
                <?php
                    if (strlen(get_field('text')) > 2) {
                        get_excerpt(get_field('text'), '55');
                    }
                    else {
                        get_excerpt(get_the_content(), '55');
                    }
                ?>
            </p>
        </div>
        <?php  the_post_thumbnail( 'square_l' ); ?>
        <?php // the_post_thumbnail( array(180, 180) ); ?>
    </a>
</div>