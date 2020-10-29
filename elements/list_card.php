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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/400x300.png" alt="" />
    <div class="content">
        <h3 class="card-title">
            <?php shorten_title(get_the_title(), '60'); ?>
        </h3>
        <p class="preview-text">
            <?php  get_excerpt(get_the_content(), '55'); ?>
        </p>
    </div>
</div>