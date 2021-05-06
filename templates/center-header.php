<?php
/**
 * Template Name: Center Header
 *
 *
 */

get_header();
?>

<?php

if (has_post_thumbnail()) {
    $image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), '' ) : '';

    if ( $image_url ) {
        $cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
        $cover_header_classes = ' bg-image';
    }
}

?>


<main class="center-header-template <?php if (!has_post_thumbnail()) echo "no-single-header-image"; ?>" role="main">

    <div class="center-header">
        <!-- Bild -->
        <?php if (has_post_thumbnail()) { ?>
        <img class="center-header-image" src="<?php echo esc_url( $image_url ) ?>" />
        <?php } ?>

        <!-- Post title -->
        <div class="center-header-content <?php if (!has_post_thumbnail()) echo "text-only"; ?>">
            <h1><?php the_title(); ?></h1>
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
    ?>

    </div>



    

</main><!-- #site-content -->


<?php get_footer(); ?>