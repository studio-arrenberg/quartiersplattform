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

<div class="card shadow anmerkung ">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
        <div class="pre-title">Angebot an das Quartier<span class="date"><?php echo get_the_date('j. F'); ?> <span></div>
            <h3 class="card-title">
                <?php shorten_title(get_the_title(), '60'); ?>
            </h3>
        </div>
    </a>
</div>

