<?php 

acf_form_head();
get_header();

?>

<main id="site-content" role="main">
    
    <?php 
        // Projekt Kachel
        project_card($_GET['project'], 'slug');
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
                        'post_status' => 'publish',
                    ),
                    'return' => get_site_url().'/projekte'.'/'.$_GET['project'], 
                    'field_el' => 'div',
                    'post_content' => false,
                    'post_title' => true,
                    'uploader' => 'basic',
                    'fields' => array(
                        'field_5fc8d0b28edb0', //Text
                        'field_5fc8d15b8765b', //Date
                        'field_5fc8d16e8765c', //Start AP1
                        'field_5fc8d18b8765d', //End AP1 
                        'field_5fc8d1e0d15c9', //Livestream
                        'field_608a6c2c1be28', // Sichtbar
                        'field_603f4c75747e9', //Bilder
                    ),
                    'submit_value'=>'Veranstaltung veröffentlichen',
                    'html_before_fields' => '
                    <input type="text" id="project_tax" name="project_tax" value="'.$_GET['project'].'" style="display:none;">
                    ',
                )
            ); 
        ?>
    
    </div>

</main><!-- #site-content -->

<?php get_footer(); ?>