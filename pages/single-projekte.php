<?php
/**
 * Template Name: Projekt [Default]
 * Template Post Type: projekte
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

			// prep image url
			$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), 'preview_l' ) : '';

			if ( $image_url ) {
				$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
				$cover_header_classes = ' bg-image';
			}

			?>

    <div class="single-header  "> <!-- without-single-header-image -->


        <!-- Bild -->
        <img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />

        <!-- post title -->
        <div class="single-header-content center-mobile">
            <!-- emoji -->
            <div class="single-header-emoji"><?php the_field('emoji'); ?></div>

            <h1><?php the_title(); ?></h1>

            <!-- slogan -->
            <div class="single-header-slogan"><?php the_field('slogan'); ?></div>
            <!-- <h4><?php //if (current_user_can('administrator')) echo get_the_author(); ?></h4>              -->

            <?php
            if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
            ?>
                <a class="button is-style-outline" href="<?php get_permalink(); ?>?action=edit">Projekt bearbeiten</a>
            <?php
            }
            ?>

        </div>

        <!-- akteur -->
        <!-- not ready yet -->


    </div>

    <!-- Projektbeschreibung -->


    <?php if (get_field('description')) { ?>
    <div class="single-content">
        <h2>Beschreibung</h2>
        <p><?php the_field('description'); ?></p>
    </div>
    <?php } ?>

    <?php if (get_field('goal')) { ?>
    <div class="single-content">
        <h2>Projektziel</h2>
        <p><?php the_field('goal'); ?></p>
    </div>
    <?php } ?>


    <!-- Nachricht erstellen -->

    <?php
        if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
        ?>
            <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/nachricht-erstellen/?project=<?php echo $post->post_name; ?>">Nachricht erstellen</a>
        <?php
        }
    ?>

    <!-- Last Polling -->
    <?php
        $args_chronik = array(
            'post_type'=>'poll', 
            'post_status'=>'publish', 
            'posts_per_page'=> 1,

        );

        $my_query = new WP_Query($args_chronik);
        if ($my_query->post_count > 0) {
            ?>
                <h2>Umfrage</h2>
            <?php 
            slider($args_chronik,'card', '1','false'); 
        }
    ?>

    <!-- Anstehende Veranstaltungen -->
    <?php
        $args_chronik = array(
            'post_type'=>'veranstaltungen', 
            'post_status'=>'publish', 
            'posts_per_page'=> 1,
            'meta_key' => 'event_date',
            'orderby' => 'rand',
            'order' => 'ASC',
            'offset' => '0', 
            'meta_query' => array(
                array(
                    'key' => 'event_date', 
                    'value' => date("Y-m-d"),
                    'compare' => '>=', 
                    'type' => 'DATE'
                )
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'projekt',
                    'field' => 'slug',
                    'terms' => ".$post->post_name."
                )
            )

        );

        $my_query = new WP_Query($args_chronik);
        if ($my_query->post_count > 0) {
            ?>
                <h2>Anstehende Veranstaltung</h2>
            <?php 
            slider($args_chronik,'card', '1','false'); 
        }
    ?>

    <!-- Projektverlauf -->
    <?php
        $args_chronik = array(
            'post_type' => array('veranstaltungen', 'nachrichten'),
            'posts_per_page' => '3',
            'order_by' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'projekt',
                    'field' => 'slug',
                    'terms' => ".$post->post_name."
                )
            )
        );

        $my_query = new WP_Query($args_chronik);
        if ($my_query->post_count > 0) {
            list_card($args_chronik, get_site_url().'/projekt/'.$post->post_name.'/', 'Projektverlauf','Alle Veranstaltungen und Nachrichten');
        }
    ?>

    <!-- Gutenberg Editor Content -->
    <div class="gutenberg-content">
        <?php
            if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
                the_excerpt();
            } else {
                the_content( __( 'Continue reading', 'twentytwenty' ) );
            }

            
        ?>

    </div>

    <!-- Team -->
    <div class="team">
        <h2> Hutträger </h2>

        <div class="team-member">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); // 32 or 100 = size ?>
            <?php echo get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) ); ?>

        </div>
    </div>



    <!-- Projekt Teilen -->
    <?php  
        $page_for_posts = get_option( 'page_for_posts' );
        ?>
    <div class="share">
        <h2> Projekt teilen </h2>
        <div class="copy-url">
            <input type="text" value="<?php echo get_permalink(); ?>" id="myInput">
            <button class="copy" onclick="copy()">Kopieren</button>

        </div>

        <div class="share-button">

            <a class="button is-style-outline " target="blank"  onclick="_paq.push(['trackEvent', 'Share', 'Facebook', '<?php the_title(); ?>']);"
                href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr( esc_url( get_page_link( $page_for_posts ) ) ) ?>">Faceboook</a>
            <a class="button is-style-outline" target="blank" onclick="_paq.push(['trackEvent', 'Share', 'Twitter', '<?php the_title(); ?>']);"
                href="https://twitter.com/intent/tweet?url=<?php echo esc_attr( esc_url( get_page_link( $page_for_posts ) ) ) ?>">Twitter</a>
            <a class="button is-style-outline" target="blank" onclick="_paq.push(['trackEvent', 'Share', 'Email', '<?php the_title(); ?>']);"
                href="mailto:?subject=<?php the_title(); ?>&body=%20<?php echo get_permalink(); ?>" target="_blank"
                rel="nofollow">Email</a>

        </div>
    </div>

    <script>

        function copy() {
            _paq.push(['trackEvent', 'Share', 'Copy Link', '<?php the_title(); ?>']);
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            // alert("Copied the text: " + copyText.value);
        }

    </script>

    <?php

}
else {
    
    if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
        echo '<h2>Bearbeite dein Projekt</h2><br>';
        acf_form (
            array(
                'form' => true,
                'return' => '%post_url%',
                'submit_value' => 'Änderungen speichern',
                'post_title' => true,
                'post_content' => false,    
                'uploader' => 'basic',
                'field_groups' => array('group_5c5de08e4b57c'), //Arrenberg App
                // 'fields' => array(
                //     // fehlt: titel, beschreibung
                //     'target',
                //     'emoji',
                //     'slogan',
                //     'description',
                //     '_thumbnail_id', // Naming Bild ≠ Bilder
                // )
            )
        );
        
    }

    ?>

    <script>
    // picker for acf field
    // var el = $("#acf-field_5fcf563d5b576");
    var el = $("#acf-field_5fc64834f0bf2");
    el.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
    el.attr("data-emojiable", "true");
    // el.attr('maxlength', '20');
    var alt;

    var el2 = $("#acf-field_5fcf563d5b576");
    el2.parent('div.acf-input-wrap').addClass('lead emoji-picker-container');
    el2.attr("data-emojiable", "true");
    // el2.attr('maxlength', '20');
    

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
    </script>

    <?php

}

?>

    <!-- Map -->
    <!-- not ready yet -->
    <?php if ( current_user_can('administrator') ) { // new feature only for admins ?>
        <p><?php the_field('map'); ?></p>
    <?php } ?>

    <!-- Backend edit link -->
    <?php 
    if ( current_user_can('administrator') && !isset($_GET['action']) && !$_GET['action'] == 'edit') {
        edit_post_link(); 
    }
    ?>

    <!-- kommentare -->
    <?php			
        if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ) {
		if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
	?>

    <div class="comments-wrapper">

        <?php comments_template('', true); ?>

    </div><!-- .comments-wrapper -->

    <?php
			}

		}
    }
}

	?>

    <?php 
    if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ) {
    ?>

        <br><br><br>
        <h2>Weitere Projekte</h2>
        <?php
        $args3 = array(
            'post_type'=>'projekte', 
            'post_status'=>'publish', 
            'posts_per_page'=> 4,
            'orderby' => 'rand'
        );

        slider($args3,'square_card', '2','true'); 
    
    }
	?>

</main><!-- #site-content -->


<?php get_footer(); ?>