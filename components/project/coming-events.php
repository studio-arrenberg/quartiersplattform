<?php
// Aktuelle Veranstaltungen
$args_chronik = array(
    'post_type'=>'veranstaltungen', 
    'post_status'=>'publish', 
    'posts_per_page'=> 2,
    'meta_key' => 'event_date',
    'orderby' => 'rand',
    'order' => 'ASC',
    'offset' => '0', 
    'meta_query' => array(
        array(
            'key' => 'event_date', 
            'value' => date("Y-m-d"),
            'compare' => '>=', 
            'type' => 'DATE'
        )
    ),
    'tax_query' => array(
        array(
            'taxonomy' => 'projekt',
            'field' => 'slug',
            'terms' => ".$post->post_name."
        )
    )

);

$my_query = new WP_Query($args_chronik);
if ($my_query->post_count > 0) {
    ?>
        <h2><?php _e('Aktuelle Veranstaltung', 'quartiersplattform'); ?> </h2>
    <?php 
    // slider($args_chronik,'card', '1','false'); 
    get_template_part('elements/card', get_post_type());

}
?>