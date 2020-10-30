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


    <!-- Projektbeschreibung -->
    <div>
        <h3>Über das Projekt</h3>
        <p>Das Projekt der Arrenberg-Farm, eine moderne, kreislaufbasierte Lebensmittelproduktionsanlage mitten in
            Wuppertal zu realisieren, soll in der Zukunft ein Stück dazu beitragen, die Ressource Wasser zu sparen und
            gleichzeitig die Talbewohner mit frischen und gesunden Lebensmitteln zu versorgen. Ganz nach dem Motto
            „close the loop – new urban food“ wird ein kreislaufbasiertes Modell der Lebensmittelproduktion angestrebt,
            um so effizient und schonend wie möglich mit kostbaren Ressourcen umzugehen.
        </p>
    </div>

    <!-- Backend edit link -->
    <?php edit_post_link(); ?>

    <!-- Anstehende Veranstaltungen -->
    <!-- not ready yet -->

    <!-- Projektverlauf -->
    <!-- not ready yet -->

    <!-- Gutenberg Editor Content -->
    <?php
        if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
            the_excerpt();
        } else {
            the_content( __( 'Continue reading', 'twentytwenty' ) );
        }
    ?>

    <!-- Projekt Teilen -->
    <!-- not ready yet -->

    <!-- Team -->
    <!-- not ready yet -->

    <!-- Map -->
    <!-- not ready yet -->

    <!-- Kontakt -->
    <!-- not ready yet -->

    <!-- kommentare -->
    <?php			
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