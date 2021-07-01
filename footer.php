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



add_filter( 'themes_update_check_locales', 'themes_check_locales', 10 );
function themes_check_locales( ) {
    // your code here
	$secondary_btn_word = "hi";
    $secondary_btn_word = array("de_DE","es_ES","it_IT");
	return $secondary_btn_word;
}

add_filter( 'core_version_check_locale', 'core_check_locales', 10 );
function core_check_locales( ) {
    // your code here
	$secondary_btn_word = "hi2";
    $secondary_btn_word = array("de_DE","es_ES","it_IT");

	return $secondary_btn_word;
}

add_filter( 'plugins_update_check_locales', 'plugins_check_locales', 20 );
function plugins_check_locales( ) {
    // your code here
	$secondary_btn_word = "hi2";
    $secondary_btn_word = array("de_DE","es_ES","it_IT");

	return $secondary_btn_word;
}

add_filter( 'get_available_languages', 'qp_get_available_languages', 10 );
function qp_get_available_languages( ) {
    // your code here
	$secondary_btn_word = "hi2";
    $secondary_btn_word = array("de_DE","es_ES","it_IT");

	return $secondary_btn_word;
}

function update_check_include_all_locales( $locales ) {
    return array_values( get_available_languages() );
}
add_filter( 'plugins_update_check_locales', 'update_check_include_all_locales' );
add_filter( 'themes_update_check_locales', 'update_check_include_all_locales' );

/**
 * Filters the locale requested for WordPress core translations.
 *
 * @since 2.8.0
 *
 * @param string $locale Current locale.
 */
$locale = apply_filters( 'core_version_check_locale', get_locale() );

// function update_check_include_all_locales( $locales ) {
//     return array_values( array("de_DE","es_ES","it_IT") );
//     // return array_values( get_available_languages() );
//     // return array("de_DE","es_ES","it_IT");
// }
// add_filter( 'plugins_update_check_locales', 'update_check_include_all_locales' );
// add_filter( 'themes_update_check_locales', 'update_check_include_all_locales' );


$locales = array_values( get_available_languages() );
print_r(get_available_languages());
// add_filter('themes_update_check_locales', array('de_DE','tr_TR'));
// add_filter('themes_update_check_locales', array($this, 'update_all_languages'));
print_r( apply_filters( 'themes_update_check_locales', $locales ) );
print_r( apply_filters( 'plugins_update_check_locales', $locales ) );

// apply_filters( 'plugins_update_check_locales', $locales );

// add_filter('themes_update_check_locales', array($this, 'update_all_languages'));
// add_filter('plugins_update_check_locales', array($this, 'update_all_languages'));

// read: https://core.trac.wordpress.org/ticket/34937
// core code: https://core.trac.wordpress.org/changeset/36630

?>

<div class="site-logo">
<?php 
    $image = get_field('logo', 'option');
    if( !empty( $image ) ): ?>
        <img class="quartier-logo" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>

</div>

<?php if ( is_front_page() || cms_is_in_menu( 'qp_menu') ) { ?>

<div class="sponsoren">
    <?php if( have_rows('sponsors', 'option') ): ?>    

        <?php while( have_rows('sponsors', 'option') ): the_row();  
            $image = get_sub_field('field_6024f5b43157e');
            $link = get_sub_field('field_6036469e6db06');
        ?>
            <div class="shadow sponsor">

                <?php
                if(  !empty( $link ) ){
                ?> 
                    <a href="<?php echo $link; ?>" target="_blank" rel="noreferrer">
                <?php } ?>

                <img class="sponsoren-logo" src="<?php echo esc_url($image['url']); ?>" alt="Sponsor der Quartiersplattform" > 
            
                <?php if( !empty( $link ) ){ ?> 
                    </a>
                <?php } ?>
            </div>

        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php } ?>



