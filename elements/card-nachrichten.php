<div class="card-group">

    <!-- main card -->
    <?php if (get_query_var( 'additional_info') && get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) { ?>
        <div class="pre-card">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                <!-- ist es möglich 'Projektupdate' oberhalb des links anzuzeigen -->
                <span>
                    <b><?php _e('Nachricht', 'quartiersplattform'); ?> </b>
                    <br>
                    <?php echo __('veröffentlicht von ', 'quartiersplattform').get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                    <?php echo qp_date(get_the_date('Y-m-d H:i:s'), true); ?>
                </span>
            </a>
        </div>
    <?php } ?>


    <div class="card shadow nachricht">
        <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
            <div class="content">
                <div class="highlight text-size-3 ">
                    <?php echo qp_date(get_the_date('Y-m-d'), false); ?>
                </div>
                <h3 class="heading-size-3 small-margin-bottom">
                    <?php shorten(get_the_title(), '60'); ?>
                </h3>
                <?php visibility_badge(); ?>
                <p class="text-size-2">
                    <?php
                    if (strlen(get_field('text')) > 2) {
                        shorten(get_field('text'), 200);
                    }
                    else {
                        shorten(get_the_content(), 200);
                    }
                    ?>
                </p>
            </div>
            <?php the_post_thumbnail( 'preview_m3' ); ?>
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
