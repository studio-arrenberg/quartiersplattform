<?php

/**
 * 
 * Card => Projekte
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
if (strlen(get_field('slogan')) > 1 ) {
    $char = 50;
}

?>


<!-- <div class="<?php //if (get_query_var('list-item') == false) echo 'card '; if (!is_single() && get_query_var('list-item') == false) echo 'shadow '; if (get_query_var('list-item') === true) echo 'list-item ';?> card-center"> -->
<div class="card shadow card-center">
    <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
        <?php the_post_thumbnail( 'preview_m' ); ?>
        <div class="content ">
            <div class="emojis-top">
                 <?php  shorten_title(get_field('emoji'), '200'); ?>
            </div>
            <!-- <div class="pre-title">Pre-Title <span class="date">vor 30 Minuten<span></div> -->
            <h3 class="card-title">
                <?php shorten_title(get_the_title(), '60'); ?>
            </h3>
            <div class="pre-title"><?php  the_field('slogan'); // echo get_the_date('j. F'); ?></div> 

            <!-- <p class="preview-text <?php // if (strlen(get_field('slogan')) > 30 ) echo 'hidden'; ?> "> 
                <?php // if (!empty(get_the_content())) { get_excerpt(get_the_content(), $char); } else { get_excerpt(get_field('text'),  $char); }  //echo $char?>
            </p> -->
        </div>
    </a>
</div>