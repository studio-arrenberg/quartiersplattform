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
                    <?php echo __('veröffentlicht von ', 'quartiersplattform').get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                    <?php echo qp_date(get_the_date('Y-m-d'), false);  ?>
                </span>
            </a>
        </div>
    <?php } ?>

      
    <?php
        if ( !empty(get_post_thumbnail_id())) {
    ?>

        <div class="veranstaltung card landscape background-image  shadow gardient"  style="background-image: url('<?php the_post_thumbnail_url('landscape_m') ?>')"> 
            <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
                <span class="date">
                <?php
                if (get_field('event_end_date')) {
                    echo _e('Veranstaltungsreihe', 'quartiersplattform')." - ".__('bis','quartiersplattform')." ".qp_date(get_field('event_end_date'), false, get_field('event_end_time'));
                    } else {
                    echo _e('Veranstaltung', 'quartiersplattform')." - ".qp_date(get_field('event_date'));
                    }
                ?>
                </span>
                <div class="content">
                    <h3 class="heading-size-3 "><?php shorten(get_the_title(), '30'); ?></h3>
                    <?php if (get_post_status() == 'draft' && qp_project_owner()) { ?>
                        <span class="yellow-tag">Nicht Sichtbar</span>
                    <?php } ?>
                    <p class="text-size-3">
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

    <?php
        } else {
        ?>


    <div class="card shadow veranstaltung-ohne-bild">
        <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
        <span class="date">
        <?php
            if (get_field('event_end_date')) {
                echo _e('Veranstaltungsreihe', 'quartiersplattform')." - ".__('bis','quartiersplattform')." ".qp_date(get_field('event_end_date'), false, get_field('event_end_time'));
            } else {
                echo _e('Veranstaltung', 'quartiersplattform')." - ".qp_date(get_field('event_date'));
            }
            ?>
            </span>

            <div class="content">
                <h3 class="heading-size-3 small-margin-bottom">
                    <?php shorten(get_the_title(), '60'); ?>
                </h3>
                <?php visibility_badge(); ?>
                <p class="text-size-3">
                    <?php shorten(get_field('text'), 300); ?>
                </p>
            </div>
        </a>
    </div>
    <?php
        } 
        ?>


    <?php if (get_query_var( 'additional_info') ) { ?>
        <div class="after-card">
            <a href="<?php echo get_permalink( get_term_id($post->ID, 'projekt') ); ?>">
                <?php echo get_the_title( get_term_id($post->ID, 'projekt') ); ?>
                <span style="margin:-1px 0px 0px 5px"><?php the_field('emoji', get_term_id($post->ID, 'projekt')); ?></span>
            </a>
        </div>
    <?php } ?>

</div>


