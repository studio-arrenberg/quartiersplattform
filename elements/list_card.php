<?php

/**
 * 
 * Default List Card
 * 
 */

// variable text length
if (strlen(get_the_title()) < 35 ) {
    $char = 90;
}
else {
    $char = 56;
}
?>

<div class="list-item">
    <?php the_post_thumbnail( 'preview_m' ); ?>
    <div class="content">
        <h3 class="card-title">
            <?php shorten(get_the_title(), '30'); ?>
        </h3>
        <p class="preview-text">
            <?php  
            if (strlen(get_field('text')) > 2) {
                shorten(get_field('text'), $char);
            }
            else {
                shorten(get_the_content(), $char);
            }
            ?>
        </p>
    </div>
</div>
