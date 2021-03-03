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
        <?php if( have_rows('sponsors', 'option') ): ?>    
        <?php while( have_rows('sponsors', 'option') ): the_row();  
            $image = get_sub_field('field_6024f5b43157e');
        ?>
            <img class="sponsoren-logo" src="<?php echo esc_url($image['url']); ?>" alt="<?php the_sub_field('field_6024f5dc3157f'); ?>"> 
        <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="footer">
    <?php 
    $image = get_field('logo', 'option');
    if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>

        <a class="footer-link" href="<?php echo get_site_url(); ?>/kontakt/">Kontakt</a>
        <a class="footer-link" href="<?php echo get_site_url(); ?>/impressum/">Impressum</a>
        <?php
            if (get_privacy_policy_url()) {
                ?> 
                    <a class="footer-link" href="<?php echo get_privacy_policy_url(); ?>">Datenschutz</a>
                <?php
            } 
        ?>
    </div><!-- .section-inner -->
</footer><!-- #site-footer -->
<?php wp_footer(); ?>
</body>

</html>