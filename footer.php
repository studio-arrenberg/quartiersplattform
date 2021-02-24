<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<footer id="site-footer" role="contentinfo" class="header-footer-group" data-track-content data-content-name="Footer">
    <div class="sponsoren">
        <img class="sponsoren-logo" src="<?php echo get_template_directory_uri(); ?>/assets/sponsoren/wsw.svg" alt="WSW"> 
        <img class="sponsoren-logo" src="<?php echo get_template_directory_uri(); ?>/assets/sponsoren/buw.svg" alt="Universität Wuppertal"> 
        <img class="sponsoren-logo" src="<?php echo get_template_directory_uri(); ?>/assets/sponsoren/wuppertal-institut.svg" alt="Wuppertal Institt"> 
        <img class="sponsoren-logo" src="<?php echo get_template_directory_uri(); ?>/assets/sponsoren/studio-arrenberg.svg" alt="Studio Arrenberg"> 
        <img class="sponsoren-logo" src="<?php echo get_template_directory_uri(); ?>/assets/sponsoren/efre.svg" alt="Studio Arrenberg"> 
        <img class="sponsoren-logo" src="<?php echo get_template_directory_uri(); ?>/assets/sponsoren/dbu.svg" alt="Studio Arrenberg"> 
        <img class="sponsoren-logo" src="<?php echo get_template_directory_uri(); ?>/assets/sponsoren/eu.svg" alt="Studio Arrenberg"> 
    </div>

    <div class="footer">
    <?php 
    $image = get_field('logo', 'option');
    if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>

        <a class="footer-link" href="<?php echo get_site_url(); ?>/kontakt/">Kontakt</a>
        <a class="footer-link" href="<?php echo get_site_url(); ?>/impressum/">Impressum</a>

       
    </div><!-- .section-inner -->

</footer><!-- #site-footer -->

<?php wp_footer(); ?>



</body>

</html>