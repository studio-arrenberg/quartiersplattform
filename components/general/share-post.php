<!-- Projekt Teilen -->
<?php  
    $page_for_posts = get_option( 'page_for_posts' );

    if (get_post_status() == 'publish') {
?>
    <div class="share">
        <h2> Projekt teilen </h2>
        <div class="copy-url">
            <input type="text" value="<?php echo esc_url(get_permalink()); ?>" id="myInput">
            <button class="copy is-style-outline" onclick="copy()">Kopieren</button>

        </div>

        <div class="share-button">

            <a class="button is-style-outline " target="blank"
            onclick="_paq.push(['trackEvent', 'Share', 'Facebook', '<?php the_title(); ?>']);"
            href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr( esc_url( get_page_link( $page_for_posts ) ) ) ?>">Faceboook</a>
        
            <a class="button is-style-outline" target="blank"
            onclick="_paq.push(['trackEvent', 'Share', 'Twitter', '<?php the_title(); ?>']);"
            href="https://twitter.com/intent/tweet?url=<?php echo esc_attr( esc_url( get_page_link( $page_for_posts ) ) ) ?>">Twitter</a>
        
            <a class="button is-style-outline" target="blank"
            onclick="_paq.push(['trackEvent', 'Share', 'Email', '<?php the_title(); ?>']);"
            href="mailto:?subject=<?php the_title(); ?>&body=%20<?php echo get_permalink(); ?>"
            rel="nofollow">Email</a>

        </div>
    </div>

    <script>
        function copy() {
            _paq.push(['trackEvent', 'Share', 'Copy Link', '<?php the_title(); ?>']);
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            // alert("Copied the text: " + copyText.value);
        }
    </script>

<?php 
} else {
    $text = "Du musst dein Projekt erst veröffentlichen bevor du dies teilen kannst.";
    reminder_card('project-share'.get_the_ID(  ), 'Dein Projekt kann nicht geteilt werden', $text);
} 

?>