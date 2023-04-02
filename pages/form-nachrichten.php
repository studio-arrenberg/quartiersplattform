<?php

acf_form_head();
get_header();


if ( qp_project_owner($_GET['project']) == false ) {
    exit( wp_redirect( home_url( ).'/projekte/' ) );
}

?>

<main id="site-content" class="page-grid" role="main">

    <div class="left-sidebar">
		<?php projekt_carousel(); ?>
	</div>

    <div class="main-content">

            <?php
            // Projekt Kachel
            project_card($_GET['project'], 'slug');
            if (!isset($_GET['project'])) {
                reminder_card('warning', __('Projekt konnte nicht verknüpft werden','quartiersplattform'), __('Das formular konnte nicht mit einem Projekt verknüft werden. Versuche es noch mal.','quartiersplattform'), 'Projekte', home_url( ).'/projekte/');
            }
            ?>


        <?php

        if (isset($_GET['project'])) {

            $page = get_page_by_path($_GET['project'], OBJECT, 'projekte');
            $project_ID = $page->ID;
            $status = get_post_status($page->ID);

            if ( $status != 'publish') {
                reminder_card(get_the_ID(  ).'draft', __('Projekt veröffentlichen','quartiersplattform'), __('Dein Beitrag ist zunächst nicht sichtbar, weil du zuerst das Projekt in den Projekteinstellungen veröffentlichen musst. ','quartiersplattform'));
            }

            ?>

            <div class="publish-form">

                <h2><?php _e('Erstelle eine Nachricht', 'quartiersplattform'); ?> </h2>
                <br>

                <?php
                    acf_form(
                        array(
                            'id' => 'nachrichten-form',
                            'post_id'=>'new_post',
                            'new_post'=>array(
                                'post_type' => 'nachrichten',
                                'post_status' => $status,
                            ),
                            'return' => get_site_url().'/gemeinsam',
                            'field_el' => 'div',
                            'post_content' => false,
                            'uploader' => qp_form_uploader(),
                            'post_title' => true,
                            'field_groups' => array('group_5c5de02092e76'),
                            'submit_value'=> __('Nachricht veröffentlichen','quartiersplattform'),
                            'html_before_fields' => '<input type="text" id="project_tax" name="project_tax" value="'.$_GET['project'].'" style="display:none;">',
                        )
                    );

                ?>
            </div>
        <?php } ?>
    </div>


</main><!-- #site-content -->

<?php get_footer(); ?>
