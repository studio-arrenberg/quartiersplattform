<h4>Status</h4>

<?php 
// echo get_post_status(); 
?>

<label class="visibility_toggle visibility_toggle-<?php echo get_the_ID(  ); ?>">
    <input type="checkbox" <?php if (get_post_status() == 'publish') echo "checked"; ?> onclick="visibility_toggle('<?php echo get_the_ID(  ); ?>', 'visibility_toggle-<?php echo get_the_ID(  ); ?>')" >
    <span class="slider toggle_a <?php if (get_post_status() != 'publish') echo "hidden"; ?>">Dein Projekt ist Öffentlich</span>
    <span class="slider toggle_b <?php if (get_post_status() == 'publish') echo "hidden"; ?>">Dein Projekt ist Privat</span>
    <span class="acf-spinner" style="display: inline-block;"></span>
</label> 

<script>
    
    // if ($('label.projekt_toggle_status input').is(":checked")) {
    //     $('span.toggle_b').toggleClass('hidden');
    //     // alert('a');
    // }
    // else {
    //     $('span.toggle_a').toggleClass('hidden');
    //     // alert('b');
    // }

    function visibility_toggle(id, elementClass) {

        $('label.'+elementClass+' span.acf-spinner').addClass('is-active');

        // alert('label.'+elementClass+' span.acf-spinner');

        var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    
        var data = {
            'action': 'projekt_toggle_status', // !!! wording
            'post_id': id,
            'status': $('label.'+elementClass+' input').is(":checked"),
            'request': 1
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