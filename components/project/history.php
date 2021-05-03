<?php 
// Projektverlauf
$args_chronik = array(
    'post_type' => array('veranstaltungen', 'nachrichten', 'umfragen'),
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

if(!count_query($args4)){
    $text = __("Es wurden bisher noch keine Projektupdates veröffentlicht. Schaue später vorbei, um auf dem Laufenden zu bleiben.",'quartiersplattform');
    no_content_card("􀌤", __("Es wurden noch keine Beiträge veröffentlicht",'quartiersplattform'), $text, $link_text = '', $link_url = '');
}


?>