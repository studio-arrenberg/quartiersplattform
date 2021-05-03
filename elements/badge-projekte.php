<?php

global $current_user;

// && get_queried_object_id() ==  get_the_ID(  )
?>

<a class="badge-link <?php if (get_query_var( 'highlight_display') === true && get_query_var( 'projekt_carousel_projekt_id' ) ==  get_the_ID(  )) echo "badge-is-active" ?>" href="<?php echo esc_url( get_permalink() ); ?>">
    <div class="badge shadow <?php if($current_user->ID == $post->post_author) echo ' yours'; ?>">
        <div class="emoji"><?php the_field('emoji'); ?></div> 
        
        <?php 
            if (!get_field('emoji') && get_the_post_thumbnail( 'preview_m' )) {
                the_post_thumbnail( 'preview_m' ); 
            }
        ?>
        
    </div>
    <h3 class="heading-size-4"><?php shorten(get_the_title(), '60'); ?></h3>
</a>
