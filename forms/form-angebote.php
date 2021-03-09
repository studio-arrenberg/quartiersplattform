<?php 

acf_form_head();
get_header();

?>

<main id="site-content" role="main">
    <div class="card-container card-container__center card-container__large ">
        <div class="card bg_orange-light">
            <div class="content white-text">
                <h3 class="card-title-large">
                    Teile ein Angebot
                </h3>
                <p class="preview-text-large">
                    Biete deine Hilfe an und unterstütze dein Viertel.
                </p>
            </div>
        </div>
    </div>

    <div class="publish-form">
        <h2>Erstelle dein eigenes Angebot</h2>
        <br>

        <?php 
            acf_form(
                array(
                    'id' => 'angebote-form',
                    'post_id'=>'new_post',
                    'new_post'=>array(
                        'post_type' => 'angebote',
                        'post_status' => 'publish',
                    ),
                    'return' => get_site_url().'/gemeinsam',
                    'field_el' => 'div',
                    'post_content' => false,
                    'post_title' => false,
                    'field_groups' => array('group_5fcf55e0af4db'),
                    'submit_value'=>'Angebot senden',
                )
            ); 
        ?>

    </div>


    <?php emoji_picker_init('acf-field_5fcf563d5b576'); // load emoji picker ?>


</main><!-- #site-content -->

<?php get_footer(); ?>