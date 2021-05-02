<?php

/**
 * 
 * Card => Projekte
 *
 */

?>
<!-- add class yours if its yours -->
<a class="badge-link" href="<?php echo esc_url( get_permalink() ); ?>">
    <div class="badge shadow   <?php if (get_query_var( 'highlight_display') === true && get_queried_object_id() ==  get_the_ID(  )) echo "active"; ?>">
        <span class="emoji"><?php the_field('emoji'); ?></span> 
        
     <!-- MORITZ - hier wenn post emoji hat  thumbnail einblenden 
     <?php the_post_thumbnail( 'preview_m' ); ?>
     -->
        
    </div>
    <h3 class="heading-size-4"><?php shorten(get_the_title(), '60'); ?></h3>
</a>
