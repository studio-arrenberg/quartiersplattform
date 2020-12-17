<?php
/**
 * Template Name: Fragen [Default]
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

<main id="page-content" role="main">

    <?php

if ( have_posts() ) {

    while ( have_posts() ) {
        the_post();

        if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ){
    ?>


    <div class="card-container card-container__center card-container__large ">
        <div class="card">
            <div class="content">
                <div class="pre-title green-text">Frage ans Quartier <span class="date green-text"><?php echo get_the_date('j. F'); ?>
                        <span>
                </div>
                <h3 class="card-title-large">
                    <?php  shorten_title(get_field('text'), '200'); ?>
                </h3>
            </div>
            <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
            <div class="emoji">
            <?php  shorten_title(get_field('emoji'), '200'); ?>
        </div>

        </div>
    </div>

    <!-- Gutenberg Editor Content -->
    <div class="gutenberg-content">
        <?php
    if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
        the_excerpt();
    } else {
        the_content( __( 'Continue reading', 'twentytwenty' ) );
    }

    if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
        ?>
            <a class="button  " href="<?php get_permalink(); ?>?action=edit">Frage bearbeiten</a>
        <?php
    }

?>
    </div>

    

    <?php
    }
else {
    // Show the form



    if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
        echo '<h3>Bearbeite deine Frage</h3>';
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
                )
            )
        );
        
    }

}



// echo $post->post_author;
?>


    <!-- kommentare -->
    <?php			
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