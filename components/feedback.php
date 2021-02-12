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
    <!-- <h3>Was wünschst du dir von der Quartiersplattform?</h3> -->

    <?php acf_form_head(); ?>
    <?php // acf_form('feedback-form'); ?>

    <?php $hierarchical_tax = array( 1 ); ?>
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
                    // 'tax_input' => array (
                    //     'version' => array( 2 )
                    // ),
                    'post_status' => 'publish',
                    
				),
				'field_el' => 'div',
				'post_content' => false,
				'post_title' => false,
                // 'return' => '?updated=true',
                'return' => get_site_url().'/anmerkungen', // post gets dublicated
				'field_groups' => array('group_5fb50c8393d52'), //Arrenberg App
				
				'submit_value'=>'Feedback senden',
			)
    ); ?>

    <!-- for testing -->
    <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/anmerkungen">Zur Wunschliste
</a>
</div>