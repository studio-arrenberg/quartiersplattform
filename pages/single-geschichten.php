<?php
/**
 * Template Name: Geschichten [Default]
 * Template Post Type: geschichten
 */

get_header();
?>

<main id="site-content" role="main">

    <?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			
			// prep image url
			$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), '' ) : '';

			if ( $image_url ) {
				$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
				$cover_header_classes = ' bg-image';
			}

			?>

    <div class="single-header">
        <!-- post title -->
        <div class="single-header-content">
            <h1><?php the_title(); ?></h1>
            <h3></h3>
        </div>

        <!-- Bild -->
        <img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />

    </div>
    <!-- Eventtext felder gibt es noch nicht -->
    <div class="site-content">
        <!-- not ready yet -->
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

    <?php edit_post_link(); ?>

    <?php			

		}
	}

	?>

    <br><br><br>
    <h2>Weitere Geschichten</h2>
    <!-- weitere veranstaltungen -->
    <?php
	$args2 = array(
		'post_type'=>'geschichten', 
		'post_status'=>'publish', 
		'posts_per_page'=> 4, 
		//'orderby' => 'meta_value',
		'orderby' => 'rand',
	);

    slider($args2,'square_card', '2','true'); 
	?>

</main><!-- #site-content -->


<?php get_footer(); ?>