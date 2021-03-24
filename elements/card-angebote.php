<?php

/**
 * 
 * Card => Angebot
 *
 */

?>

<!-- <div class="card <?php //if (!is_single() && empty(get_query_var('bg'))) echo 'shadow'; else if(get_query_var('bg') == false) echo 'list-item'; ?> "> -->
<div class="<?php if (get_query_var('list-item') == false) echo 'card '; if (!is_single() && get_query_var('list-item') == false) echo 'shadow '; if (get_query_var('list-item') === true) echo 'list-item ';?>">
    <?php if(!is_single()) { ?>
    <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
    <?php } ?>
        <div class="content">
            <div class="pre-title red-text ">Angebot 
                <?php if(get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) )) echo "von"; ?>
                <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>

                <span class="pre-title red-text "><?php echo qp_remaining(get_post_meta(get_the_ID(), 'expire_timestamp', true)); ?><span>
            </div>
            <h3 class="card-title-large">
                <?php  
                    if (!is_single( )) shorten(get_field('text'), '50'); 
                    else the_field('text'); 
                ?>
            </h3>
            
            <div class="kommentare">
                <?php echo comments_number('', 'Ein Kommentar', '% Kommentare'); ?>
            </div>

        </div>
        <?php if (get_query_var('list-item') === false) echo get_avatar( get_the_author_meta( 'ID' ), 15 ); ?>
        <div class="emoji">
            <?php  shorten(get_field('emoji'), '200'); ?>
        </div>
    <?php if(!is_single()) { ?>
    </a>
    <?php } ?>
</div>