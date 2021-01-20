<?php

/**
 * Card => Projekte
 *
 * Used for both singular and index.
 */

?>

<div class="card shadow projekt">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
            <!-- <div class="pre-title">Pre-Title <span class="date">vor 30 Minuten<span></div> -->
            <h3 class="card-title">
                <?php shorten_title(get_the_title(), '60'); ?>
            </h3>
            <div class="pre-title"> <span class="date"><?php  echo the_field('slogan'); // echo get_the_date('j. F'); ?><span></div> 

            <p class="preview-text">
                <?php  if (get_the_content()) { get_excerpt(get_the_content(), '55'); } else { get_excerpt(get_field('description'), '55'); } ?>
            </p>
        </div>
         <?php the_post_thumbnail( 'preview_m' ); ?>

    </a>
</div>