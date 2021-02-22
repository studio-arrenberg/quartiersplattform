<?php

/**
 * Card => Projekte
 *
 * Used for both singular and index.
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
else {

}


?>



<div class="<?php if (get_query_var('list-item') == false) echo 'card '; if (!is_single() && get_query_var('list-item') == false) echo 'shadow '; if (get_query_var('list-item') === true) echo 'list-item ';?>">
    <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content content_shrink">
            <!-- <div class="pre-title">Pre-Title <span class="date">vor 30 Minuten<span></div> -->
            <h3 class="card-title">
                <?php shorten_title(get_the_title(), '60'); ?>
            </h3>
            <div class="pre-title"><?php  the_field('slogan'); // echo get_the_date('j. F'); ?></div> 

            <p class="preview-text">
                <?php  if (!empty(get_the_content())) { get_excerpt(get_the_content(), $char); } else { get_excerpt(get_field('text'), '55'); }  //echo $char?>
            
            </p>
        </div>
         <?php the_post_thumbnail( 'preview_m' ); ?>
    </a>
</div>