<?php

/**
 * 
 * Call to action template
 *
 */

?>


<div class="card call_to_action shadow <?php echo get_query_var('call_to_action_bg_color'); ?>">
<a class="card-link" href="<?php echo get_site_url(); ?>/<?php echo get_query_var('call_to_action_link'); ?>">
        <div class="content white-text">
            <h3 class="card-title">
			<?php echo get_query_var('call_to_action_title'); ?>
            </h3>
            <p class="preview-text">
			<?php echo get_query_var('call_to_action_text'); ?>
            </p>
        </div>
</a>
</div>