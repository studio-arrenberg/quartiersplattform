<?php
// Aktuelle Veranstaltungen
$args_chronik = array(
    'post_type' => 'veranstaltungen', 
    'post_status' => 'publish', 
    'posts_per_page' => 10,
    'offset' => '0', 
    'meta_query' => array(
        'relation' => 'OR', // change relation to OR
        'date_clause' => array(
            'key' => 'event_date',
            'value' => date("Y-m-d"),
            'compare' => '>=',
            'type' => 'DATE'
        ),
        array(
            'key' => 'event_end_date',
            'value' => date("Y-m-d"),
            'compare' => '>=',
            'type' => 'DATE'
        ),
        'time_clause' => array(
            'key' => 'event_time',
            'compare' => '=',
        )
    ),
    'orderby' => array(
        'date_clause' => 'ASC',
        'time_clause' => 'ASC',
    ),
    'tax_query' => array(
        'taxonomy' => 'projekt',
        'field' => 'slug',
        'terms' => ".$post->post_name."
    )
);

if (count_query($args_chronik)) {
    echo "<h3 class='margin-bottom'>" . __('Aktuelle Veranstaltung', 'quartiersplattform') . "</h3>";

    card_list($args_chronik);
}
?>
