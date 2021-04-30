<?php if (get_field('text')) { ?>
<div class="single-content">
    <h2>Beschreibung</h2>
    <p><?php extract_links(get_field('text')); ?></p>
</div>
<?php } ?>

<?php if (get_field('goal')) { ?>
<div class="single-content">
    <h2>Projektziel</h2>
    <p><?php the_field('goal'); ?></p>
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