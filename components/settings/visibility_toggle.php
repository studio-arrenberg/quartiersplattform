<h3><?php _e('Sichtbarkeit', 'quartiersplattform'); ?></h3>
<p><?php _e('Hier kannst du die Sichtbarkeit des Beitrags auf der Quariersseite festlegen.', 'quartiersplattform'); ?></p>

<label class="visibility_toggle visibility_toggle-<?php echo get_the_ID(  ); ?>">
    <input type="checkbox" <?php if (get_post_status() == 'publish') echo "checked"; ?> onclick="visibility_toggle('<?php echo get_the_ID(  ); ?>', 'visibility_toggle-<?php echo get_the_ID(  ); ?>')" >
    <span class="slider toggle_a <?php if (get_post_status() != 'publish') echo "hidden"; ?>">
    <?php _e('Öffentlich', 'quartiersplattform'); ?> </span>
    <span class="slider toggle_b <?php if (get_post_status() == 'publish') echo "hidden"; ?>">
    <?php _e('Privat', 'quartiersplattform'); ?> </span>
    <span class="acf-spinner" style="display: inline-block;"></span>
</label> 



<?php if ( current_user_can('administrator') ) {
        
        ?>
    <br>
    <br>
        <h3><?php _e('Sichtbarkeit', 'quartiersplattform'); ?></h3>
        <p><?php _e('Hier kannst du die Sichtbarkeit des Beitrags auf der Quariersseite festlegen.', 'quartiersplattform'); ?></p>
        
        <div class="visibility_toggle visibility_toggle-<?php echo get_the_ID(  ); ?>" >
            <div class="toggle-wrapper" onclick="visibility_toggle('<?php echo get_the_ID(  ); ?>', 'visibility_toggle-<?php echo get_the_ID(  ); ?>')">
                <button class="toggle-button <?php if (get_post_status() == 'publish') echo "toggle-button-active"; ?>"  >
                    <?php _e('Öffentlich', 'quartiersplattform'); ?> </span>
                </button>
                <button class="toggle-button <?php if (get_post_status() != 'publish') echo "toggle-button-active"; ?>" >
                    <?php _e('Privat', 'quartiersplattform'); ?> </span>
                </button>
            </div>
            <span class="acf-spinner" style="display: inline-block;"></span>
        </div>  
        
        <?php } ?>

<script> 

    function visibility_toggle(id, elementClass) {

        $('label.'+elementClass+' span.acf-spinner').addClass('is-active');

        // alert('label.'+elementClass+' span.acf-spinner');

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
                $('label.'+elementClass+' span.slider').toggleClass('hidden');
                $('label.'+elementClass+' span.acf-spinner').removeClass('is-active');
            }
        });
    }

</script>