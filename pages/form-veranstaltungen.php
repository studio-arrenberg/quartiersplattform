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

            if ( get_post_status( $page->ID ) != 'publish') {
                reminder_card(get_the_ID(  ).'draft', __('Projekt veröffentlichen','quartiersplattform'), __('Dein Beitrag ist zunächst nicht sichtbar, weil du zuerst das Projekt in den Projekteinstellungen veröffentlichen musst. ','quartiersplattform'));
            }

            ?>

            <div class="publish-form">

                <br>

                <?php 
                    acf_form(
                        array(
                            'id' => 'veranstaltungen-form',
                            'html_before_fields' => '',
                            'html_after_fields' => '',
                            'label_placement'=> '',
                            'post_id'=>'new_post',
                            'new_post'=>array(
                                'post_type' => 'veranstaltungen',
                                'post_status' => $status,
                            ),
                            'return' => get_site_url().'/projekte'.'/'.$_GET['project'], 
                            'field_el' => 'div',
                            'post_content' => false,
                            'post_title' => true,
                            'uploader' => qp_form_uploader(),
                            'fields' => array(
                                'field_5fc8d0b28edb0', //Beschreibung
                                'field_5fc8d15b8765b', //Date
                                'field_5fc8d16e8765c', //Start AP1
                                'field_5fc8d18b8765d', //End AP1
                                'field_5fc8d1ae96113', //EndDate
                                'field_5fc8d1e0d15c9', //Livestream
                                'field_5fc8d1f4d15ca', //Ticket
                                'field_5fc8d1c4d15c8', //Website
                                'field_608a6c2c1be28', //Sichtbar
                                'field_603f4c75747e9', //Bilder
                            ),
                            'submit_value'=> __('Veranstaltung veröffentlichen','quartiersplattform'),
                            'html_before_fields' => '<input type="text" id="project_tax" name="project_tax" value="'.$_GET['project'].'" style="display:none;">',
                        )
                    ); 
        }
        ?>
        
        </div>
    </div>
    </div>

</main><!-- #site-content -->

<?php get_footer(); ?>
