<?php 
/* 
*
* Template Name: Angebot erstellen
*
*/
acf_form_head();
get_header();
?>

<main id="site-content" role="main">
    <div class="card-container card-container__center card-container__large ">
        <div class="card bg_orange-light">
            <div class="content white-text">
                <h3 class="card-title-large">
                    Teile ein Angebot
                </h3>
                <p class="preview-text-large">
                    Biete deine Hilfe an und unterstütze dein Viertel.
                </p>
            </div>
        </div>
    </div>



    <div class="publish-form">
    <h2>Erstelle dein eigenes Angebot</h2>
    <br>

    <?php acf_form_head(); ?>
    <?php // acf_form('feedback-form'); ?>

    <?php $hierarchical_tax = array( 1 ); ?>
    <?php acf_form(
			array(
				'id' => 'angebote-form',
				'html_before_fields' => '',
				'html_after_fields' => '',
				'label_placement'=> '',
				// 'updated_message' => __("Post updated", 'acf'),
				// 'html_updated_message'  => '<div id="message" class="updated"><h1>Hallo welt</h1></div>',
                'post_id'=>'new_post',
				'new_post'=>array(
                    'post_type' => 'angebote',
                    // 'tax_input' => array (
                    //     'version' => array( 2 )
                    // ),
                    'post_status' => 'publish',
                ),
                'return' => get_site_url().'/gemeinsam', // post gets dublicated
				'field_el' => 'div',
				'post_content' => false,
                'post_title' => false,
                'field_groups' => array('group_5fcf55e0af4db'), //Arrenberg App
                
                
				'submit_value'=>'Angebot senden',
			)
    ); 


    ?>

    <script>
    // picker for acf field
    var el = $("#acf-field_5fcf563d5b576");
    el.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
    el.attr("data-emojiable", "true");
    // el.attr('maxlength', '2');

    // remove previous emojies
    $('div.emoji-picker-container').bind('DOMSubtreeModified', function() {
        // this.selectionStart = this.selectionEnd = this.val().length;
        // $(this).find('.emoji-wysiwyg-editor').selectionEnd;
        $(this).find('.emoji-wysiwyg-editor').children('img').not(':last').remove();
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

        $('div.emoji-wysiwyg-editor').attr('tabindex', '-1');
    });
    </script>


    </div>
</main><!-- #site-content -->

<?php get_footer(); ?>