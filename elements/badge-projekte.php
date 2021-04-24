<?php

/**
 * 
 * Card => Projekte
 *
 */

?>

<!-- <div class="card-group"> -->

    <div class="projekt <?php if (get_query_var('list-item') == false) echo 'card '; if (!is_single() && get_query_var('list-item') == false) echo 'shadow '; if (get_query_var('list-item')) echo 'list-item ';?>">
        <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">

            <div class="content align-center ">
                <span class="emoji-large"><?php  shorten(get_field('emoji'), '200'); ?></span>
                <h3 class="card-title-large">
                    <?php shorten(get_the_title(), '60'); ?>
                </h3>
            </div>
        </a>
    </div>

<!-- </div> -->