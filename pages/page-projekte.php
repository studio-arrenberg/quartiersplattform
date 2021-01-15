<?php
/**
 * Template Name: Projekte
 * Template Post Type: page
 * 
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">
<div class="card-container card-container__long">
		<?php 
			if ( ( is_user_logged_in() ) ) {
				get_template_part( 'components/call', 'projekt' ); 
			}
		?>
	</div>

    <?php
	// featured projekte
	$args3 = array(
		'post_type'=>'projekte', 
		'post_status'=>'publish', 
		'posts_per_page'=> 4,
		'orderby' => 'rand'
	);

	slider($args3,'square_card', '2','true'); 
	?>

	
    <?php 
	// veranstaltung list
	$args4 = array(
		'post_type'=>'projekte', 
		'post_status'=>'publish', 
		'posts_per_page'=> -1
	);
	?>
	
	<div class="card-container">
	<?php card_list($args4);
	?>
</div>
</main><!-- #site-content -->

<?php get_footer(); ?>