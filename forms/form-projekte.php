<?php
/**
 * Template Name: Projekt erstellen Formular
 * Template Post Type: projekte, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

acf_form_head(); // before wp header !important!
get_header();
?>

<main id="site-content" role="main">

<div class="feedback">
    <h2>Erstelle dein Projekt</h2>
    <br>

    <?php // acf_form_head(); ?>

    <?php $hierarchical_tax = array( 1 ); ?>
    <?php 
    acf_form(
			array(
				'id' => 'projekte-form',
				'html_before_fields' => '',
				'html_after_fields' => '',
				'label_placement'=> '',                
				'post_id'=>'new_post',
				'new_post'=>array(
                    'post_type' => 'projekte',
                    'post_status' => 'publish',
				),
				'field_el' => 'div',
				'post_content' => false,
                'post_title' => true,
                'return' => get_site_url().'/projekte', // post gets dublicated
				'fields' => array(
                    'target',
                    'emoji',
                    'slogan',
                    'text',
                    '_thumbnail_id',
				),
				'submit_value'=>'Projekt veröffentlichen',
			)
    ); 

    ?>

<script>

       
// picker for acf field
var el = $( "#acf-field_5fcf563d5b576" );
el.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
el.attr("data-emojiable", "true");
el.attr('maxlength', '2');

// remove previous emojies
$('div.emoji-picker-container').bind('DOMSubtreeModified', function(){
    console.log('call');
    $( this ).find('.emoji-wysiwyg-editor').children('img').not(':last').remove();
});

$(function() {
    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: '<?php echo get_template_directory_uri(); ?>/assets/emoji-picker/img/',
        popupButtonClasses: 'fa fa-smile-o'
    });
    // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
    // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
    // It can be called as many times as necessary; previously converted input fields will not be converted again
    window.emojiPicker.discover();
});


</script>
	

</main><!-- #site-content -->

<?php get_footer(); ?>