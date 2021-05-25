<h2><?php _e('Hinweise und Tipps', 'quartiersplattform'); ?> </h2>
<p class="margin-bottom"><?php _e('Hier kannst du alle Hinweise und Tipps auf der Quartiersplattform wieder einblenden.', 'quartiersplattform'); ?> </p>
<div class="reset_reminder_cards">
    <a class="button reset_reminder_cards" onclick="reset_reminder_cards()"><?php _e('Hinweise und Tipps zurücksetzen', 'quartiersplattform'); ?> </a>
    <span class="acf-spinner" style="display: inline-block;"></span>
</div>

<script>
    function reset_reminder_cards() {

        $('div.reset_reminder_cards span.acf-spinner').addClass('is-active');

        var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";

        var data = {
            'action': 'reset_reminder_cards',
            'request': 1,
            _ajax_nonce: '<?php echo wp_create_nonce( 'my_ajax_nonce' ); ?>'
        };

        $.ajax({
            url: ajax_url,
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(response){
                console.log(response);
                $('a.reset_reminder_cards').addClass('is-done');
                $('div.reset_reminder_cards span.acf-spinner').removeClass('is-active');
            }
        });
    }
</script>
