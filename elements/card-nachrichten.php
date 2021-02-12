<?php

/**
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
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
            <div class="pre-title"> <?php echo get_cpt_term_owner($post->ID, 'projekt'); ?><span class="date"><?php  echo get_the_date('j. F'); ?><span></div> 
            <h3 class="card-title">
                <?php shorten_title(get_the_title(), '60'); ?>
                <?php //echo strlen(get_the_title()) ?>
            </h3>
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
        <?php the_post_thumbnail( 'preview_m' ); ?>
    </a>
</div>