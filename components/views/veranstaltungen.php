<?php

// Aktuelle veranstaltungen
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

        <h4 class="heading-size-3"><?php _e('Aktuelle Veranstaltungen', 'quartiersplattform'); ?> </h4>
        <br>
        <?php card_list($veranstaltungen); 
        
        ?>

    <?php            
}
else {
    $text = __("Wenn du eine Kulturveranstaltung oder eine Feier in deiner Nachbarschaft veranstaltest, kannst du sie hier veröffentlichen, um die Menschen in deiner Nachbarschaft kennen zu lernen.",'quartiersplattform');
    no_content_card("", __("Momentan gibt es noch keine Veranstaltungen",'quartiersplattform'), $text, $link_text = __('Veranstaltung erstellen','quartiersplattform'), $link_url = "");
}

?>