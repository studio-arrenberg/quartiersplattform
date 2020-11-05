<?php
/**
 * Feedback
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<div class="feedback">
    <h4>Was wünschst du dir von der Quartiersplattform?</h4>

    <?php acf_form_head(); ?>
    <?php // acf_form('feedback-form'); ?>

    <?php acf_form(
			array(
				'id' => 'feedback-form',
				'html_before_fields' => '',
				'html_after_fields' => '',
				'label_placement'=> '',
				// 'updated_message' => __("Post updated", 'acf'),
				// 'html_updated_message'  => '<div id="message" class="updated"><h1>Hallo welt</h1></div>',
				'post_id'=>'new_post',
				'new_post'=>array(
					'post_type' => 'anmerkungen',
					'post_status' => 'publish'
				),
				'field_el' => 'div',
				'post_content' => false,
				'post_title' => false,
                // 'return' => '?updated=true',
                'return' => get_site_url().'/anmerkungen',
				'fields' => array(
					'text',
				),
				'submit_value'=>'Feedback senden',
			)
    ); ?>

    <!-- for testing -->
    <br>
    <p>Schau dir den Entwicklungsprozess an</p>
    <a class="button" href="<?php echo get_site_url(); ?>/anmerkungen">Feedback Liste</a>
</div>