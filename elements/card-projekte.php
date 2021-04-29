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

/*

fehlt:
- badges 
    - privat / unsichtbar / Entwurf
    - mein projekt 
    - aktuell läuft eine veranstaltung
    - Bezirksvertretung
- notifications

*/

?>


<div class="card-group">

    <?php if (get_query_var( 'additional_info') && get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) { ?>
        <div class="pre-card">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                <!-- ist es möglich 'Projektupdate' oberhalb des links anzuzeigen -->
                <span>
                    <b>Projekt</b>
                    <br>
                    von <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                </span>
            </a>
        </div>
    <?php } ?>

    <div class="projekt <?php if (get_query_var('list-item') == false) echo 'card '; if (!is_single() && get_query_var('list-item') == false) echo 'shadow '; if (get_query_var('list-item')) echo 'list-item ';?>">
        <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
        <?php the_post_thumbnail( 'preview_m' ); ?>

            <div class="content align-center ">
                <span class="emoji-large"><?php  shorten(get_field('emoji'), '200'); ?></span>
                <h3 class="card-title-large">
                    <?php shorten(get_the_title(), '60'); ?>
                </h3>
                <div class="highlight"><?php  the_field('slogan'); // echo get_the_date('j. F'); ?></div> 
            </div>
        </a>
    </div>

</div>