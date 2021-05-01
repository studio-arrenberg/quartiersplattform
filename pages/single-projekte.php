<?php

/**
 * 
 * Template Name: Projekt [Default]
 * Template Post Type: projekte
 *
 */

if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { // Execute code if user is logged in or user is the author
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}
get_header();

?>


<main id="site-content" class="page-grid" role="main">

	<div class="left-sidebar">



		<div class="hidden-small">

			<?php 
				$args4 = array(
					'post_type'=> array('projekte'), 
					'post_status'=>'publish', 
					'posts_per_page'=> 20,
					'orderby' => 'date'
				);
			?>  

			<?php // card_list($args4); ?>
		</div>

		<?php projekt_carousel(); ?>

	</div>


	<div class="main-content">




    <?php

	if ( have_posts() ) {

		while ( have_posts() ) {
            the_post();
            
            if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ){

			// prep image url
			$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), 'preview_l' ) : '';

			if ( $image_url ) {
				$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
				$cover_header_classes = ' bg-image';
			}

			?>

            <div class="projekt-header">
                
                    <!-- post title -->
                    <div class="projekt-header-content">
                    <!-- emoji -->
                    <div class="projekt-header-emoji"><?php the_field('emoji'); ?></div>

                    <h1><?php the_title(); ?></h1>

                    <div class="projekt-header-slogan"><?php the_field('slogan'); ?></div>


                </div>

                <!-- akteur -->
                <!-- not ready yet -->


            </div>


            <!-- bar -->
            <div class="filters-container">
                <div class="filters-wrapper <?php if ($current_user->ID == $post->post_author) { ?> tabs-3 <?php } ?>">
                    <div class="filter-tabs  ">
                        <button class="filter-button filter-active " data-value="summary" data-translate-value="0">
                            Übersicht
                        </button>
                        <button class="filter-button" data-value="posts" data-translate-value="100%">
                            Chronik
                        </button>

                        <?php if ($current_user->ID == $post->post_author) { ?>
                            <button class="filter-button" data-value="settings" data-translate-value="200%">
                                Einstellungen
                            </button>
                        <?php } ?>
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
                <div id="summary" class="bar bar-active">

                     <!-- Bild -->
                     <img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />


                    <?php 
                    // project is not public
                    if (get_post_status() == 'draft' && $current_user->ID == $post->post_author) {
                        reminder_card('warning-draft-'.get_the_ID(  ), 'Projekt veröffentlichen', 'Dein Projekt ist noch nicht öffentlich. Du kannst dein Projekt in den Einstellungen veröffentlichen', 'Einstellungen');
                        reminder_card('warning', 'Projekt veröffentlichen', 'Dein Projekt ist noch nicht öffentlich. Du kannst dein Projekt in den Einstellungen veröffentlichen', 'Einstellungen');
                    }

                    // Toolbox
                    get_template_part( 'components/project/toolbox' );

                    // Anstehende Events
                    get_template_part( 'components/project/coming-events' );
                    
                    // Pinned Posts
                    get_template_part( 'components/project/pinned-posts' );

                    // Content
                    get_template_part( 'components/project/content' );

                    // SDGs
                    get_template_part( 'components/project/sdg-display' );

                    // Author
                    author_card(true);

                    // Share post
                    get_template_part( 'components/general/share-post' );

                    // Map
                    get_template_part('components/map-card');


                    ?>
                    


                </div>


                <div id="posts" class="bar bar-hidden">

                    <?php get_template_part( 'components/project/history' ); ?>
                    
                </div>



                <?php if ($current_user->ID == $post->post_author) { ?>
                <div id="settings" class="bar bar-hidden">

                    <?php pin_toggle('pin_main'); ?>

                    <?php post_visibility_toggle( get_the_ID(  ) ); ?>


                    <div class="publish-form">
                        <h2>Bearbeite dein Projekt</h2>
                        <br>

                        <?php
                            acf_form (
                                array(
                                    'form' => true,
                                    'return' => '%post_url%',
                                    'submit_value' => 'Änderungen speichern',
                                    'post_title' => true,
                                    'post_content' => false,    
                                    'uploader' => 'basic',
                                    // 'field_groups' => array('group_5c5de08e4b57c'), //Arrenberg App
                                    'fields' => array(
                                        'field_5fc64834f0bf2', // Emoji
                                        'field_5fc647f6f0bf0', // Kurzbeschreibung
                                    ),
                                )
                            );
                        ?>

                    </div>


                    <div class="publish-form">
                        <h2>SDGs bearbeiten</h2>
                        <br>

                        <?php
                            acf_form (
                                array(
                                    'form' => true,
                                    'return' => '%post_url%',
                                    'submit_value' => 'Änderungen speichern',
                                    'post_title' => false,
                                    'post_content' => false,    
                                    'uploader' => 'basic',
                                    // 'field_groups' => array('group_5c5de08e4b57c'), //Arrenberg App
                                    'fields' => array(
                                        'field_602e74121ff45',
                                    ),
                                )
                            );
                        ?>

                    </div>

                    <h2>Projekt Löschen</h2>
                    <p>Danger zone</p>
                    <a class="button is-style-outline button-red" onclick="return confirm('Dieses Projekt entgültig löschen?')" href="<?php get_permalink(); ?>?action=delete">Projekt löschen</a>
                    
                    <!-- Backend edit link -->
                    <?php 
                    if ( current_user_can('administrator') && !isset($_GET['action']) && !$_GET['action'] == 'edit') {
                        edit_post_link(); 
                    }
                    ?>


                </div>
                <?php } ?>

            </div>


        <?php
        }

        # projekt löschen
        else if (isset($_GET['action']) && $_GET['action'] == 'delete' && is_user_logged_in() && $current_user->ID == $post->post_author) {

            # delete taxonomy (projekt)
            $term = get_term_by('slug', $post->post_name, 'projekt');
            wp_delete_term( $term->term_id, 'projekt');

            # delete post
            wp_delete_post(get_the_ID());
            wp_redirect( get_site_url() );

        }
        # post bearbeiten
        else {
            
            if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {

                ?>

                <div class="publish-form">
                    <h2>Bearbeite dein Projekt</h2>
                    <br>

                    <?php
                        acf_form (
                            array(
                                'form' => true,
                                'return' => '%post_url%',
                                'submit_value' => 'Änderungen speichern',
                                'post_title' => false,
                                'post_content' => false,    
                                'uploader' => 'basic',
                                // 'field_groups' => array('group_5c5de08e4b57c'), //Arrenberg App
                                'fields' => array(
                                    // 'field_5fc64834f0bf2', // Emoji
                                    // 'field_5fc647f6f0bf0', // Kurzbeschreibung
                                    'field_5fc647e3f0bef', // Text
                                    'field_600180493ab1a', // Bild
                                ),
                            )
                        );
                    ?>

                </div>
            
            <?php
            }

            emoji_picker_init('acf-field_5fc64834f0bf2'); // load emoji picker 

            }
        }
    }
?>

</div>

</main><!-- #site-content -->

<?php get_footer(); ?>