<?php

/**
 * 
 * Template Name: Profil
 *
 */


if (!is_user_logged_in()){
    header("Location: ".get_site_url());
    exit();
}

acf_form_head();
wp_deregister_style( 'wp-admin' );
get_header();

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

?>

<main id="site-content" class="site-content-profil " role="main">

    <div class="single-header profil">
        
        <?php 
            // User Avatar
            $current_user = wp_get_current_user();
            echo get_avatar( $current_user->user_email, 32 );
        ?>

        <!-- user name -->
        <div class="single-header-content">
            <h1><?php $current_user = wp_get_current_user(); echo $current_user->first_name." ".$current_user->last_name; ?></h1>
        </div>

        
    </div>

    <!-- bar -->
    <div class="filters-container">
        <div class="filters-wrapper">
            <ul class="filter-tabs">
                <li>
                    <button class="filter-button filter-active" data-value="profil" data-translate-value="0">
                        Profil
                    </button>
                </li>
                <li>
                    <button class="filter-button" data-value="settings" data-translate-value="200%">
                        Einstellungen
                    </button>
                </li>
            </ul>
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
            // console.log(targetTranslateValue);
            // console.log(event.target.dataset.value);

            if (targetTranslateValue == undefined) {
                return false;
            }

            root.style.setProperty("--translate-filters-slider", targetTranslateValue);

            document.querySelector(".bar.bar-active").classList.toggle('bar-active');
            document.querySelector(".bar#" + event.target.dataset.value ).classList.toggle('bar-active');
        });

    </script>

    <!-- page bar content -->
    <div>


        <div id="profil" class="bar bar-active">

            <h2>Dein Kontakt</h2>
            <?php author_card(true, $current_user->ID); ?>

            <h2>Deine Projekte</h2>
            <?php
                $args4 = array(
                    'post_type'=> 'projekte', 
                    'post_status'=> 'publish', 
                    'author' =>  $current_user->ID,
                    'posts_per_page'=> 10, 
                    'order' => 'DESC',
                    'offset' => '0', 
                );
                slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');

            ?>

        </div>


        <div id="settings" class="bar bar-hidden">

        <?php if( current_user_can('administrator') ) { ?>
            <h2>Reminder Cards</h2>
            <p>Zeige alle Reminder Cards wieder an.</p>
            <div class="reset_reminder_cards">
                <a class="button reset_reminder_cards" onclick="reset_reminder_cards()">Reminder Cards zurücksetzen</a>
                <span class="acf-spinner" style="display: inline-block;"></span>
            </div>
            
            <script>
                function reset_reminder_cards() {

                    $('div.reset_reminder_cards span.acf-spinner').addClass('is-active');

                    var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";

                    var data = {
                        'action': 'reset_reminder_cards',
                        'request': 1,
                        _ajax_nonce: '<?php echo wp_create_nonce( 'my_ajax_nonce' ); ?>'
                    };

                    $.ajax({
                        url: ajax_url,
                        type: 'post',
                        data: data,
                        dataType: 'json',
                        success: function(response){
                            console.log(response);
                            $('a.reset_reminder_cards').addClass('is-done');
                            $('div.reset_reminder_cards span.acf-spinner').removeClass('is-active');
                        }
                    });
                }
            </script>
        <?php } ?>


            <h4>Einstellungen</h4>
            <!-- Contact Information -->   
            <h2>Bearbeite deine Kontaktinformationen</h2>
            <br>
                <?php
                $userid = "user_".$current_user->ID; 
                acf_form (
                    array(
                        'form' => true,
                        'post_id' => $userid,
                        'return' => get_site_url()."/profil"."/",
                        'submit_value' => 'Änderungen speichern',
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
            <br>
                <?php
                $userid = "user_".$current_user->ID; 
                acf_form (
                    array(
                        'form' => true,
                        'post_id' => $userid,
                        'return' => get_site_url()."/profil"."/",
                        'submit_value' => 'Änderungen speichern',
                        'post_title' => false,
                        'post_content' => false,    
                        'field_groups' => array('group_605dc2bb690d9'),
                    )
                );
                ?>
        </div>

        <div id="edit" class="bar bar-hidden">
            <h4>Bearbeiten</h4>


            <h2>Profil bearbeiten</h2>
            <?php echo do_shortcode("[ultimatemember_account]"); ?>

            <a class="button is-style-outline" href="<?php echo get_author_posts_url(get_current_user_id()); ?>">Mein öffentliches Profil ansehen</a>

            <br>
            
            <?php if (is_user_logged_in()) : ?>
                <a class="button" href="<?php echo get_site_url().'/logout/'; ?>">Logout</a>
            <?php endif;?>


        </div>
    </div>

    
   
</main><!-- #site-content -->


<?php get_footer(); ?>