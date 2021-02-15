        // picker for acf field
        // var el = $("#acf-field_5fcf563d5b576");
        var el = $("#acf-field_5fc64834f0bf2");
        el.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
        el.attr("data-emojiable", "true");
        // el.attr('maxlength', '20');
        var alt;

        // ksjdbüwughd 

        var el2 = $("#acf-field_5fcf563d5b576");
        el2.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
        el2.attr("data-emojiable", "true");
        el2.attr('maxlength', '20');


        // remove previous emojies
        $('div.emoji-picker-container').bind('DOMSubtreeModified', function() {

            console.log($(".emoji-wysiwyg-editor").children().length);

            if ($(".emoji-wysiwyg-editor").children().length > 1) {
                // console.log('remove childs ' + alt);
                if (!alt) {
                    $('.emoji-wysiwyg-editor').children('img:nth-of-type(2)').remove();
                } else if (alt) {
                    if (alt !== $('.emoji-wysiwyg-editor').children("img:last").attr("alt")) {
                        $('.emoji-wysiwyg-editor').children("img[alt='" + alt + "']").remove();
                    } else {
                        $('.emoji-wysiwyg-editor').children('img:nth-of-type(1)').remove();
                    }
                }
                alt = $('.emoji-wysiwyg-editor').children("img:first").attr("alt");
            }

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