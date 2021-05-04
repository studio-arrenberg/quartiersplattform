<?php global $current_user; ?>

<?php if ( is_user_logged_in() && $current_user->ID == $post->post_author ) { ?>
<div class="simple-card">
    <div class="button-group ">
        <!-- Nachricht erstellen -->
        <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/nachricht-erstellen/?project=<?php echo $post->post_name; ?>">
            <?php _e(' Nachricht erstellen', 'quartiersplattform'); ?>
        </a>

        <!-- Umfrage erstellen -->
        <?php if ( current_user_can('administrator') ) { ?>
            <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/umfrage-erstellen/?project=<?php echo $post->post_name; ?>">
                <?php _e('Umfrage erstellen', 'quartiersplattform'); ?> 
            </a>
        <?php } ?>

        <!-- Veranstaltung erstellen -->
        <a class="button is-style-outline"
            href="<?php echo get_site_url(); ?>/veranstaltung-erstellen/?project=<?php echo $post->post_name; ?>">
            <?php _e('Veranstaltung erstellen', 'quartiersplattform'); ?> 
        </a>
    </div>
</div>
<?php } ?>