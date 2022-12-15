<h3><?php _e('Sichtbarkeit', 'quartiersplattform'); ?></h3>
<p><?php _e('Hier kannst du die Sichtbarkeit des Beitrags auf der Quartiersseite festlegen.', 'quartiersplattform'); ?></p>

<label class="visibility_toggle visibility_toggle-<?php echo get_the_ID(  ); ?>">
    <input class="toggle-input" type="checkbox" <?php if (get_post_status() == 'publish') echo "checked"; ?> onclick="visibility_toggle('<?php echo get_the_ID(  ); ?>', 'visibility_toggle-<?php echo get_the_ID(  ); ?>')" >
    
    <div class="toggle-wrapper  <?php if (get_post_status() == 'publish') echo "is-checked"; ?> ">
        <span class="button toggle-button slider toggle_a ">
            <?php _e('Öffentlich', 'quartiersplattform'); ?> 
        </span>
        <span class="button toggle-button slider toggle_b <?php if (get_post_status() == 'publish') ?>">
            <?php _e('Privat', 'quartiersplattform'); ?> 
        </span>
        <span class="toggle-slider" style="display: inline-block;"></span>
    </div>
    <span class="acf-spinner " style="display: inline-block;"></span>
</label> 

<script> 

    function visibility_toggle(id, elementClass) {

        $('label.'+elementClass+' span.acf-spinner').addClass('is-active');

        var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    
        var data = {
            'action': 'visibility_toggle', // !!! wording
            'post_id': id,
            'status': $('label.'+elementClass+' input').is(":checked"),
            'request': 1,
            _ajax_nonce: '<?php echo wp_create_nonce( 'my_ajax_nonce' ); ?>'
        };

        $.ajax({
            url: ajax_url,
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(response){
                $('label.'+elementClass+' div.toggle-wrapper').toggleClass('is-checked');
                $('label.'+elementClass+' span.acf-spinner').removeClass('is-active');
                $('.visibilty-warning-'+ id).remove();
                // alert('done remove: visibilty-warning-'+ id);
            }
        });
    }

</script>