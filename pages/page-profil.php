<?php

/**
 * 
 * Template Name: Profil
 *
 */


if (!is_user_logged_in()) {
    header("Location: ".get_site_url());
    exit();
}

    acf_form_head();
    wp_deregister_style( 'wp-admin' );
    get_header();

    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<!-- site-content-profil -->

<main id="site-content" class="page-grid " role="main">

	<div class="left-sidebar">
    

    <div class="single-header profil">
        
        <?php 
            // User Avatar
            // $current_user = wp_get_current_user();
            // echo get_avatar( $current_user->user_email, 32 );
        ?>

        <!-- user name -->
        <!-- <div class="single-header-content">
            <h1><?php $current_user = wp_get_current_user(); echo $current_user->first_name." ".$current_user->last_name; ?></h1>
        </div> -->

        
    </div>
    <?php 
        
        // $options = array(
        //     'post_id' => 'user_'.$current_user->ID,
        //     'field_groups' => array(77),
        //     'form' => true, 
        //     'return' => add_query_arg( 'updated', 'true', get_permalink() ), 
        //     'html_before_fields' => '',
        //     'html_after_fields' => '',
        //     'submit_value' => 'Test' 
        // );
        // acf_form( $options );
        // echo $current_user->ID;

        // if (user_can( $current_user, 'administrator')) {
        //     echo do_shortcode('[avatar_upload user="'.$user->ID.'"]');
        // }
        // else {
        //     echo do_shortcode('[avatar_upload]');
        // }
        
    ?>

		<div class="hidden-small">
            <?php projekt_carousel(); ?>
		</div>
	</div>


	<div class="main-content">

        <div class="profil-header">
            <div class="profil-header-avatar">
                <?php 
                    // User Avatar
                    $current_user = wp_get_current_user();
                    echo get_avatar( $current_user->user_email, 125 );
                ?>
            </div>
            <!-- user name -->
            <div class="profil-header-content">
                <h1><?php $current_user = wp_get_current_user(); echo $current_user->first_name." ".$current_user->last_name; ?></h1>
            </div>
        </div>

    

         <!-- bar -->
            <div class="filters-container">
                <div class="filters-wrapper">
                    <div class="filter-tabs ">
                        <button class="filter-button filter-active " data-value="summary" data-translate-value="0">
                            <?php _e('Profil', 'quartiersplattform'); ?>
                        </button>

                            <button class="filter-button" data-value="settings" data-translate-value="100%">
                                <?php _e('Einstellungen', 'quartiersplattform'); ?>
                            </button>
                    </div>
                    <div class="filter-slider" aria-hidden="true">
                        <div class="filter-slider-rect">&nbsp;</div>
                    </div>
                </div>
            </div>
           
            <script>

                const filterTabs = document.querySelector(".filter-tabs");

                filterTabs.addEventListener("click", (event) => {                
                    const root = document.documentElement;
                    const targetTranslateValue = event.target.dataset.translateValue;

                    if (targetTranslateValue == undefined) {
                        return false;
                    }

                    root.style.setProperty("--translate-filters-slider", targetTranslateValue);

                    document.querySelector(".bar.bar-active").classList.toggle('bar-active');
                    document.querySelector(".bar#" + event.target.dataset.value ).classList.toggle('bar-active');
                });

            </script>


    <!-- page menubar content -->
    <div class="profil-content">

        <div id="summary" class="bar bar-active">


            <h3><?php _e('Deine Kontaktinformationen', 'quartiersplattform'); ?></h3>
            <p>
                <?php 
                if (current_user_can('administrator')) {
                    _e('Als Administrator dieser Quartiersplattform werden deine Kontaktinformationen allen Besuchern angezeigt.');
                }
                else {
                    _e('Deine Kontaktinformationen werden nur registieren Nutzer angezeigt und können daher nicht von Suchmaschienen gefunden werden.');
                }
                ?>
            </p>
                        
            <?php author_card(true, $current_user->ID, false); ?>
            
            <?php
                $args4 = array(
                    'post_type'=> 'projekte', 
                    'post_status'=> array('publish', 'draft'), 
                    'author' =>  $current_user->ID,
                    'posts_per_page'=> 10, 
                    'order' => 'DESC',
                    'offset' => '0', 
                );
                if (count_query($args4)) {
                    echo "<br><h2 class='margin-bottom'>".__('Deine Projekte', 'quartiersplattform')."</h2><br>";
                    card_list($args4);
                }
                

                $args4 = array(
                    'post_type'=> array('veranstaltungen', 'nachrichten','umfragen'), 
                    'post_status'=>'publish', 
                    'author' =>  $current_user->ID,
                    'posts_per_page'=> 20, 
                    'order' => 'DESC',
                    'offset' => '0', 
                );
                if (count_query($args4)) {
                    echo "<br><h2 class='margin-bottom'>".__('Deine Beiträge','quartiersplattform')." "."</h2><br>";
                    card_list($args4);      
                    // echo "<br>";
                }
            ?>

        </div>

        <!-- bei menubar-hidden (nicht active) wird UM Disaabled -->
        <div id="settings" class="bar bar-hidden">


            <!-- Gutenberg Editor Content -->    
            <div class="gutenberg-content ">
                <?php
                    if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
                        the_excerpt();
                    } else {
                        the_content( __( 'Continue reading', 'twentytwenty' ) );
                    }
                ?>
            </div>

            <br>


            <?php get_template_part( 'components/profil/reminder_card_reset'); ?>

            <br><br>

            <!-- Contact Information -->   
            <h3><?php _e("Bearbeite deine Kontaktinformationen", "quartiersplattform"); ?></h3>
                <?php
                $userid = "user_".$current_user->ID; 
                acf_form (
                    array(
                        'form' => true,
                        'post_id' => $userid,
                        'return' => get_site_url()."/profil"."/",
                        'submit_value' => __('Änderungen speichern','quartiersplattform'),
                        'post_title' => false,
                        'post_content' => false,    
                        'field_groups' => array('group_6034e1d00f273'),
                    )
                );
                ?>
            <br>
            <br>
            <!-- Biography Information -->   
            <h2>Erzähle etwas über dich</h2>
            <?php
            $userid = "user_".$current_user->ID; 
            acf_form (
                array(
                    'form' => true,
                    'post_id' => $userid,
                    'return' => get_site_url()."/profil/",
                    'submit_value' => __('Änderungen speichern','quartiersplattform'),
                    'post_title' => false,
                    'post_content' => false,    
                    'field_groups' => array('group_605dc2bb690d9'),
                )
            );
            ?>

            <br>
            <br>
            <h2><?php _e('Profil bearbeiten', 'quartiersplattform'); ?> </h2>
            <?php echo do_shortcode("[ultimatemember_account]"); ?>

            <br>
            <a class="button" href="<?php echo get_site_url().'/logout/'; ?>"><?php _e('Abmelden', 'quartiersplattform'); ?> </a>
            <br><br><br><!-- wichtig  -->
            
        </div>

    </div>

    
   
</main><!-- #site-content -->


<?php get_footer(); ?>