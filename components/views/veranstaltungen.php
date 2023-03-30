<?php

// Aktuelle veranstaltungen
$veranstaltungen = array(
    'post_type'=>'veranstaltungen', 
    'post_status'=>'publish', 
    'posts_per_page'=> -1,
    'offset' => '0', 
    'meta_query' =>
    array(
        'relation' => 'OR',
        'date_clause' =>
        array(
            'key' => 'event_end_date',
            'value' => date("Y-m-d"),
            'compare'	=> '>=',
            'type' => 'DATE'
        ),
        array(
            'key' => 'event_date',
            'value' => date("Y-m-d"),
            'compare'   => '>=',
            'type' => 'DATE'
        ),
    ),
    'time_clause' =>
    array(
        'key' => 'event_time',
        'compare'	=> '=',
    ),
    'orderby' =>
    array(
        'date_clause' => 'ASC',
        'time_clause' => 'ASC',
    ),
);

if (count_query($veranstaltungen)) {
    set_query_var( 'additional_info', false);
    ?>

        <h1 class="heading-size-3 margin-bottom"><?php _e('Aktuelle Veranstaltungen', 'quartiersplattform'); ?> </h1>
        <?php card_list($veranstaltungen); 
        
        ?>

    <?php            
}
else {
    $text = __("Wenn du eine Kulturveranstaltung oder eine Feier in deiner Nachbarschaft organisierst, kannst du sie hier veröffentlichen, um die Menschen in deiner Nachbarschaft kennen zu lernen und mit ihnen in Kontakt zu treten.",'quartiersplattform');
    no_content_card("calendar-badge-plus", __("Momentan gibt es keine Veranstaltungen",'quartiersplattform'), $text, $link_text = __('Veranstaltung erstellen','quartiersplattform'), $link_url = "");
}

?>
