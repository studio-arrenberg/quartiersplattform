<?php

acf_form_head();
get_header();

?>

<main id="site-content" role="main">
<div class="card-container card-container__center card-container__large ">
        <div class="card bg_green">
            <div class="content white-text">
                <h3 class="card-title-large">
                    Veröffentliche dein Projekt auf der Quartiersplattform 
                </h3>
                <p class="preview-text-large">
                    Profitiere von der Community! <br>
                </p>
            </div>
        </div>
	</div>
	
    <div class="publish-form">
        <h2>Erstelle dein eigenes Projekt</h2>
        <br>

        <?php 
            acf_form(
                array(
                    'id' => 'projekte-form',         
                    'post_id'=>'new_post',
                    'new_post'=>array(
                        'post_type' => 'projekte',
                        'post_status' => 'publish',
                    ),
                    'field_el' => 'div',
                    'uploader' => 'basic',
                    'post_content' => false,
                    'post_title' => true,
                    'return' => get_site_url().'/projekte',
                    'field_groups' => array('group_5c5de08e4b57c'),
                    'submit_value'=>'Projekt veröffentlichen',
                )
            ); 
        ?>

    </div>

    <?php emoji_picker_init('acf-field_5fc64834f0bf2'); // load emoji picker ?>

</main><!-- #site-content -->

<?php get_footer(); ?>