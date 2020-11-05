<?php
/**
 * Template Name: Veranstaltung [Default]
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

<main id="site-content" class="single" role="main">

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
        <h4><?php echo get_the_author_meta( 'display_name', $author_id ) ?> <span class="date"><?php echo wp_date('j. F G:i', strtotime(get_field('zeitpunkt'))); ?></span> </h4>

        </div>
        <!-- projekt / akteur -->
        <!-- not ready yet -->

        <!-- datum -->

        <!-- Bild -->
        <img class="single-header-image"src="<?php echo esc_url( $image_url ) ?>" />

        <p><?php the_field('kurzbeschreibung'); ?></p>

    </div>
    <!-- Eventtext felder gibt es noch nicht -->
    <div class="single-content">
        <!-- <p>Das Projekt der Arrenberg-Farm, eine moderne, kreislaufbasierte Lebensmittelproduktionsanlage mitten in
            Wuppertal zu realisieren, soll in der Zukunft ein Stück dazu beitragen, die Ressource Wasser zu sparen und
            gleichzeitig die Talbewohner mit frischen und gesunden Lebensmitteln zu versorgen. Ganz nach dem Motto
            „close the loop – new urban food“ wird ein kreislaufbasiertes Modell der Lebensmittelproduktion angestrebt,
            um so effizient und schonend wie möglich mit kostbaren Ressourcen umzugehen.
        </p> -->
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



    <button class="button-has-icon is-style-outline back">
            <img class="button-icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/edit.svg">
            <span class="button-has-icon-label">Bearbeiten</span>
        </button>

     <?php edit_post_link(); ?>

    <!-- calendar download -->
    <!-- not ready yet -->
    <?php calendar_download($post); ?>

    <!-- card: projekt / akteur -->
    <!-- not ready yet -->

    <!-- map: adresse -->
    <!-- not ready yet -->

    <!-- cards: weitere veranstaltungen -->
    <!-- not ready yet -->


    <?php			

		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>