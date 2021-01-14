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

get_header();
?>

<main id="site-content" role="main">

    <?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			// prep image url
			$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), 'preview_l' ) : '';

			if ( $image_url ) {
				$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
				$cover_header_classes = ' bg-image';
			}

			?>


    <div class="single-header">


        <!-- Bild -->
        <img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />

        <!-- post title -->
        <div class="single-header-content center-mobile">

            <?php if ( current_user_can('administrator') ) { // new feature only for admins ?>
            <div class="single-header-emoji"><?php the_field('emoji'); ?></div>
            <?php } ?>

            <h1><?php the_title(); ?></h1>

            <!-- slogan / emoji -->
            <?php if ( current_user_can('administrator') ) { // new feature only for admins ?>
            <div class="single-header-slogan"><?php the_field('slogan'); ?></div>
            <?php } ?>
            <!-- <h4><?php //if (current_user_can('administrator')) echo get_the_author(); ?></h4>              -->


        </div>

        <!-- akteur -->
        <!-- not ready yet -->


    </div>

    <!-- Projektbeschreibung -->
    <!-- not ready yet -->
    <div class="single-content">
        <p></p>
    </div>

    <!-- Anstehende Veranstaltungen -->
    <!-- not ready yet -->

    <!-- Projektverlauf -->
    <?php

        $args_chronik = array(
            'post_type' => array('veranstaltungen', 'nachrichten'), // it's default, you can skip it
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
    <?php if ( current_user_can('administrator') ) { // new feature only for admins ?>
    <div class="team">
        <div class="team-member">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); // 32 or 100 = size ?>
            <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>

        </div>
    </div>
    <?php } ?>


    <!-- Backend edit link -->
    <?php edit_post_link(); ?>


    <!-- Projekt Teilen -->
    <!-- not ready yet -->
    <?php if ( current_user_can('administrator') ) { // new feature only for admins 
        $page_for_posts = get_option( 'page_for_posts' );
        ?>
    <div class="share">
        <div>
            <input type="text" value="<?php echo get_permalink(); ?>" id="myInput">
            <button onclick="copy()">Kopieren</button>
        </div>
        <a class="button is-style-outline"
            href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr( esc_url( get_page_link( $page_for_posts ) ) ) ?>">Faceboook</a>
        <a class="button is-style-outline"
            href="https://twitter.com/intent/tweet?url=<?php echo esc_attr( esc_url( get_page_link( $page_for_posts ) ) ) ?>">Twitter</a>
        <a class="button is-style-outline" href="mailto:?subject=<?php the_title(); ?>&body=%20<?php echo get_permalink(); ?>" target="_blank" rel="nofollow">Email</a>
    </div>

    <script>
        // const span = document.querySelector("span.copy");

        // span.onclick = function() {
        //     document.execCommand("<?php echo get_permalink(); ?>");
        // }

        function copy() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            // alert("Copied the text: " + copyText.value);
        }
    </script>

    <?php } ?>



    <!-- Map -->
    <!-- not ready yet -->
    <?php if ( current_user_can('administrator') ) { // new feature only for admins ?>
    <p><?php the_field('map'); ?></p>
    <?php } ?>

    <!-- Kontakt -->
    <!-- not ready yet -->

    <!-- kommentare -->
    <?php			
		if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
	?>

    <div class="comments-wrapper">

        <?php comments_template('', true); ?>

    </div><!-- .comments-wrapper -->

    <?php
			}

		}
	}

	?>


    <br><br><br>
    <!-- weitere projekte -->
    <h2>Weitere Projekte</h2>
    <?php
	$args3 = array(
		'post_type'=>'projekte', 
		'post_status'=>'publish', 
		'posts_per_page'=> 4,
		'orderby' => 'rand'
	);

	slider($args3,'square_card', '2','true'); 
	?>

</main><!-- #site-content -->


<?php get_footer(); ?>