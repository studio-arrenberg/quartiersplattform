<?php global $current_user; ?>

<?php if (get_field('text') || qp_project_owner()) { ?>
    <div class="margin-bottom">
        <h3 class="heading-size-3"><?php _e('Beschreibung', 'quartiersplattform'); ?> </h3>
        <p><?php extract_links(get_field('text')); ?></p>
    </div>
<?php } ?>

<?php

if (!get_field('text') && qp_project_owner()) {
    $text = __('Du kannst deinem Projekt eine Beschreibung hinzufügen, um die Ziele und Inhalte noch besser zu erklären.','quartiersplattform');
    reminder_card('projekt-description-reminder'.get_the_ID(), __('Beschreibung hinzufügen','quartiersplattform'), $text);
}

?>

<?php
if ( ( is_user_logged_in() && qp_project_owner() ) ) {
?>
    <a class="button is-style-outline" href="<?php qp_parameter_permalink('action=edit'); echo esc_url($link ); ?>"><?php _e('Beschreibung bearbeiten', 'quartiersplattform'); ?> </a>
<?php
}
?>


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
