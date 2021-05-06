
<?php

global $current_user;
if ($current_user->ID == $post->post_author) {
    $post_status = array('publish', 'draft');
}
else {
    $post_status = array('publish');
}

// pinned project posts
$args_chronik = array(
    'post_type' => array('veranstaltungen', 'nachrichten', 'umfragen'),
    'posts_per_page' => 3,
    'order_by' => 'date',
    'post_status' => $post_status,
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

    ?>
     <h4 class="heading-size-3"><?php _e('Gepinnte Beiträge', 'quartiersplattform'); ?> </h4>
    <?php
    card_list($args_chronik);
}
?>