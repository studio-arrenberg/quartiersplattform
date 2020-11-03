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

<?php
// $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "preview_m" );
// $thumbnail = wp_get_attachment_image_src('preview_m');
// $img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'cover-size' );
?>

<div class="card shadow projekt">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
            <!-- <div class="pre-title">Pre-Title <span class="date">vor 30 Minuten<span></div> -->
            <h3 class="card-title"> Hp..
                <?php shorten_title(get_the_title(), '60'); ?>
            </h3>
            <p class="preview-text">
                <?php  get_excerpt(get_the_content(), '55'); ?>
            </p>
        </div>
        <?php // the_post_thumbnail( 'preview_m' ); ?>
        <?php // echo the_post_thumbnail($post->ID, "preview_m", false);?>
        <?php echo get_the_post_thumbnail( $post->ID, 'preview_m' ); ?>
    </a>
</div>