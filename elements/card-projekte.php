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
    <?php if (get_query_var( 'additional_info') && get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) { ?>
        <div class="pre-card">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                <!-- ist es möglich 'Projektupdate' oberhalb des links anzuzeigen -->
                <span>
                    <b><?php _e('Projekt', 'quartiersplattform'); ?> </b>
                    <br>
                    <?php echo __('veröffentlicht von ', 'quartiersplattform').get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                    <?php echo qp_date(get_the_date('Y-m-d H:i:s'), false); ?>
                </span>
            </a>
        </div>
    <?php } ?>


          
   
    <div class="projekt  shadow 
        <?php if (get_query_var('list-item') == false) echo 'card '; if (get_query_var('list-item')) echo 'list-item ';?>" >
            <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
            
            <div class="content">
                <?php if ( empty(get_post_thumbnail_id())) { ?> 
                    <span class="emoji-large"><?php  shorten(get_field('emoji'), '200'); ?></span>
                <?php } ?>

                <?php the_post_thumbnail( 'preview_s' ); ?>
            <div class="cut-title">
                    <h3 class="heading-size-3">
                     <?php shorten(get_the_title(), '60'); ?>
                        <?php if ( !empty(get_post_thumbnail_id())) { ?>
                        <?php  shorten(get_field('emoji'), '200'); ?>
                    <?php } ?>
                    </h3>
                    <h4 class="text-size-3 highlight"><?php  the_field('slogan'); // echo get_the_date('j. F'); ?></h4> 
                    <?php visibility_badge(); ?>
            </div>

            <div class="counter">
                <span>
                    <span class="text-size-3 bold">2</span> 
                    <?php require get_template_directory() . '/assets/icons/calendar.svg'; ?>
                </span>
                <span>
                    <span class="text-size-3 bold">2</span> 
                    <?php require get_template_directory() . '/assets/icons/newspaper.svg'; ?>
                </span>                
             </div>
            </div>

        </a>
    </div>
</div>