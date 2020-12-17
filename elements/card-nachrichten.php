<?php

/**
 * Card => Nachrichten
 *
 */

// get projekt
$term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
$the_slug = $term_list[0]->name;

// variable text length
if (strlen(get_the_title()) < 15 ) {
    $char = 80;
}
else {
    $char = 60;
}

?>

<div class="card shadow nachricht">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
            <div class="pre-title"> <span class="date"><?php echo $the_slug; // echo get_the_date('j. F'); ?><span></div> 
            <h3 class="card-title">
                <?php shorten_title(get_the_title(), '60'); ?>
            </h3>
            <p class="preview-text">
                <?php  get_excerpt(get_the_content(), $char); ?>
            </p>
        </div>
        <?php the_post_thumbnail( 'preview_m' ); ?>
    </a>
</div>