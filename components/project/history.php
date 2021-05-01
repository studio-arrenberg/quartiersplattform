<?php 
// Projektverlauf
$args_chronik = array(
    'post_type' => array('veranstaltungen', 'nachrichten'),
    'posts_per_page' => -1,
    'order_by' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => 'projekt',
            'field' => 'slug',
            'terms' => ".$post->post_name."
        )
    )
);

card_list($args_chronik);

?>