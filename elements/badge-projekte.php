<?php

global $current_user;

?>

<a class="badge-link <?php if (get_query_var( 'highlight_display') === true && get_query_var( 'projekt_carousel_projekt_id' ) ==  get_the_ID(  )) echo "badge-is-active" ?>" href="<?php echo esc_url( get_permalink() ); ?>">
    <div class="badge shadow <?php if(qp_project_owner()) echo ' yours'; ?>">
        <div class="emoji"><?php the_field('emoji'); ?></div>

        <?php
            if (empty(get_field('emoji'))) {
                the_post_thumbnail( 'square_s' );
            }
        ?>
    </div>

    <div class="badge-content">
        <h3 class="heading-size-4"><?php shorten(get_the_title(), '60'); ?></h3>

        <?php if($current_user->ID != $post->post_author) { ?>
            <h4 class="heading-size-5 highlight hidden-small"><?php the_field('slogan'); ?></h4>
        <?php } ?>

        <?php if(qp_project_owner()) { ?>
            <span class="blue-tag"><?php _e('Dein Projekt', 'quartiersplattform'); ?> </span>
        <?php } ?>

        <?php visibility_badge(); ?>

    </div>
</a>
