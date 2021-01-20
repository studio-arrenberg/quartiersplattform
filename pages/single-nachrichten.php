<?php
/**
 * Template Name: Nachrichten [Default]
 * Template Post Type: Nachrichten
 *
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
            
            // get project by Term
            $term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
            $the_slug = $term_list[0]->slug;

			?>

    <div class="single-header">
        <!-- post title -->
        <div class="single-header-content">
            <h1><?php the_title(); ?></h1>
            <h3><?php echo $term_list[0]->name; ?> <span class="date"><?php echo get_the_date('j. F'); ?></span> </h3>
        </div>
        <img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />
    </div>

    <div class="site-content">

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

    <!-- weitere Nachrichten -->
    <?php
		$args2 = array(
			'post_type'=> array('nachrichten', 'veranstaltungen'), 
			'post_status'=>'publish', 
			'posts_per_page'=> 6,
            'order' => 'DESC',
            'post__not_in' => array(get_the_ID()),
            'tax_query' => array(
                array(
                    'taxonomy' => 'projekt',
                    'field' => 'slug',
                    'terms' => ".$the_slug."
                )
            )
        );
        
        $my_query = new WP_Query($args2);
        if ($my_query->post_count > 0) {
            ?>
    <h2>Weitere Nachrichten & Veranstaltungen</h2>
    <?php
            slider($args2,'card', '1','false');
        }

    ?>
    <br>

    <!-- Projekt Kachel -->
    <?php
        $term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
        $the_slug = $term_list[0]->slug;
        if ($the_slug) {
            $args = array(
                'name'        => $term_list[0]->slug,
                'post_type'   => 'projekte',
                'post_status' => 'publish',
                'numberposts' => '1'
            );


            $my_query = new WP_Query($args);
            if ($my_query->post_count > 0) {
                ?>
            <h2>Das Projekt</h2>

            <?php
            landscape_card($args);
            } 
        }
    ?>


    <!-- Backend edit link -->
    <?php edit_post_link(); ?>

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

</main><!-- #site-content -->


<?php get_footer(); ?>