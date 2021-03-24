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

<div class="veranstaltung card landscape shadow gardient ">

    <?php   
    if (get_query_var('link_card_link')) {
        ?>
            <a class="card-link" href="<?php echo get_site_url(); echo get_query_var('link_card_link'); ?>">
        <?php
    }
    else {
        ?>
            <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
        <?php
    }
    ?>

<span class="date"><?php echo qp_date(get_field('event_date')); ?></span>

        <div class="content">
            <div class="pre-title">
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
        <?php the_post_thumbnail( 'landscape_s' ); ?>
    </a>
</div>


