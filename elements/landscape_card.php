<?php

/**
 * Landscape Card
 */

?>


<div class="card landscape shadow gardient ">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
            <h3 class="card-title">
                <?php shorten_title(get_the_title(), '30'); ?>
            </h3>
            <p class="preview-text">
                <?php  get_excerpt(get_the_content(), '55'); ?>
            </p>
        </div>
        <?php the_post_thumbnail( 'preview_m' ); ?>
    </a>
</div>


