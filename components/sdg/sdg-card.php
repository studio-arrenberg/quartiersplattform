<div class="card card-sgd shadow <?php echo get_post_meta( get_the_ID(), 'class', true ); ?>">
    <!-- <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>"> -->
        <div class="content">
            <h3 class="card-title">
                <?php echo get_the_title(); ?>
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
    <!-- </a> -->
</div>