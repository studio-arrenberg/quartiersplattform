<?php

/**
 * 
 * Card => Projekte
 *
 */

?>

<!-- <div class="card-group"> -->
<a class="badge-link" href="<?php echo esc_url( get_permalink() ); ?>">
    <div class="badge shadow">
        <span class="emoji"><?php  shorten(get_field('emoji'), '200'); ?></span> 
    </div>
    <h3 class="card-title-small"><?php shorten(get_the_title(), '60'); ?></h3>
</a>

<!-- </div> -->