<div class="card card-large reminder <?php echo get_query_var('reminder_card_slug'); ?>">

<?php print_r( get_user_option( 'qp_reminder_card', get_current_user_id( ) ) ); ?>

	<div class="content content-shrink">
		<h1 class="card-title-large">
			<?php echo get_query_var('reminder_card_title'); ?>
		</h1>
		<h3>
			<?php echo get_query_var('reminder_card_text'); ?>
		</h3>
	</div>

	<?php if ( is_user_logged_in(  )) { ?>
		<a class="close-card-link" onclick="remove_reminder('<?php echo get_query_var('reminder_card_slug'); ?>')">
			<img class="close-card-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/close.svg" />
		</a>
	<?php } ?>

</div>

<script>

	function remove_reminder(element_slug) {

		var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    
        var data = {
        'action': 'remove_reminder',
		'slug': element_slug,
        'request': 1
        };

        $.ajax({
            url: ajax_url,
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(response){
				console.log(response);
                $('div.reminder.' + element_slug).fadeOut();
            }
        });
	}

</script>