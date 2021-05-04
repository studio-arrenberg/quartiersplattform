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

<div class="card-group">

    <?php if (get_query_var( 'additional_info') && get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) { ?>
        <div class="pre-card">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                <!-- ist es möglich 'Projektupdate' oberhalb des links anzuzeigen -->
                <span>
                    <b><?php _e('Veranstaltung', 'quartiersplattform'); ?> </b>
                    <br>
                    <?php _e('von ', 'quartiersplattform'); ?><?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                    <?php echo qp_date(get_the_date('Y-m-d'), false);  ?>
                </span>
            </a>
        </div>
    <?php } ?>


    <div class="veranstaltung card landscape shadow gardient ">
        <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
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

    <?php if (get_query_var( 'additional_info') ) { ?>
        <div class="after-card">
            <a href="<?php echo get_permalink( get_term_id($post->ID, 'projekt') ); ?>">
                <?php echo get_the_title( get_term_id($post->ID, 'projekt') ); ?>
                <span style="margin:-1px 0px 0px 5px"><?php the_field('emoji', get_term_id($post->ID, 'projekt')); ?></span>
            </a>
        </div>
    <?php } ?>

</div>


