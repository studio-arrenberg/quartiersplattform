<?php

global $current_user;

// && get_queried_object_id() ==  get_the_ID(  )
?>

<a class="badge-link <?php if (get_query_var( 'highlight_display') === true && get_query_var( 'projekt_carousel_projekt_id' ) ==  get_the_ID(  )) echo "badge-is-active" ?>" href="<?php echo esc_url( get_permalink() ); ?>">
    <div class="badge shadow <?php if($current_user->ID == $post->post_author) echo ' yours'; ?>">
        <div class="emoji"><?php the_field('emoji'); ?></div> 
        
        <?php
            if (empty(get_field('emoji'))) {
                the_post_thumbnail( 'square_s' ); 
            }
        ?>
        
    </div>
    <h3 class="heading-size-4"><?php shorten(get_the_title(), '60'); echo "<br>".get_post_modified_time('Y-m-d H:i:s'); ?></h3>
    <!-- <h5 class="heading-size-5"><?php echo get_post_modified_time('Y-m-d H:i:s'); ?></h5> -->
</a>
