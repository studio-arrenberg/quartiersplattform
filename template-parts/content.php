<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<div class="left-sidebar">
	<?php projekt_carousel(); ?>
</div>

<div id="post-<?php the_ID(); ?>" class="main-content">

	<?php
	if (has_post_thumbnail()) {
		$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), '' ) : '';

		if ( $image_url ) {
			$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
			$cover_header_classes = ' bg-image';
		}
	}
	?>

	<div class="single-header <?php if (!has_post_thumbnail()) echo "without-single-header-image"; ?>" >
		<!-- Bild -->
		<?php if (has_post_thumbnail()) { ?>
			<img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />
		<?php } ?>

		<!-- Post title -->
		<div class="single-header-content">
			<h1><?php _e(get_the_title(), 'quartiersplattform'); ?></h1>
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

	<!-- Backend edit link -->
	<?php qp_backend_edit_link(); ?>

	<!-- kommentare -->
	<?php
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
	?>

	<div class="comments-wrapper">
		<?php comments_template('', true); ?>
	</div><!-- .comments-wrapper -->
	<!-- kommentare -->
	<?php
		}
	?>

</div>

<div class="right-sidebar ">
	<?php
		get_template_part('components/views/veranstaltungen');
	?>
</div>
<!-- </main> -->
