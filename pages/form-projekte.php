<?php

acf_form_head();
get_header();

?>

<main id="site-content" class="page-grid" role="main">

	<div class="left-sidebar">

		<div class="hidden-small">
            <?php projekt_carousel(); ?>

		</div>


	</div>


	<div class="main-content">
    <?php
    if (is_user_logged_in(  )) {
        reminder_card(get_the_ID(  ).'draft', __('Projekt veröffentlichen','quartiersplattform'), __('Dein Projekt ist zunächst nicht öffentlich, damit du in Ruhe deine Inhalte einstellen kannst. Wenn du soweit bist, kannst du es in den Projekteinstellungen veröffentlichen.','quartiersplattform'));
	?>

    <div class="publish-form">
        <h2><?php _e('Erstelle dein eigenes Projekt', 'quartiersplattform'); ?> </h2>
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
                    'uploader' => qp_form_uploader(),
                    'post_content' => false,
                    'post_title' => true,
                    'return' => get_site_url().'/projekte',
                    'fields' => array(
                        'field_5fc64834f0bf2', // Emoji
                        'field_5fc647f6f0bf0', // Description
                    ),
                    'submit_value'=> __('Projekt erstellen','quartiersplattform'),
                    'html_before_fields' => '<input type="text" name="project_status" value="draft" style="display:none;">',
                )
            );
        ?>

    </div>

    <?php
        emoji_picker_init('acf-field_5fc64834f0bf2'); // load emoji picker
    }
    else {
        $text = __('Melde dich dich auf deiner Quartiersplattform an, um eigene Projekte, Umfragen und Veranstaltungen zu erstellen.','quartiersplattform');
		reminder_card('create-project', __('Mitglied werden im Quartier','quartiersplattform'), $text, __('Jetzt Anmelden','quartiersplattform'), home_url().'/login/');
    }
    ?>

</main><!-- #site-content -->

<?php get_footer(); ?>
