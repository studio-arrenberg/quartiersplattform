<?php
/**
 * Template Name: Angebote [Default]
 * Template Post Type: gemeinsam
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { // Execute code if user is logged in or user is the author
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}

get_header();
?>

<main id="site-content" role="main">

    <?php

if ( have_posts() ) {

    while ( have_posts() ) {
        the_post();

        if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ){

    ?>

    <div class="card-container card-container__center card-container__large ">

        <?php get_template_part('elements/card', get_post_type()); ?>

    </div>

    <?php 

    if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
        ?>
            <a class="button is-style-outline" href="<?php get_permalink(); ?>?action=edit">Angebot bearbeiten</a>
        <?php
    }

    ?>
    </div>


    <?php
        }
else {
if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
    echo '<h2>Bearbeite dein Angebot</h2><br>';
    acf_form (
        array(
            'form' => true,
            'return' => '%post_url%',
            'submit_value' => 'Änderungen speichern',
            'post_title' => false,
            'post_content' => false,    
            'fields' => array(
                'text',                
                'emoji',
                'duration',                
            )
        )
    );
    
}
}
// echo $post->post_author;
?>


    <!-- kommentare -->
    <?php			

    // echo "kommentare";

    if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ) {
    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
    
    ?>

    <div class="comments-wrapper">

        <?php comments_template('', true); ?>

    </div><!-- .comments-wrapper -->

    <?php } ?>
    </div>
    <?php		
    	
        }

    }
}



?>

<script>

// picker for acf field
var el = $( "#acf-field_5fcf563d5b576" );
el.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
el.attr("data-emojiable", "true");
el.attr('maxlength', '20');
var alt;
// remove previous emojies
$('div.emoji-picker-container').bind('DOMSubtreeModified', function(){

    console.log($(".emoji-wysiwyg-editor").children().length);

    if ($(".emoji-wysiwyg-editor").children().length > 1) {
        // console.log('remove childs ' + alt);
        if (!alt) {
            $('.emoji-wysiwyg-editor').children('img:nth-of-type(2)').remove();
        }
        else if (alt) {
            if (alt !==  $('.emoji-wysiwyg-editor').children("img:last").attr("alt")) {
                $('.emoji-wysiwyg-editor').children("img[alt='"+alt+"']").remove();
            }
            else {
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
});


</script>



</main><!-- #site-content -->



<?php get_footer(); ?>