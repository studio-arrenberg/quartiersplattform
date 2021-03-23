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


<div class="card-group">
    <div class="pre-card">
        <b>Neues Projekt</b><?php if( get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) echo "<br> von ".get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?></span>
    </div>
    <div class="<?php if (get_query_var('list-item') == false) echo 'card  card-center '; if (!is_single() && get_query_var('list-item') == false) echo 'shadow '; if (get_query_var('list-item')) echo 'list-item ';?>">
        <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
            <?php the_post_thumbnail( 'preview_m' ); ?>

            <div class="content ">
                <!-- <div class="pre-title">Pre-Title <span class="date">vor 30 Minuten<span></div> -->
                <h3 class="card-title-large">
                    <?php shorten(get_the_title(), '60'); ?>
                </h3>
                <div class="pre-title"><?php  the_field('slogan'); // echo get_the_date('j. F'); ?></div> 

                <p class="preview-text <?php  if (strlen(get_field('slogan')) > 30 ) echo 'hidden'; ?> "> 
                    <?php  
                    if (!empty(get_the_content())) { 
                        shorten(get_the_content(), $char); 
                    } 
                    else { 
                        shorten(get_field('text'),  $char); 
                    }
                    ?>
                </p>
            </div>
        </a>
    </div>

</div>