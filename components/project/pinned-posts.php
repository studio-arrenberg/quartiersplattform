<h4><?php _e('Gepinnte Beiträge:', 'quartiersplattform'); ?> </h4>
<?php
// pinned project posts
$args_chronik = array(
    'post_type' => array('veranstaltungen', 'nachrichten'),
    'posts_per_page' => -1,
    'order_by' => 'date',
    'order' => 'DESC',
    'meta_key'   => 'pin_project',
    'meta_value' => 'true'
);

card_list($args_chronik);
?>