<footer id="site-footer" role="contentinfo" class="header-footer-group" data-track-content data-content-name="Footer">
    <div class="site-footer-content">
        
    <div class="footer">
  
        <div>
            <h4 class="heading-size-3"><?php _e('Die Plattform für dein Quartier!', 'quartiersplattform'); ?> </p>
        </div>

        <div>
            <h4 class="heading-size-3"><?php _e('Entdecke dein Viertel', 'quartiersplattform'); ?></h4>
            <a class="footer-link" href="<?php echo get_site_url(); ?>/projektverzeichnis/">  <?php _e('Alle Projekte', 'quartiersplattform'); ?> </a>
            <a class="footer-link" href="<?php echo get_site_url(); ?>/projekte/">  <?php _e('Neuigkeiten & Projektupdates', 'quartiersplattform'); ?> </a>
            <a class="footer-link" href="<?php echo get_site_url(); ?>/veranstaltungen/"> <?php _e('Veranstaltungskalender', 'quartiersplattform'); ?> </a>
            <a class="footer-link" href="<?php echo get_site_url(); ?>/sdgs/"> <?php _e('Ziele für nachhaltige Entwicklung im Quartier', 'quartiersplattform'); ?> </a>
        </div>

        <div>
            <h4 class="heading-size-3"><?php _e('Die Quartiersplattform', 'quartiersplattform'); ?></h4>
                <?php if (current_user_can('administrator')) {?>
                    <a class="footer-link " href="<?php echo  get_site_url(); ?>/einstellungen/"><?php _e('Einstellungen', 'quartiersplattform'); ?> ⚙️ </a>
                <?php } ?>
                <a class="footer-link " href="<?php echo  get_site_url(); ?>/quartiersplattform/"> <?php _e('Informationen zum Status deiner Plattform', 'quartiersplattform'); ?> </a>

    
            <a class="footer-link " href="https://github.com/studio-arrenberg/quartiersplattform" target="_blank"><?php _e('Die Quartiersplattform ', 'quartiersplattform'); ?> </a>         
        
        </div>

        <div>
 
        <?php if (!is_user_logged_in()) {?>

            <a class="heading-size-3 " href="<?php echo  get_site_url(); ?>/register/" ><?php _e('Jetzt registrieren', 'quartiersplattform'); ?></a>
            <?php } ?>       

            <?php if (is_user_logged_in()) {?>
                <a class="heading-size-3 " href="<?php echo  get_site_url(); ?>/feedback/" ><?php _e('Feedback zur Quartiersplattform', 'quartiersplattform'); ?></a>
           <?php } ?>       
        
        </div>
    </div>

    <div class="final-footer">
        <div>
            <!-- <a href="https://www.arrenberg.studio" class="footer-link primary">Quartiersplattform</a> -->
            <a class="footer-link" href="<?php echo get_site_url(); ?>/impressum/"><?php _e('Impressum', 'quartiersplattform'); ?> </a>
            <?php
                if (get_privacy_policy_url()) {
                    ?> 
                <a class="footer-link" href="<?php echo get_privacy_policy_url(); ?>"><?php _e('Datenschutz', 'quartiersplattform'); ?> </a>
                    <?php
                } 
            ?>
        </div>
              
        <div class="sprache">
            <a class="button <?php if(qp_language() == "en_GB") echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=en_GB'); ?>">🇬🇧&nbsp;<?php _e('English', ''); ?></a>
            <a class="button <?php if(qp_language() == "tr_TR") echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=tr_TR'); ?>">🇹🇷&nbsp;<?php _e('Türkçe', ''); ?></a>
            <a class="button <?php if(qp_language() == "it_IT") echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=it_IT'); ?>">🇮🇹&nbsp;<?php _e('Italiano', ''); ?></a>
            <a class="button <?php if(qp_language() == "de_DE") echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=de_DE'); ?>">🇩🇪&nbsp;<?php _e('Deutsch', ''); ?></a>
        </div>

        
    </div><!-- .section-inner -->


</footer><!-- #site-footer -->
<?php wp_footer(); ?>
</body>

</html>
