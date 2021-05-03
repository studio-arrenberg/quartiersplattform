<<<<<<< HEAD
<div class="small-margin">
    <?php if ( get_query_var( 'pin_type' ) == 'pin_main') { ?>
=======
<?php if ( get_query_var( 'pin_type' ) == 'pin_main') { ?>
<div class="small-margin">
>>>>>>> 63d6191dddbd020495b61ea688a9d85bbfa0311d

        <h4 class="heading-size-3"><?php _e('Hier kannst du einstellen, ob das Projekt auf der Startseite erscheint', 'quartiersplattform'); ?></h4>

        <label class="pin_toggle pin_toggle-<?php echo get_the_ID(  ); ?>">
            <input type="checkbox" <?php if (get_field(get_query_var( 'pin_type' )) == 'true') echo "checked"; ?> onclick="pin_toggle('<?php echo get_the_ID(  ); ?>', '<?php echo get_query_var( 'pin_type' ) ?>', 'pin_toggle-<?php echo get_the_ID(  ); ?>')" >
            <span class="slider toggle_a <?php if (get_field(get_query_var( 'pin_type' )) != 'true') echo "hidden"; ?>">
            <?php _e(' Das Projekt wird auf der Startseite angezeigt.', 'quartiersplattform'); ?>
            </span>
            <span class="slider toggle_b <?php if (get_field(get_query_var( 'pin_type' )) == 'true') echo "hidden"; ?>">
            <?php _e('Das Projekt wird nicht auf der Startseite angezeigt.', 'quartiersplattform'); ?> </span>
            <span class="acf-spinner" style="display: inline-block;"></span>
        </label> 

<<<<<<< HEAD
    <?php } else if ( get_query_var( 'pin_type' ) == 'pin_project') { ?>
=======
<?php } else if ( get_query_var( 'pin_type' ) == 'pin_project') { ?>
>>>>>>> 63d6191dddbd020495b61ea688a9d85bbfa0311d

        <h4 class="heading-size-3"><?php _e('Hier kannst du einstellen, ob das Projekt auf der Startseite erscheint', 'quartiersplattform'); ?></h4>

        <label class="pin_toggle pin_toggle-<?php echo get_the_ID(  ); ?>">
            <input type="checkbox" <?php if (get_field(get_query_var( 'pin_type' )) == 'true') echo "checked"; ?> onclick="pin_toggle('<?php echo get_the_ID(  ); ?>', '<?php echo get_query_var( 'pin_type' ) ?>', 'pin_toggle-<?php echo get_the_ID(  ); ?>')" >
            <span class="slider toggle_a <?php if (get_field(get_query_var( 'pin_type' )) != 'true') echo "hidden"; ?>">
            <?php _e(' Das Projekt wird auf der Startseite angezeigt.', 'quartiersplattform'); ?>
            </span>
            <span class="slider toggle_b <?php if (get_field(get_query_var( 'pin_type' )) == 'true') echo "hidden"; ?>">
            <?php _e('Das Projekt wird nicht auf der Startseite angezeigt.', 'quartiersplattform'); ?> </span>
            <span class="acf-spinner" style="display: inline-block;"></span>
        </label> 

<<<<<<< HEAD
    <?php } ?>
=======
<?php } ?>
>>>>>>> 63d6191dddbd020495b61ea688a9d85bbfa0311d
</div>

<script>
    
    function pin_toggle(id, type, elementClass) { // id, type, class

        $('label.'+elementClass+' span.acf-spinner').addClass('is-active');

        var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    
        var data = {
            'action': 'pin_toggle',
            'post_id': id,
            'pin_type': type,
            'status': $('label.'+elementClass+' input').is(":checked"),
            'request': 1,
            _ajax_nonce: '<?php echo wp_create_nonce( 'my_ajax_nonce' ); ?>'
        };

        // alert($('label.'+elementClass+' input').is(":checked")+ ' id: ' +id);

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