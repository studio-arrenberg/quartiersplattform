<?php global $current_user; ?>


<div class="simple-card">
    <div class="button-group ">
        <!-- Nachricht erstellen -->
        <?php if ( $current_user->ID == $post->post_author ) { ?>
            <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/nachricht-erstellen/?project=<?php echo $post->post_name; ?>">Nachricht erstellen</a>
        <?php } ?>

        <!-- Umfrage erstellen -->
        <?php if ( is_user_logged_in() && $current_user->ID == $post->post_author && current_user_can('administrator') ) { ?>
            <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/umfrage-erstellen/?project=<?php echo $post->post_name; ?>">Umfrage erstellen</a>
        <?php } ?>

        <!-- Veranstaltung erstellen -->
        <?php if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { ?>
        <a class="button is-style-outline"
            href="<?php echo get_site_url(); ?>/veranstaltung-erstellen/?project=<?php echo $post->post_name; ?>">Veranstaltung erstellen</a>
        <?php } ?>
    </div>
</div>