<?php

/**
 * 
 * Default Card
 *
 */

?>


<div class="card shadow projekt">

    <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
    
        <div class="content">

            <h3 class="card-title">
                <?php shorten(get_the_title(), '60'); ?>
            </h3>
            <p class="preview-text">
                <?php shorten(get_the_content(), '55'); ?>
            </p>

        </div>

        <?php the_post_thumbnail( 'preview_m' ); ?>

    </a>
</div>