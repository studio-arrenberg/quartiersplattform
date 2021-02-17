<?php

/**
 * Card => Anmerkung
 */

?>

<?php
$terms_status = get_the_terms($post->ID, 'anmerkungen_status' );
$terms_version = "";
if ($terms_status) {
    $terms_version = get_the_terms( $post->ID, 'anmerkungen_version' );
}
?>

<div class="card shadow anmerkung <?php echo $terms_status[0]->slug; ?>">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
            <div class="pre-title"><?php echo $terms_version[0]->name; ?> <span
                    class="date">
                    <?php echo $terms_status[0]->name; ?> 
                    <?php // echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                    <span></div>
            <h3 class="card-title-large">
                <?php  shorten_title(get_field('text'), '200'); ?>
            </h3>
            <div class="comment-count">
                <?php echo comments_number('', 'Ein Kommentar', '% Kommentare'); ?>
            </div>
            </div>
        </div>
    </a>
</div>