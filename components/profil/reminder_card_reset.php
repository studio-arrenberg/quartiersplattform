<?php if( current_user_can('administrator') ) { ?>
    <h2>Reminder Cards</h2>
    <p>Zeige alle Reminder Cards wieder an.</p>
    <div class="reset_reminder_cards">
        <a class="button reset_reminder_cards" onclick="reset_reminder_cards()">Reminder Cards zurücksetzen</a>
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
<?php } ?>