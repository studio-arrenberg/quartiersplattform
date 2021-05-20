


<?php

/**
 * 
 * Card => SDG
 *
 */

?>


<div id="sdg-card" class="card card-sgd shadow" style="border-color: <?php the_field('color'); ?>;"  >
    <a class="card-link" href="<?php echo get_site_url(); ?>/sdgs#sdg-id-<?php the_field('goal'); ?>">
        <div class="content" style="color: <?php the_field('color'); ?>;">
            <span class="sdg-number">
			    <?php the_field('goal'); ?>
			</span >
            <h3 class="heading-size-3">
                <?php _e(get_the_title(),'quartiersplattform'); ?>
            </h3>
        </div>
    </a>
</div>