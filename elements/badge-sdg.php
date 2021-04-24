<?php

$color = get_post_meta( get_the_ID(), 'color', true );

?>


<div id="sdg-card" style="color: <?php echo $color; ?>;" class="card card-sgd shadow <?php echo get_post_meta( get_the_ID(), 'class', true ); ?>">
    <a class="card-link" >
        <div class="content">    
            <h3 class="card-title">
                <?php the_title(); ?>
            </h3>
        </div>
    </a>
</div>