<?php 
// Projektverlauf
global $current_user;
if ($current_user->ID == $post->post_author) {
    $post_status = array('publish', 'draft');
}
else {
    $post_status = array('publish');
}


$args_chronik = array(
    'post_type' => array('veranstaltungen', 'nachrichten', 'umfragen'),
    'posts_per_page' => -1,
    'post_status' => $post_status,
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

if(!count_query($args_chronik) && $current_user->ID != $post->post_author){
    // card for visitors
    $text = __("Es wurden bisher noch keine Projektupdates veröffentlicht. Schaue später vorbei, um auf dem Laufenden zu bleiben.",'quartiersplattform');
    no_content_card("", __("Es wurden noch keine Beiträge veröffentlicht",'quartiersplattform'), $text, $link_text = '', $link_url = '');
}
else if (!count_query($args_chronik) && $current_user->ID == $post->post_author) {
    // card for project owner
    $text = __("Du hast bisher noch keine Projektupdates veröffentlicht. Du kannst Nachrichten, Veranstaltungen und Umfragen veröffentlichen, um die Menschen in deinem Quartier über das Projekt zu informieren.",'quartiersplattform');
    no_content_card("", __("Du hast noch keine Beiträge veröffentlicht",'quartiersplattform'), $text, $link_text = '', $link_url = '');
}



?>