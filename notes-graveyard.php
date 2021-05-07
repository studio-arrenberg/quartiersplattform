
<!-- <button class="button" onclick="add_project();">Projekt anlegen</button>
<div class="add_project">Hi</div>
<script>
    function add_project() {
        // alert('add projekt');
        var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";

        var data = {
            'action': 'add_project',
            'request': 1,
            _ajax_nonce: '<?php echo wp_create_nonce( 'my_ajax_nonce' ); ?>'
        };

        $.ajax({
            url: ajax_url,
            type: 'post',
            data: data,
            dataType: 'html',
            success: function(response){
                console.log(response);
                $('div.add_project').html(response);
                acf.do_action('append', $('div.add_project'));
            }
        });
    }
</script> -->

<?php 
/**
 * Add Project (ajax)
 *
 * @since Quartiersplattform 1.7
 * 
 * @return string
 */
// function add_project_callback() {

// 	check_ajax_referer('my_ajax_nonce');

// 	echo "<h1>erstelle dein project</h1>";

// 	acf_form(
// 		array(
// 			'id' => 'projekte-form',         
// 			'post_id'=>'new_post',
// 			'new_post'=>array(
// 				'post_type' => 'projekte',
// 				'post_status' => 'publish',
// 			),
// 			'field_el' => 'div',
// 			'uploader' => 'basic',
// 			'post_content' => false,
// 			'post_title' => true,
// 			'return' => get_site_url().'/projekte',
// 			'fields' => array(
// 				'field_5fc64834f0bf2', // Emoji
// 				'field_5fc647f6f0bf0', // Kurzbeschreibung
// 			),
// 			'submit_value'=>'Projekt veröffentlichen',
// 			'html_before_fields' => '<input type="text" name="project_status" value="draft" style="display:none;">',
// 		)
// 	); 

// 	emoji_picker_init('acf-field_5fc64834f0bf2');


// 	wp_die(); 
// 	return;

// } 
// add_action( 'wp_ajax_add_project', 'add_project_callback' );
// add_action( 'wp_ajax_nopriv_add_project', 'add_project_callback' );

?>