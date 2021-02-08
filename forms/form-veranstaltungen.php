<?php 
/* 
*
* Template Name: Veranstaltung erstellen
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
                    Erstelle eine Veranstaltung
                </h3>
                <p class="preview-text-large">
                    Teile den Bewohnern in deinem Quartier mit, wann Veranstaltungen zu deinem Projekt stattfinden. <br>
                    <!-- So bleibt dein Projekt relevant und ist immer im Überblick sichtbar. -->
                    <?php // echo $_GET['project']; ?>
                </p>
            </div>
        </div>
    </div>



    <div class="publish-form">
    <br>

    <?php acf_form_head(); ?>

    <?php $hierarchical_tax = array( 1 ); ?>
    <?php acf_form(
			array(
				'id' => 'veranstaltungen-form',
				'html_before_fields' => '',
				'html_after_fields' => '',
				'label_placement'=> '',
				// 'updated_message' => __("Post updated", 'acf'),
				// 'html_updated_message'  => '<div id="message" class="updated"><h1>Hallo welt</h1></div>',
                'post_id'=>'new_post',
				'new_post'=>array(
                    'post_type' => 'veranstaltungen',
                    // 'tax_input' => array (
                    //     'version' => array( 2 )
                    // ),
                    'post_status' => 'publish',
                ),
                'return' => '%post_url%',
				'field_el' => 'div',
				'post_content' => false,
                'post_title' => true,
                'fields' => array(
                    'field_5fc8d0b28edb0', //Text
                    'field_5fc8d15b8765b', //Date
                    'field_5fc8d1e0d15c9', //Livestream
                    'field_601d9d8ac7c9b', //Bilder
                ),

                'submit_value'=>'Veranstaltung veröffentlichen',
                'html_before_fields' => '<input type="text" id="project_tax" name="project_tax" value="'.$_GET['project'].'" style="display:none;">',
			)
    ); 
    ?>


    </div>
</main><!-- #site-content -->

<?php get_footer(); ?>