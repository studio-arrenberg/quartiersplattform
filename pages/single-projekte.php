<?php

/**
 * 
 * Template Name: Projekt [Default]
 * Template Post Type: projekte
 *
 */

if (  is_user_logged_in() && $current_user->ID == $post->post_author  ) { // Execute code if user is logged in or user is the author
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

            <?php projekt_carousel(); ?>

		</div>

		
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
                <!-- emoji -->
                <div class="projekt-header-emoji">
                    <?php the_field('emoji'); ?>
                </div>

                <div class="projekt-header-content">

                    <h1 class="heading-size-1"><?php the_title(); ?></h1>
                    <h2 class="heading-size-3 highlight"><?php the_field('slogan'); ?></h2>


                </div>
            </div>



            <!-- bar -->
            <div class="filters-container">
                <div class="filters-wrapper <?php if ($current_user->ID == $post->post_author) { ?> tabs-3 <?php } ?>">
                    <div class="filter-tabs  ">
                        <button class="filter-button filter-active " data-value="summary" data-translate-value="0">
                            <?php _e('Übersicht', 'quartiersplattform'); ?>
                        </button>
                        <button class="filter-button" data-value="posts" data-translate-value="100%">
                            <?php _e('Chronik', 'quartiersplattform'); ?>
                        </button>

                        <?php if ($current_user->ID == $post->post_author) { ?>
                            <button class="filter-button" data-value="settings" data-translate-value="200%">
                                <?php _e('Einstellungen', 'quartiersplattform'); ?>
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
            <div class="bar-content">
                <div id="summary" class="bar bar-active">

                     <!-- Bild -->
                     <img class="single-header-image" src="<?php echo esc_url( $image_url ) ?>" />


                    <?php 
                    // project is not public
                    if (get_post_status() == 'draft' && $current_user->ID == $post->post_author) {
                        reminder_card('warning', __('Dein Projekt ist nicht öffentlich sichtbar.','quartiersplattform'), '');
                    }
                    // echo get_the_ID(  );

                    // Toolbox
                    get_template_part( 'components/project/toolbox' );

                    // Aktuelle Events
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
                    get_template_part('components/general/map-card');


                    // Pin Project to Landing Page
                    if ( current_user_can('administrator') ) {
                        pin_toggle('pin_main'); 
                    }

                    ?>
                    
                </div>


                <div id="posts" class="bar bar-hidden">
                    <?php get_template_part( 'components/project/history' ); ?>
                </div>


                <?php if ($current_user->ID == $post->post_author) { ?>
                <div id="settings" class="bar bar-hidden">

                    <?php visibility_toggle( get_the_ID(  ) ); ?>


                    <div class="publish-form">
                        <h3><?php _e('Bearbeite dein Projekt', 'quartiersplattform'); ?> </h3>
                        <br>

                        <?php
                            acf_form (
                                array(
                                    'form' => true,
                                    'return' => '%post_url%',
                                    'submit_value' => __('Änderungen speichern','quartiersplattform'),
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

                            emoji_picker_init('acf-field_5fc64834f0bf2');
                        ?>

                    </div>

                    <?php if ( current_user_can('administrator') ) { ?>
                        <div class="publish-form margin-bottom">
                            <h3><?php _e('Ziele für nachhaltige Entwicklung bearbeiten', 'quartiersplattform'); ?></h3>
                            <br>
                                <?php
                                    acf_form (
                                        array(
                                            'form' => true,
                                            'return' => '%post_url%',
                                            'submit_value' => __('Änderungen speichern','quartiersplattform'),
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

                    <?php } ?>


                    <div class="delete-box margin-bottom">

                    <h3><?php _e('Projekt löschen', 'quartiersplattform'); ?></h3>
                        <p class="small-margin-bottom"><?php _e('Nur Öffentliche Projekte können gelöscht werden. Alle Projektinhalte werden unwiederruflich gelöscht.', 'quartiersplattform'); ?></p>
                        <a class="button is-style-outline button-red" onclick="return confirm('<?php _e('Dieses Projekt endgültig löschen?', 'quartiersplattform'); ?>')" href="<?php get_permalink(); ?>?action=delete">
                        <?php _e('Projekt löschen', 'quartiersplattform'); ?></a>
                </div>
                    <?php qp_backend_edit_link(); ?>


                </div>
                <?php } ?>

            </div>


        <?php
        }

        # projekt löschen
        else if (isset($_GET['action']) && $_GET['action'] == 'delete' && is_user_logged_in() && $current_user->ID == $post->post_author) {
            
            // delete all taxnomied posts
            $p_posts = get_posts( array(
                'post_type' => array('veranstaltungen', 'nachrichten', 'umfragen'),
                'posts_per_page' => -1,
                'order_by' => 'date',
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'projekt',
                        'field' => 'slug',
                        'terms' => ".$post->post_name."
                    )
                )
            ) );
 
            foreach ( $p_posts as $s_post ) {
                wp_delete_post( $s_post->ID, true); // Set to False if you want to send them to Trash.
            }

            # delete post
            wp_delete_post( get_the_ID() );
            wp_redirect( get_site_url() );

        }
        # post bearbeiten
        else {
            
            if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {

                ?>

                <div class="publish-form">
                    <h2><?php _e('Bearbeite dein Projekt', 'quartiersplattform'); ?></h2>
                    <br>

                    <?php
                        acf_form (
                            array(
                                'form' => true,
                                'return' => '%post_url%',
                                'submit_value' => __('Änderungen speichern','quartiersplattform'),
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

            // emoji_picker_init('acf-field_5fc64834f0bf2'); // load emoji picker 

            }
        }
    }
?>

</div>
</div>

</main><!-- #site-content -->

<?php get_footer(); ?>