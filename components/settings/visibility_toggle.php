<h3><?php _e('Projektsichtbarkeit', 'quartiersplattform'); ?></h3>

<label class="visibility_toggle visibility_toggle-<?php echo get_the_ID(  ); ?>">
    <input type="checkbox" <?php if (get_post_status() == 'publish') echo "checked"; ?> onclick="visibility_toggle('<?php echo get_the_ID(  ); ?>', 'visibility_toggle-<?php echo get_the_ID(  ); ?>')" >
    <span class="slider toggle_a <?php if (get_post_status() != 'publish') echo "hidden"; ?>">
    <?php _e('Dein Projekt ist Öffentlich', 'quartiersplattform'); ?> </span>
    <span class="slider toggle_b <?php if (get_post_status() == 'publish') echo "hidden"; ?>">
    <?php _e('Dein Projekt ist nicht öffentlich', 'quartiersplattform'); ?> </span>
    <span class="acf-spinner" style="display: inline-block;"></span>
</label> 

<script>

    function visibility_toggle(id, elementClass) {

        $('label.'+elementClass+' span.acf-spinner').addClass('is-active');

        // alert('label.'+elementClass+' span.acf-spinner');

        var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    
        var data = {
            'action': 'projekt_toggle_status', // !!! wording
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