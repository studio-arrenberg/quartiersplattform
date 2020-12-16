<?php
/**
 * Template Name: Veranstaltung [Default]
 * Template Post Type: projekte
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
            <h3><?php if (current_user_can('administrator')) echo get_the_author_meta( 'display_name', $author_id );  ?>
                <span class="date"><?php echo wp_date('j. F G:i', strtotime(get_field('zeitpunkt'))); ?></span> </h3>
        </div>

        <!-- projekt / akteur -->
        <!-- not ready yet -->

        <!-- Bild -->
        <img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />

        <!-- slogan / emoji -->
        <?php if ( current_user_can('administrator') ) { // new feature only for admins ?>
        <p><?php the_field('website'); ?></p>
        <p><?php the_field('livestream'); ?></p>
        <p><?php the_field('ticket'); ?></p>
        <?php } ?>

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

    <!-- calendar download -->
    <!-- not ready yet -->
    <?php calendar_download($post); ?>
    <?php edit_post_link(); ?>

    <!-- card: projekt / akteur -->
        <!-- Projekt Kachel -->
    <?php
        $term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
        $the_slug = $term_list[0]->slug;

        $args = array(
            'name'        => $term_list[0]->slug,
            'post_type'   => 'projekte',
            'post_status' => 'publish',
            'numberposts' => 1
        );

        link_card('','','','', $args);
    ?>

    <!-- map: adresse -->
    <!-- not ready yet -->

    <?php			

		}
	}

	?>

    <br><br><br>
    <h2>Weitere Veranstaltungen</h2>
    <!-- weitere veranstaltungen -->
    <?php
	$args2 = array(
		'post_type'=>'veranstaltungen', 
		'post_status'=>'publish', 
		'posts_per_page'=> 4, 
		'meta_key' => 'zeitpunkt',
		//'orderby' => 'meta_value',
		'orderby' => 'rand',
		'order' => 'ASC',
		'offset' => '0', 
		'meta_query' => array(
			array(
				'key' => 'zeitpunkt', 
				'value' => date("Y-m-d"),
				'compare' => '>=', 
				'type' => 'DATE'
			)
		)
	);

	slider($args2,'card', '1','false'); 
	?>

</main><!-- #site-content -->


<?php get_footer(); ?>