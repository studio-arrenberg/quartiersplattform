<?php
/**
 * Template Name: Event Form
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$settings = array(
	'html_before_fields' => '<p>Hello</p>',
	'html_after_fields' => '<p>World</p>',
	'html_updated_message'  => '<h1 id="message" class="updated"><p>%s</p></h1>',
	'uploader' => 'basic',
	'field_el' => 'div',
	'form' => true,
	'post_content' => false,
	'form_attributes' => array(),
	'fields' => false,
);


?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<!-- <h1><?php the_title(); ?></h1> -->
				
				<!-- <?php the_content(); ?> -->
				
				<!-- <p>My custom field: <?php the_field('my_custom_field'); ?></p> -->
				
				<?php acf_form($settings); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>