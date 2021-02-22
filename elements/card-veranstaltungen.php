<?php

/**
 * Card => Veranstaltungen
 *
 */


// variable text length
if (strlen(get_the_title()) < 20 ) {
    $char = 75;
}
else {
    $char = 40;
}

?>

<div class="card shadow">
    <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
        <?php the_post_thumbnail( 'preview_m' ); ?>
        <div class="content">
            <div class="pre-title">
                <?php echo get_cpt_term_owner($post->ID, 'projekt'); ?> 
                <span class="date"><?php echo wp_date('j. F', strtotime(get_field('event_date'))); ?><span>
            </div>
                <h3 class="card-title"><?php shorten_title(get_the_title(), '30'); ?></h3>
                <p class="preview-text">
                    <?php 
                    if (strlen(get_field('text')) > 2) {
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