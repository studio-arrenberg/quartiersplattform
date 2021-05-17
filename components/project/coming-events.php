<?php
// Aktuelle Veranstaltungen
$args_chronik = array(
    'post_type'=>'veranstaltungen', 
    'post_status'=>'publish', 
    'posts_per_page'=> 1,
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

if (count_query($args_chronik)) {
    echo "<h3 class='margin-bottom'>".__('Aktuelle Veranstaltung', 'quartiersplattform')."</h3>";

    card_list($args_chronik);
}

?>