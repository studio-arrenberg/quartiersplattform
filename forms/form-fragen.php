<?php 
/* 
*
* Template Name: Frage erstellen
*
*/
acf_form_head();
get_header();
?>

<main id="site-content" role="main">
    <div class="card-container card-container__center card-container__large ">
        <div class="card bg_blue">
            <div class="content white-text">
                <h3 class="card-title-large">
                    Stelle eine Frage an dein Quartier!
                </h3>
                <p class="preview-text-large">
                    Wie können wir dich unterstützen?
                </p>
            </div>
        </div>
    </div>

    <?php // acf_form_head(); ?>


    
    <div class="publish-form">
    <h2>Was möchtest du wissen?</h2>
    <br>

    <?php $hierarchical_tax = array( 1 ); ?>
    <?php 
    acf_form(
			array(
                'form' => true,
				'id' => 'fragen-form',
				'html_before_fields' => '',
				'html_after_fields' => '',
				'label_placement'=> '',                
				'post_id'=>'new_post',
				'new_post'=>array(
                    'post_type' => 'fragen',
                    'post_status' => 'publish',
				),
				'field_el' => 'div',
				'post_content' => false,
                'post_title' => false,
                'submit_value'=>'Frage veröffentlichen',
                'return' => get_site_url().'/gemeinsam', // post gets dublicated
				'field_groups' => array('group_5fcf56cd99219'), //Arrenberg App
                
			)
    ); 


    ?>
       </div>
        <!-- <div class="lead emoji-picker-container">
            <input id="emoji" type="email" class="form-control" placeholder="Input with max length of 10" data-emojiable="true"
                maxlength="9">
        </div> -->


    <script>

       
        // picker for acf field
        var el = $( "#acf-field_5fcf563d5b576" );
        el.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
        el.attr("data-emojiable", "true");
        // el.attr('maxlength', '2');

        var el = $( "#acf-field_5fcf56cd9e356" );
        el.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
        el.attr("data-emojiable", "true");
        // el.attr('maxlength', '2');

        

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

            $('div.emoji-wysiwyg-editor').attr('tabindex', '-1');
        });
    

    </script>

    </div>
</main><!-- #site-content -->

<?php  get_footer(); ?>