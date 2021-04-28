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

    <?php 
        reminder_card(get_the_ID(  ).'draft', 'Projekt veröffentlichen', 'Dein Projekt ist noch nicht öffentlich. Du kannst dein Projekt in den Einstellungen veröffentlichen');
	?>

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
                    'post_content' => true,
                    'post_title' => true,
                    'return' => get_site_url().'/projekte',
                    'fields' => array(
                        'field_5fc64834f0bf2', // Emoji
                        'field_5fc647f6f0bf0', // Kurzbeschreibung
                    ),
                    'submit_value'=>'Projekt veröffentlichen',
                    'html_before_fields' => '<input type="text" name="project_status" value="draft" style="display:none;">',
                )
            ); 
        ?>

    </div>

    <?php emoji_picker_init('acf-field_5fc64834f0bf2'); // load emoji picker ?>

</main><!-- #site-content -->

<?php get_footer(); ?>