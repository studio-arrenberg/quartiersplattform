<?php
/**
 * Template Name: Nachrichten [Default]
 * Template Post Type: Nachrichten
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="single-content" role="main">

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
        <!-- post title -->
        <div class="single-header-content">
            <h1><?php the_title(); ?></h1>
            <h3><?php if (current_user_can('administrator')) echo get_the_author_meta( 'display_name', $author_id );  ?> <span class="date"><?php echo get_the_date('j. F'); ?></span> </h3>
        </div>
        <img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />
    </div>
    
    <!-- ACF test -->
    <p><?php the_field('begin'); ?></p>
    <p><?php the_field('abschluss'); ?></p>


    <div class="single-content">

    </div>

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

    <!-- Backend edit link -->
    <?php edit_post_link(); ?>




    <?php			

		}
	}

	?>

</main><!-- #site-content -->


<?php get_footer(); ?>