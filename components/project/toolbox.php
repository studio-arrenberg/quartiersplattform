<?php global $current_user; 
// echo $current_user->ID."<br>";
// echo $post->post_author;
?>

<?php if ( is_user_logged_in() && qp_project_owner() ) { ?>
<div class="simple-card large-margin-bottom">
    <div class="content">
        <h3 class="heading-size-3">
            <?php _e('Was gibt es Neues?', 'quartiersplattform'); ?>
        </h3>
        <p class="text-size-2 small-margin-bottom">
            <?php _e('Halte das Quartier auf dem Laufenden.', 'quartiersplattform'); ?>
        </p>
    </div>
    <div class="button-group ">
        <!-- Nachricht erstellen -->
        <a class="button is-style-outline " href="<?php echo get_site_url(); ?>/nachricht-erstellen/?project=<?php echo $post->post_name; ?>">
        <?php require get_template_directory() . '/assets/icons/newspaper.svg'; ?>

            <?php _e(' Nachricht ', 'quartiersplattform'); ?>
        </a>

        <!-- Umfrage erstellen -->
        <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/umfrage-erstellen/?project=<?php echo $post->post_name; ?>">
        <?php require get_template_directory() . '/assets/icons/message.svg'; ?>

            <?php _e('Umfrage ', 'quartiersplattform'); ?> 
        </a>

        <!-- Veranstaltung erstellen -->
        <a class="button is-style-outline"
            href="<?php echo get_site_url(); ?>/veranstaltung-erstellen/?project=<?php echo $post->post_name; ?>">
            <?php require get_template_directory() . '/assets/icons/calendar-badge-plus.svg'; ?>

            <?php _e('Veranstaltung ', 'quartiersplattform'); ?> 
        </a>
    </div>
</div>
<?php } ?>