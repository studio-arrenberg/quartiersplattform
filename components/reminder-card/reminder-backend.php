<div id="message" class="reminder is-dismissible <?php echo get_query_var('reminder_card_slug')." ".get_query_var('reminder_card_state'); ?>">

	<p class="">
		<?php echo get_query_var('reminder_card_html'); ?>
	</p>
	<button type="button" class="notice-dismiss" onclick="remove_reminder('<?php echo get_query_var('reminder_card_slug'); ?>')">
		<span class="screen-reader-text"><?php _e('Diese Meldung ausblenden.', 'quartiersplattform'); ?> </span>
	</button>

</div>

<script>

	function remove_reminder(element_slug) {

		var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    
        var data = {
            'action': 'remove_reminder',
            'slug': element_slug,
            'request': 1,
            _ajax_nonce: '<?php echo wp_create_nonce( 'my_ajax_nonce' ); ?>'
        };

        jQuery.ajax({
            url: ajax_url,
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(response){
				console.log(response);
                jQuery('div.reminder.' + element_slug).fadeOut();
            }
        });
	}

</script>