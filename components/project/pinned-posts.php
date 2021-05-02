<h4><?php _e('Gepinnte Beiträge:', 'quartiersplattform'); ?> </h4>
<?php
// pinned project posts
$args_chronik = array(
    'post_type' => array('veranstaltungen', 'nachrichten', 'umfragen'),
    'posts_per_page' => 3,
    'order_by' => 'date',
    'order' => 'DESC',
    'meta_key'   => 'pin_project',
    'meta_value' => 'true',
    'tax_query' => array(
        array(
            'taxonomy' => 'projekt',
            'field' => 'slug',
            'terms' => ".$post->post_name."
        )
    )
);

if (count_query($args_chronik)) {

    echo "<h3>Pinned</h3>";
    card_list($args_chronik);

}


?>