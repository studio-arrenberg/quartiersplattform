<?php

/**
 * Card => Gemeinsam
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
// $terms_status = get_the_terms($post->ID, 'anmerkungen_status' );
// $terms_version = "";
// if ($terms_status) {
//     $terms_version = get_the_terms( $post->ID, 'anmerkungen_version' );
// }
// $comment_count = get_comment_count($post->ID)['approved'];
?>

<div class="card shadow ">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
            <div class="pre-title">Solidarisches Angebot <span class="date"><?php echo get_the_date('j. F'); ?> <span>
            </div>
            <h3 class="card-title-large">
                <?php  shorten_title(get_field('text'), '200'); ?>
            </h3>
        </div>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 15 ); ?>

        <p><?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?></p>

    </a>
</div>