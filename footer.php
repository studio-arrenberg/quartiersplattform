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

    <?php if ( is_front_page() || cms_is_in_menu( 'qp_menu') ) { ?>

        <div class="sponsoren">
            <?php if( have_rows('sponsors', 'option') ): ?>    
                <?php while( have_rows('sponsors', 'option') ): the_row();  
                    $image = get_sub_field('field_6024f5b43157e');
                    $link = get_sub_field('field_6036469e6db06');
                
                    if( !empty( $link ) ){
                    ?> 
                        <a href="<?php echo $link; ?>">
                    <?php } ?>

                        <img class="sponsoren-logo" src="<?php echo esc_url($image['url']); ?>" alt="<?php the_sub_field('field_6024f5dc3157f'); ?>"> 
                    

                       <?php if( !empty( $link ) ){ ?> 
                        </a>
                    <?php } ?>
                 
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    <?php } ?>

    <div class="footer">
        <?php 
            //Get correct language
            if(!empty($_GET['lang'])){
                $sprache = $_GET['lang'];
            }
            else{
                if (!is_user_logged_in()) {
                    $sprache = $_COOKIE['language'];    	
                }else{
                    $sprache = get_user_locale( get_current_user_id() );
                }
               
            }
        ?>

        <p><?php _e('Sprache', 'quartiersplattform'); ?></p>
        <a class="button <?php if($sprache == "en_GB")echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=en_GB'); ?>">🏴󠁧󠁢󠁥󠁮󠁧󠁿  <?php _e('Englisch', 'quartiersplattform'); ?> </a>
        <a class="button <?php if($sprache == "tr_TR")echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=tr_TR'); ?>">🇹🇷  <?php _e('Türkisch', 'quartiersplattform'); ?> </a>
        <a class="button <?php if($sprache == "it_IT")echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=it_IT'); ?>">🇮🇹  <?php _e('Italienisch', 'quartiersplattform'); ?> </a>
        <a class="button <?php if($sprache == "de_DE")echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=de_DE'); ?>">🇩🇪  <?php _e('Deutsch', 'quartiersplattform'); ?> </a>

    <?php 
    $image = get_field('logo', 'option');
    if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>

        <!-- <a class="footer-link" href="<?php echo get_site_url(); ?>/kontakt/"><?php _e('Kontakt', 'quartiersplattform'); ?></a> -->
        <a class="footer-link" href="<?php echo get_site_url(); ?>/impressum/"><?php _e('Impressum', 'quartiersplattform'); ?> </a>
        <?php
            if (get_privacy_policy_url()) {
                ?> 
            <a class="footer-link" href="<?php echo get_privacy_policy_url(); ?>"><?php _e('Datenschutzerklärung', 'quartiersplattform'); ?> </a>
                <?php
            } 
        ?>
        
    </div><!-- .section-inner -->


</footer><!-- #site-footer -->
<?php wp_footer(); ?>
</body>

</html>