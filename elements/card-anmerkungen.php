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

$terms_status = get_the_terms( $post->ID, 'status_anmerkungen' );
$terms_version = "";

if ($terms_status) {
    $terms_version = get_the_terms( $post->ID, 'version_anmerkungen' );
}

?>

<?php // echo $terms_status[0]->name; ?>
<?php // echo $terms_version[0]->name; ?>

<?php
// Status = Vorschlag => In Bearbeitung => Umgesetzt
// Version = *Release Nützenbeerg* oder *V1.2 Nützenberg* oder *Release V1.2*
?>


<div class="card shadow anmerkung">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
            <div class="pre-title"><?php echo $terms_status[0]->name; ?> <span class="version"><?php echo $terms_version[0]->name; ?></span> <span class="date"><?php echo get_the_date('j. F G:i'); ?><span></div>
            <h3 class="card-title">
                <?php  shorten_title(get_field('text'), '100'); ?>
            </h3>
        </div>
        <?php the_post_thumbnail( 'preview_m' ); ?>
    </a>
</div>