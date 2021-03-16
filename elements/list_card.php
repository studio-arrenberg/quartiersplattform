<?php

/**
 * 
 * Default List Card
 * 
 */

?>

<div class="list-item">
    <?php the_post_thumbnail( 'preview_m' ); ?>
    <div class="content">
        <h3 class="card-title">
            <?php shorten(get_the_title(), '30'); ?>
        </h3>
        <p class="preview-text">
            <?php shorten(get_the_content(), '55'); ?>
        </p>
    </div>
</div>