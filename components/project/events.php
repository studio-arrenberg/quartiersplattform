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
    'meta_query'     => array(
        'relation' => 'AND',
        array(
            'relation' => 'OR',
            array(
                'key'     => 'event_date',
                'value'   => date('Y-m-d'),
                'compare' => '>=',
                'type'    => 'DATE'
            ),
            array(
                'relation' => 'AND',
                array(
                    'key'     => 'event_date',
                    'value'   => date('Y-m-d'),
                    'compare' => '<',
                    'type'    => 'DATE'
                ),
                array(
                    'relation' => 'OR',
                    array(
                        'key'     => 'event_end_date',
                        'value'   => date('Y-m-d'),
                        'compare' => '>=',
                        'type'    => 'DATE'
                    ),
                    array(
                        'key'     => 'event_end_date',
                        'value'   => '',
                        'compare' => '=',
                    ),
                ),
            ),
        ),
        array(
            'key'     => 'event_time',
            'compare' => 'EXISTS',
        ),        
    ),
    'orderby' => array(
        'event_date'     => 'ASC',
        'meta_value_num' => 'ASC',
        'meta_key'       => 'event_end_date',
        'event_time'     => 'ASC',
        'ID'             => 'ASC'
    ),
);

if (count_query($args_chronik)) {
    echo "<h3 class='margin-bottom'>" . __('Aktuelle Veranstaltung', 'quartiersplattform') . "</h3>";

    card_list($args_chronik);
}
?>
