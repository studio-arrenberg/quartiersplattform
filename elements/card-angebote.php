<?php

/**
 * 
 * Card => Angebot
 *
 */

?>

<div class="card-group">

    <?php if (get_query_var( 'additional_info') && get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) { ?>
        <div class="pre-card">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                <span>
                    <b>Angebot</b>
                    <br>
                    von <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                </span>
            </a>
        </div>
    <?php } ?>

    <!-- <div class="card <?php //if (!is_single() && empty(get_query_var('bg'))) echo 'shadow'; else if(get_query_var('bg') == false) echo 'list-item'; ?> "> -->
    <div class="<?php if (get_query_var('list-item') == false) echo 'card '; if (!is_single() && get_query_var('list-item') == false) echo 'shadow '; if (get_query_var('list-item') === true) echo 'list-item ';?>">
        <?php if(!is_single()) { ?>
        <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
        <?php } ?>
            <div class="content-flex">
                <div class="pre-title red-text ">Angebot 
                    <?php if(get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) )) echo "von"; ?>
                    <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>

                    <span class="red-text "><?php echo qp_remaining(get_post_meta(get_the_ID(), 'expire_timestamp', true)); ?><span>
                </div>
                <p class="preview-text-large">
                    <?php  
                        if (!is_single( )) shorten(get_field('text'), '2000'); 
                        else the_field('text'); 
                    ?>
                </p>

                <div class="emoji">
                <?php  shorten(get_field('emoji'), '200'); ?>
            </div>
                
                <div class="kommentare">
                    <?php echo comments_number('', 'Ein Kommentar', '% Kommentare'); ?>
                </div>

            </div>
            <?php if (get_query_var('list-item') === false) echo get_avatar( get_the_author_meta( 'ID' ), 15 ); ?>
            
        <?php if(!is_single()) { ?>
        </a>
        <?php } ?>
    </div>

    <?php if ( get_query_var( 'additional_info') && get_term_id($post->ID, 'projekt') ) { ?>
        <div class="after-card">
            <a href="<?php echo get_permalink( get_term_id($post->ID, 'projekt') ); ?>">
                <?php echo get_the_title( get_term_id($post->ID, 'projekt') ); ?>
                <span style="margin:-1px 0px 0px 5px"><?php the_field('emoji', get_term_id($post->ID, 'projekt')); ?></span>
            </a>
        </div>
    <?php } ?>


</div>