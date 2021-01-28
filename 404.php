<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<div class="section-inner thin error404-content">

		<h1 class="entry-title"><?php _e( 'Page Not Found', 'twentytwenty' ); ?></h1>

		<div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'twentytwenty' ); ?></p></div>

		<br><br>

		<a class="button" href="<?php echo get_site_url(); ?>">Startseite</a>

		<?php
		if ( current_user_can('administrator') ) {
			get_search_form(
				array(
					'label' => __( '404 not found', 'twentytwenty' ),
				)
			);
		}
		?>

	</div><!-- .section-inner -->

</main><!-- #site-content -->


<?php
get_footer();
