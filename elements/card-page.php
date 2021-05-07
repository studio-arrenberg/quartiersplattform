<?php

/**
 * 
 * Card => Nachrichten
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
if (strlen($the_slug < 1 )) {
    $char = 200;
}

?>


<div class="card landscape shadow-on-hover link-card ">
    
    <?php 
    // if (get_query_var('link_card_link')) {
        ?>
            <!-- <a href="<?php echo get_site_url(); echo get_query_var('link_card_link'); ?>"> -->
        <?php
    // }
    // else {
        ?>
            <a href="<?php echo esc_url( get_permalink($id) ); ?>">
        <?php
    // }
    ?>

        <div class="content">
            <h3 class="card-title">
                <?php 
                        shorten(get_the_title($id), '60');
                ?>
            </h3>
            <p class="preview-text">
                <?php

                        shorten(get_the_content(null,false,$id), '100');
                ?>
            </p>
        </div>
        <!-- <?php
            echo get_the_post_thumbnail( $id,'landscape_s' );
        ?> -->
    </a>
</div>

