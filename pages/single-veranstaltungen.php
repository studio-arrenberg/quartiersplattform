<?php
/**
 * Template Name: Projekt [Default]
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

<main id="site-content" role="main">

    <?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
			
			// prep image url
			$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), 'twentytwenty-fullscreen' ) : '';

			if ( $image_url ) {
				$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
				$cover_header_classes = ' bg-image';
			}

			?>

    <!-- post title -->
    <h1><?php the_title(); ?></h1>

    <!-- projekt / akteur -->
    <!-- not ready yet -->

    <!-- datum -->
    <p><?php the_field('kurzbeschreibung'); ?></p>


    <!-- Bild -->
    <img src="<?php echo esc_url( $image_url ) ?>" />

    <!-- Projektbeschreibung felder gibt es noch nicht -->
    <div>
        <p>Das Projekt der Arrenberg-Farm, eine moderne, kreislaufbasierte Lebensmittelproduktionsanlage mitten in
            Wuppertal zu realisieren, soll in der Zukunft ein Stück dazu beitragen, die Ressource Wasser zu sparen und
            gleichzeitig die Talbewohner mit frischen und gesunden Lebensmitteln zu versorgen. Ganz nach dem Motto
            „close the loop – new urban food“ wird ein kreislaufbasiertes Modell der Lebensmittelproduktion angestrebt,
            um so effizient und schonend wie möglich mit kostbaren Ressourcen umzugehen.
        </p>
    </div>

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