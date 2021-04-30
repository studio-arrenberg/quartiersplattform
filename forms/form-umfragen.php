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
                    'id' => 'nachrichten-form',
                    'post_id'=>'new_post',
                    'new_post'=>array(
                        'post_type' => 'umfragen',
                        'post_status' => 'publish',
                    ),
                    // 'return' => get_site_url().'/gemeinsam',
                    'field_el' => 'div',
                    'post_content' => false,
                    'post_title' => true,
                    'field_groups' => array('group_601855a265b19'),
                    'submit_value'=>'Umfrage veröffentlichen',
                    'html_before_fields' => '<input type="text" id="project_tax" name="project_tax" value="'.$_GET['project'].'" style="display:none;">',
                )
            ); 
        ?>

    </div>

</main><!-- #site-content -->

<?php get_footer(); ?>