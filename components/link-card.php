<?php

/**
 * 
 * Block Name: Link Block
 *
 */


// echo "Link:<br>";
$link = get_field('link');
$id = url_to_postid( $link );
// echo "<br>Link: ".$link." id: ".$id;


// echo "Link-Link:<br>";

// print_r(get_field('link-link'));
// echo "Post:<br>";
// print_r(get_field('post'));
?>


<div class="card landscape shadow gardient ">
    
    <?php 
    // if (get_query_var('link_card_link')) {
        ?>
            <!-- <a href="<?php echo get_site_url(); echo get_query_var('link_card_link'); ?>"> -->
        <?php
    // }
    // else {
        ?>
            <a href="<?php echo esc_url( get_permalink($id) ); ?>">
        <?php
    // }
    ?>

        <div class="content">
            <h3 class="card-title">
                <?php 
                        shorten_title(get_the_title($id), '60');
                ?>
            </h3>
            <p class="preview-text">
                <?php

                        get_excerpt(get_the_content(null,false,$id), '55');
                ?>
            </p>
        </div>
        <?php
            echo get_the_post_thumbnail( $id,'landscape_s' );
        ?>
    </a>
</div>