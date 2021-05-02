<?php

// anstehende veranstaltungen
$veranstaltungen = array(
    'post_type'=>'veranstaltungen', 
    'post_status'=>'publish', 
    'posts_per_page'=> 20,
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
    )
);

if (count_query($veranstaltungen)) {
    set_query_var( 'additional_info', false);
    ?>

        <h4><?php _e('Anstehende Veranstaltungen', 'quartiersplattform'); ?> </h4>
        <?php card_list($veranstaltungen); ?>

    <?php            
}
else {
    // keine veranstaltungen
    // funktion ..?
    _e('Hier gibt es leider noch keine Veranstaltungen.', 'quartiersplattform');
}

?>