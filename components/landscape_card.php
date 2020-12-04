<?php

/**
 * Landscape Card
 */

?>


<div class="card landscape shadow gardient ">
    <a href="<?php echo get_site_url(); echo get_query_var('link_card_link'); ?>">
        <div class="content">
            <h3 class="card-title">
                <?php echo get_query_var('link_card_title'); ?>
            </h3>
            <p class="preview-text">
                <?php echo get_query_var('link_card_text'); ?>
            </p>
        </div>
        <!-- <img src="<?php echo get_template_directory_uri(); echo get_query_var('link_card_bg'); ?>" alt="" /> -->
        <img src="<?php echo get_query_var('link_card_bg'); ?>" alt="" />
    </a>
</div>