<?php

/**
 * 
 * Default Square Card
 *
 */

?>

<div class="card square shadow gardient">
    <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">

        <div class="content">
            <h3 class="card-title">
                <?php shorten(get_the_title(), '30'); ?>
            </h3>
            <p class="preview-text">
                <?php
                    if (strlen(get_field('text')) > 2) {
                        shorten(get_field('text'), '55');
                    }
                    else {
                        shorten(get_the_content(), '55');
                    }
                ?>
            </p>
        </div>
        <?php  the_post_thumbnail( 'square_l' ); ?>
    </a>
</div>