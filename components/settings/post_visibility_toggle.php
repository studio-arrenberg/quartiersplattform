<h4>Status</h4>

<label class="projekt_toggle_status">
    <input type="checkbox" <?php if (get_post_status() == 'publish') echo "checked"; ?> onclick="projekt_toggle_status('<?php echo get_the_ID(  ); ?>')" >
    <span class="slider toggle_a">Dein Projekt ist Öffentlich</span>
    <span class="slider toggle_b">Dein Projekt ist Privat</span>
    <span class="acf-spinner" style="display: inline-block;"></span>
</label> 

<script>
    
    if ($('label.projekt_toggle_status input').is(":checked")) {
        $('span.toggle_b').toggleClass('hidden');
        // alert('a');
    }
    else {
        $('span.toggle_a').toggleClass('hidden');
        // alert('b');
    }

    function projekt_toggle_status(id) {

        $('label.projekt_toggle_status span.acf-spinner').addClass('is-active');

        var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    
        var data = {
            'action': 'projekt_toggle_status',
            'post_id': id,
            'status': $('label.projekt_toggle_status input').is(":checked"),
            'request': 1
        };

        $.ajax({
            url: ajax_url,
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(response){
                $('span.slider').toggleClass('hidden');
                $('label.projekt_toggle_status span.acf-spinner').removeClass('is-active');
            }
        });
    }

</script>