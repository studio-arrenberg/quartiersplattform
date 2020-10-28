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

    <!-- maybe slogan here -->
    <p><?php the_field('kurzbeschreibung'); ?></p>


    <!-- Bild -->
    <img src="<?php echo esc_url( $image_url ) ?>" />

    <!-- ACF test -->
    <p><?php the_field('begin'); ?></p>
    <p><?php the_field('abschluss'); ?></p>


    <!-- Projektbeschreibung felder gibt es noch nicht -->
    <div>
        <h3>Über das Projekt</h3>
        <p>Das Projekt der Arrenberg-Farm, eine moderne, kreislaufbasierte Lebensmittelproduktionsanlage mitten in
            Wuppertal zu realisieren, soll in der Zukunft ein Stück dazu beitragen, die Ressource Wasser zu sparen und
            gleichzeitig die Talbewohner mit frischen und gesunden Lebensmitteln zu versorgen. Ganz nach dem Motto
            „close the loop – new urban food“ wird ein kreislaufbasiertes Modell der Lebensmittelproduktion angestrebt,
            um so effizient und schonend wie möglich mit kostbaren Ressourcen umzugehen.
        </p>
    </div>


    <?php			
 
			// edit post link (fürs backend)
			edit_post_link();

			// comments 
			if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
				?>

    <div class="comments-wrapper section-inner">

        <?php comments_template('', true); ?>

    </div><!-- .comments-wrapper -->

    <?php
			}

		}
	}

	?>

</main><!-- #site-content -->

<!-- das kann raus: -->
<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>