<?php

/**
 * 
 * Card => Nachrichten
 *
 */

// variable text length
if (strlen(get_the_title()) < 35 ) {
    $char = 90;
}
else {
    $char = 56;
}

// variable text length
if (strlen($the_slug < 1 )) {
    $char = 40;
}

?>

<div class="card shadow nachricht">
    <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content content_shrink">
            <div class="pre-title">
                <span><?php echo get_cpt_term_owner($post->ID, 'projekt'); ?></span>
                <span class="date">
                    <?php  echo qp_date(get_the_date('Y-m-d')); ?>
                <span>
            </div> 
            <h3 class="card-title">
                <?php shorten(get_the_title(), '60'); ?>
                <?php //echo strlen(get_the_title()) ?>
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
        <?php the_post_thumbnail( 'preview_m' ); ?>
    </a>
</div>