<?php

/**
 * 
 * Landscape Card
 * 
 */

?>


<div class="card landscape shadow gardient ">
    
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

        <div class="content">
            <h3 class="card-title">
                <?php 
                    $title = get_query_var('link_card_title');
                    if (get_query_var('link_card_title')) {
                        echo get_query_var('link_card_title');
                    }
                    else {
                        shorten(get_the_title(), '60');
                    }
                ?>
            </h3>
            <p class="preview-text">
                <?php
                    if ($link_card_text) {
                        echo get_query_var('link_card_text');
                    }
                    else if (strlen(get_field('text')) > 2) {
                        shorten(get_field('text'), '55');
                    }
                    else {
                        shorten(get_the_content(), '55');
                    }
                ?>
            </p>
        </div>
        <?php
        if (get_query_var('link_card_bg')) {
            ?>
            <img src="<?php echo get_query_var('link_card_bg'); ?>" alt="test" />
            <?php
        }
        else {
            the_post_thumbnail( 'landscape_m' );
        }
        ?>
    </a>
</div>


