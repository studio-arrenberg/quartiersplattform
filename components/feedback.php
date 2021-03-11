<?php

/**
 * 
 * Feedback
 * 
 */

?>

<div class="feedback">

    <?php acf_form_head(); ?>

    <?php 
	acf_form(
		array(
			'id' => 'feedback-form',
			'html_before_fields' => '',
			'html_after_fields' => '',
			'label_placement'=> '',
			'post_id'=>'new_post',
			'new_post'=>array(
				'post_type' => 'anmerkungen',
				'post_status' => 'publish',
			),
			'field_el' => 'div',
			'post_content' => false,
			'post_title' => false,
			'return' => get_site_url().'/anmerkungen',
			'field_groups' => array('group_5fb50c8393d52'),
			'submit_value'=>'Feedback senden',
		)
    ); 
	?>

    <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/anmerkungen">Zur Wunschliste
</a>
</div>