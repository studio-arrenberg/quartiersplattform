<?php

/**
 * 
 * Card => Nachrichten
 *
 */

?>
<div class="card-group">
    <div class="card landscape shadow ">
            <a class="card-link highlight" href="<?php echo esc_url( get_permalink($id) ); ?>">

            <div class="content ">
                <h3 class="card-title">
                    <?php 
                        shorten(get_the_title($id), '60');
                    ?>
                </h3>
                <p class="preview-text">
                    <?php
                        shorten(get_the_content(null,false,$id), '100');
                    ?>
                </p>
            </div>
        </a>
    </div>
</div>


