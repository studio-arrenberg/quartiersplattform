<?php

// anstehende veranstaltungen
$veranstaltungen = array(
    'post_type'=>'veranstaltungen', 
    'post_status'=>'publish', 
    'posts_per_page'=> 20,
    'meta_key' => 'event_date',
    'orderby' => 'meta_value_num',
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

        <h4 class="heading-size-3"><?php _e('Anstehende Veranstaltungen', 'quartiersplattform'); ?> </h4>
        <br>
        <?php card_list($veranstaltungen); 
        if(count_query($veranstaltungen)){
            $text = "Wenn du eine Kulturveranstaltung oder eine Feier in deiner Nachbarschaft veranstaltest, kannst du sie hier veröffentlichen um mehr Besucher zu erhalten. Wenn deine Veranstaltung nur Online stattfindet, kannst du einen Livestream Link veröffentlichen.";
		    no_content_card("􀉊", "Hier gibt es leider noch keine Veranstaltungen.", $text, $link_text = 'Veranstaltung erstellen', $link_url = "");
        }
        ?>

    <?php            
}
else {
    // keine veranstaltungen
    // funktion ..?
    _e('Hier gibt es leider noch keine Veranstaltungen.', 'quartiersplattform');
}

?>