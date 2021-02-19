<?php 
/* 
*
* Template Name: Angebot erstellen
*
*/
acf_form_head();
get_header();
?>

<main id="site-content" role="main">
    <div class="card-container card-container__center card-container__large ">
        <div class="card bg_red">
            <div class="content white-text">
                <h3 class="card-title-large">
                    Erstelle eine Nachricht <?php if ($_GET['project']) echo "für ".get_page_by_path( $_GET['project'], OBJECT, 'projekte' )->post_title; ?>
                </h3>
                <p class="preview-text-large">
                    Halte deine Community auf dem Laufdenden und teile deine Neuigkeiten. <br>
                    <!-- So bleibt dein Projekt relevant und ist immer im Überblick sichtbar. -->
                    <?php // echo $_GET['project']; ?>
                </p>
            </div>
        </div>
    </div>



    <div class="publish-form">
    <h2>Erstelle eine Nachricht</h2>
    <br>

    <?php acf_form_head(); ?>
    <?php // acf_form('feedback-form'); ?>

    <?php $hierarchical_tax = array( 1 ); ?>
    <?php acf_form(
			array(
				'id' => 'nachrichten-form',
				'html_before_fields' => '',
				'html_after_fields' => '',
				'label_placement'=> '',
				// 'updated_message' => __("Post updated", 'acf'),
				// 'html_updated_message'  => '<div id="message" class="updated"><h1>Hallo welt</h1></div>',
                'post_id'=>'new_post',
				'new_post'=>array(
                    'post_type' => 'nachrichten',
                    // 'tax_input' => array (
                    //     'version' => array( 2 )
                    // ),
                    'post_status' => 'publish',
                ),
                'return' => get_site_url().'/gemeinsam', // post gets dublicated
				'field_el' => 'div',
				'post_content' => false,
                'uploader' => 'basic',
                'post_title' => true,
                'field_groups' => array('group_5c5de02092e76'), //Arrenberg App
                'submit_value'=>'Nachricht veröffentlichen',
                'html_before_fields' => '<input type="text" id="project_tax" name="project_tax" value="'.$_GET['project'].'" style="display:none;">',
			)
    ); 
    ?>


    </div>
</main><!-- #site-content -->

<?php get_footer(); ?>