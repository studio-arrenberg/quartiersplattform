<?php 

acf_form_head();
get_header();

?>

<main id="site-content" role="main">
    <div class="card-container card-container__center card-container__large ">
        <div class="card bg_orange-dark">
            <div class="content white-text">
                <h3 class="card-title-large">
                    Stelle eine Frage an dein Quartier!
                </h3>
                <p class="preview-text-large">
                    Wie können wir dich unterstützen?
                </p>
            </div>
        </div>
    </div>

    <div class="publish-form">
        <h2>Was möchtest du wissen?</h2>
        <br>

        <?php 

        acf_form(
            array(
                'form' => true,
                'id' => 'fragen-form',
                'html_before_fields' => '',
                'html_after_fields' => '',
                'label_placement'=> '',                
                'post_id'=>'new_post',
                'new_post'=>array(
                    'post_type' => 'fragen',
                    'post_status' => 'publish',
                ),
                'field_el' => 'div',
                'post_content' => false,
                'post_title' => false,
                'submit_value'=>'Frage veröffentlichen',
                'return' => get_site_url().'/gemeinsam', 
                'field_groups' => array('group_5fcf56cd99219'),
                
            )
        ); 

        ?>

    </div>

    <?php emoji_picker_init('acf-field_5fcf56cd9e356'); // load emoji picker ?>


</main><!-- #site-content -->

<?php  get_footer(); ?>