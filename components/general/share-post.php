<?php

global $current_user;
// $page_for_posts = get_option( 'page_for_posts' );
if (get_post_status() == 'publish') {

?>
    <div class="share">
        <h3><?php _e('Teilen', 'quartiersplattform'); ?>  </h3>

        <div class="simple-card">
            <div class="copy-url">
                <input type="text" value="<?php echo esc_url(get_permalink()); ?>" >
                <button class="copy-button is-primary" onclick="Clipboard('<?php echo get_permalink() ?>')">
                    <?php require get_template_directory() . '/assets/icons/copy.svg'; ?>
                </button>
            </div>

            <div class="button-group">
                <a class="button is-transparent" target="blank"
                href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()); ?>">Facebook</a>

                <a class="button is-transparent" target="blank"
                href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_permalink()); ?>">Twitter</a>

                <a class="button is-transparent" target="blank"
                href="mailto:?subject=<?php the_title(); ?>&body=%20<?php echo get_permalink(); ?>"
                rel="nofollow">E-Mail</a>
            </div>
        </div>
    </div>

    <script>
        function Clipboard(value) {

            if (value) {
                navigator.clipboard.writeText(value)
            }

        }
    </script>

<?php

}
else if (qp_project_owner()) {
    $text = __("Dein Projekt kann erst geteilt werden, wenn es veröffentlicht wurde.",'quartiersplattform');
    reminder_card('project-share'.get_the_ID(  ), __('Dein Projekt kann nicht geteilt werden','quartiersplattform'), $text);
}

?>
