<?php

/**
 * 
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

<div class="<?php if (get_query_var('list-item') == false) echo 'card '; if (!is_single() && get_query_var('list-item') == false) echo 'shadow '; if (get_query_var('list-item')) echo 'list-item ';?>">
    <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
        <?php the_post_thumbnail( 'preview_m' ); ?>
        <div class="content">
            <div class="pre-title">
                <?php echo get_cpt_term_owner($post->ID, 'projekt'); ?> 
                <span class="date"><?php echo wp_date('j. F', strtotime(get_field('event_date'))); ?><span>
            </div>
                <h3 class="card-title"><?php shorten(get_the_title(), '30'); ?></h3>
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
    </a>
</div>