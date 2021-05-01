<?php global $current_user; ?>

<?php
if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
?>
<a class="button is-style-outline" href="<?php get_permalink(); ?>?action=edit">Projekt bearbeiten</a>

<?php
}
?>

<?php if (get_field('text')) { ?>
<div class="single-content">
    <h3 class="heading-size-3">Beschreibung</h3>
    <p><?php extract_links(get_field('text')); ?></p>
</div>
<?php } ?>


<!-- Gutenberg Editor Content -->
<div class="gutenberg-content">

    <?php
        if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
            the_excerpt();
        } else {
            the_content( __( 'Continue reading', 'twentytwenty' ) );
        }
    ?>

</div>