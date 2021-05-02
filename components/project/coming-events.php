<?php
// Anstehende Veranstaltungen
$args_chronik = array(
    'post_type'=>'veranstaltungen', 
    'post_status'=>'publish', 
    'posts_per_page'=> 2,
    'meta_key' => 'event_date',
    'orderby' => 'meta_val',
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

if (count_query($args_chronik)) {

    echo "<h3>Anstehende Veranstaltung</h3>";
    card_list($args_chronik);

}

?>