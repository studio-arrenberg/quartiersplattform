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
- pinned

*/

?>


<div class="card-group">
    <?php if (get_query_var( 'additional_info') && get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) { ?>
        <div class="pre-card">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                <!-- ist es möglich 'Projektupdate' oberhalb des links anzuzeigen -->
                <span>
                    <b><?php _e('Projekt', 'quartiersplattform'); ?> </b>
                    <br>
                    <?php _e('von ', 'quartiersplattform'); ?>  <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                    <?php echo qp_date(get_the_date('Y-m-d H:i:s'), false); ?>
                </span>
            </a>
        </div>
    <?php } ?>

        <div class="projekt  background-image 
        <?php
                    if (empty(get_field('emoji'))) {
                     echo 'blur' ;
                    }
                ?>
                    <?php if (get_query_var('list-item') == false) echo 'card '; if (!is_single() && get_query_var('list-item') == false) echo 'shadow '; if (get_query_var('list-item')) echo 'list-item ';?>" style="background-image: url('<?php
                    if (empty(get_field('emoji'))) {
                        the_post_thumbnail_url('landscape_s' ); 
                    }
                ?>'); ">
            <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
            <div class="content align-center">
                <span class="emoji-large"><?php  shorten(get_field('emoji'), '200'); ?></span>
                <h3 class="heading-size-3">
                    <?php shorten(get_the_title(), '60'); ?>
                </h3>
                <h4 class="text-size-3 highlight"><?php  the_field('slogan'); // echo get_the_date('j. F'); ?></h4> 
                <?php visibility_badge(); ?>
            </div>

        </a>
    </div>
</div>