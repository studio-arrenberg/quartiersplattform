<?php

/**
 * 
 * Card => Projekte
 *
 */

?>

<!-- <div class="card-group"> -->
<a class="badge-link" href="<?php echo esc_url( get_permalink() ); ?>">
    <div class="badge shadow  <?php if (get_query_var( 'highlight_display') === true && get_queried_object_id() ==  get_the_ID(  )) echo "active"; ?>">
        <span class="emoji"><?php  shorten(get_field('emoji'), '200'); ?></span> 
        
     <!-- MORITZ - hier wenn post emoji hat  thumbnail einblenden 
     <?php the_post_thumbnail( 'preview_m' ); ?>
     -->
        
    </div>
    <h3 class="card-title-small"><?php shorten(get_the_title(), '60'); ?></h3>
</a>

<!-- MORITZ - Benutz diese Badge als link nur einmal am anfang  -->


<a class="badge-link shadow-on-hover " href="<?php echo home_url() ?>/projekt-erstellen/">
    <div class="badge badge-button">
    <img src="<?php echo get_template_directory_uri()?>/assets/icons/add.svg" />
    </div>
    <h3 class="card-title-small">
        Projekt erstellen    
    </h3>
</a>

<!-- </div> -->