<?php

/**
 * Card => Anmerkung
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

$terms_status = get_the_terms($post->ID, 'anmerkungen_status' );
// $terms_status_2 = get_the_terms($post->ID, 'feedback_status' );
$terms_version = "";

if ($terms_status) {
    $terms_version = get_the_terms( $post->ID, 'anmerkungen_version' );
}

?>

<?php // echo $terms_status[0]->name; ?>
<?php // echo $terms_version[0]->name; ?>

<?php
// Status = Vorschlag => In Bearbeitung => Umgesetzt
// Version = *Release Nützenbeerg* oder *V1.2 Nützenberg* oder *Release V1.2*

// print_r($terms_status);
// echo "<br>";
// print_r($terms_version);
// echo "<br>";
// print_r($terms_status_2);

?>


<div class="card shadow anmerkung">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
            <div class="pre-title"><?php echo $terms_version[0]->name; ?> <span class="date"><?php echo $terms_status[0]->name; ?> <span></div>
            <h3 class="card-title">
                <?php  shorten_title(get_field('text'), '200'); ?>
            </h3>
        </div>
        <?php the_post_thumbnail( 'preview_m' ); ?>
    </a>
</div>