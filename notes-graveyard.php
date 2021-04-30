
<!-- <button class="button" onclick="add_project();">Projekt anlegen</button>
<div class="add_project">Hi</div>
<script>
    function add_project() {
        // alert('add projekt');
        var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";

        var data = {
            'action': 'add_project',
            'request': 1,
            _ajax_nonce: '<?php echo wp_create_nonce( 'my_ajax_nonce' ); ?>'
        };

        $.ajax({
            url: ajax_url,
            type: 'post',
            data: data,
            dataType: 'html',
            success: function(response){
                console.log(response);
                $('div.add_project').html(response);
                acf.do_action('append', $('div.add_project'));
            }
        });
    }
</script> -->

