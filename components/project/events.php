<?php
// Veranstaltungen
$args_chronik = array(
    'post_type'      => 'veranstaltungen',
    'post_status'    => 'publish',
    'posts_per_page' => 10,
    'tax_query'      => array(
        array(
            'taxonomy' => 'projekt',
            'field'    => 'slug',
            'terms'    => $post->post_name,
        ),
    ),
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'relation'    => 'AND',
            'date_clause' => array(
                'key'     => 'event_date',
                'value'   => date('Y-m-d'),
                'compare' => '>=',
                'type'    => 'DATE'
            ),
            'time_clause' => array(
                'key'     => 'event_time',
                'compare' => '=',
            ),
        ),
        array(
            'relation'    => 'AND',
            'end_date_clause' => array(
                'key' => 'event_end_date',
                'value' => date('Y-m-d'),
                'compare'   => '>=',
                'type' => 'DATE'
            ),
            'end_time_clause' => array(
                'key' => 'event_end_time',
                'compare'   => '=',
            ),
            'date_clause' => array(
                'key' => 'event_date',
                'value' => date('Y-m-d'),
                'compare'   => '<',
                'type' => 'DATE'
            ),
        ),
    ),
    'orderby' => array(
        'date_clause' => 'ASC',
        'time_clause' => 'ASC',
    ),
);

if (count_query($args_chronik)) {
    echo "<h3 class='margin-bottom'>" . __('Aktuelle Veranstaltung', 'quartiersplattform') . "</h3>";
    card_list($args_chronik);
}
?>
