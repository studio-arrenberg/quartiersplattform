<?php 

acf_form_head();
get_header();

if (!is_user_logged_in(  )) {
    exit(wp_redirect( home_url( ) ));
}

?>

<main id="site-content" class="page-grid" role="main">

	<div class="left-sidebar">
		<?php projekt_carousel(); ?>
	</div>

	<div class="main-content">

        <div class="small-projekt-card">
            <?php
                // Projekt Kachel
                project_card($_GET['project'], 'slug');
            ?>
        </div>

        <?php 

        $page = get_page_by_path($_GET['project'], OBJECT, 'projekte');
        $project_ID = $page->ID;

        if ( get_post_status( $page->ID ) != 'publish') {
            reminder_card(get_the_ID(  ).'draft', __('Projekt veröffentlichen','quartiersplattform'), __('Dein Beitrag ist zunächst nicht sichtbar, weil du zuerst das Projekt in den Projekteinstellungen veröffentlichen musst. ','quartiersplattform'));
        }

        ?>

        

        <div class="publish-form">
            
            <br>

            <?php 
                acf_form(
                    array(
                        'id' => 'nachrichten-form',
                        'post_id'=>'new_post',
                        'new_post'=>array(
                            'post_type' => 'umfragen',
                            'post_status' => 'publish',
                        ),
                        // 'return' => get_site_url().'/gemeinsam',
                        'field_el' => 'div',
                        'post_content' => false,
                        'post_title' => true,
                        'field_groups' => array('group_601855a265b19'),
                        'submit_value'=> __('Umfrage veröffentlichen','quartiersplattform'),
                        'html_before_fields' => '<input type="text" id="project_tax" name="project_tax" value="'.$_GET['project'].'" style="display:none;">',
                    )
                ); 
            ?>

        </div>
    </div>

</main><!-- #site-content -->

<?php get_footer(); ?>