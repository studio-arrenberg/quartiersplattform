<?php

/**
 * Card => Veranstaltungen
 *
 */

// get projekt
$term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
$the_slug = $term_list[0]->name;
// get author
$author_id = $post->post_author;
$user = get_the_author_meta( 'display_name', $author_id );
$author = get_the_author();



// variable text length
if (strlen(get_the_title()) < 20 ) {
    $char = 75;
}
else {
    $char = 40;
}


?>

<div class="card shadow">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <?php the_post_thumbnail( 'preview_m' ); ?>
        <div class="content">
            <div class="pre-title">
                <?php echo $the_slug; ?> 
                <span class="date"><?php echo wp_date('j. F', strtotime(get_field('event_date'))); ?><span>
            </div>
                <h3 class="card-title"><?php shorten_title(get_the_title(), '30'); ?></h3>
                <p class="preview-text">
                    <?php 
                    if (get_field('text')) {
                        get_excerpt(get_field('text'), $char);
                    }
                    else {
                        get_excerpt(get_the_content(), $char);
                    }
                    ?> 
                </p>
        </div>
    </a>
</div>