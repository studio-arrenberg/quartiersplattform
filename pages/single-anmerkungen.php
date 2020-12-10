<?php
/**
 * Template Name: Anmerkung [Default]
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

<main id="site-content" class="anmerkungen" role="main">


    <?php

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();

    ?>

    <div class="card-container card-container__center card-container__large ">

        <?php
        $terms_status = get_the_terms($post->ID, 'anmerkungen_status' );
        $terms_version = "";
        if ($terms_status) {
            $terms_version = get_the_terms( $post->ID, 'anmerkungen_version' );
        }
        ?>

        <div class="card anmerkung <?php echo $terms_status[0]->slug; ?>">
            <a href="<?php echo esc_url( get_permalink() ); ?>">
                <div class="content">
                    <div class="pre-title"><?php echo $terms_version[0]->name; ?> <span class="date">
                            <?php echo $terms_status[0]->name; ?> von
                            <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                            <span></div>
                    <h3 class="card-title-large">
                        <?php  shorten_title(get_field('text'), '200'); ?>
                    </h3>
                    <div class="comment-count"><?php comment_counter($post->ID); ?></p>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <!-- author -->

    <?php edit_post_link(); ?>

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

    <!-- kommentare -->
    <?php			
    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
?>

    <div class="comments-wrapper">

        <?php comments_template('', true); ?>

    </div><!-- .comments-wrapper -->

    </div>
    <?php			
        }

    }
}

?>


</main><!-- #site-content -->



<?php get_footer(); ?>