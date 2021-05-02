
<?php

    $args4 = array(
        'post_type'=> array('projekte'), 
        'post_status' => array('publish', 'pending', 'draft', 'auto-draft'),
        'author' =>  get_current_user_id(),
        'posts_per_page'=> -1, 
        'order' => 'DESC',
        'offset' => '0', 
    );
    
    $my_query = new WP_Query($args4);
    if ($my_query->post_count > 0) {
        ?>

        <div class="pre-card">
            <?php 
            if ($my_query->post_count > 1) {
                echo '<h2>Deine Projekte</h2>';
            }
            else {
                echo '<h2>Dein Projekt</h2>';
            }
            ?>
        </div>
        <br>

    <?php
        $args4 = new WP_Query($args4);
        while ( $args4->have_posts() ) {


            ?>

                    <?php

                    $args4->the_post();

                    ?>

                    <div class="projekt card shadow">
                        <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
                            <?php // the_post_thumbnail( 'preview_m' ); ?>

                            <div class="content align-center ">
                                <span class="emoji-large"><?php  shorten(get_field('emoji'), '200'); ?></span>
                                <h3 class="card-title-large">
                                    <?php shorten(get_the_title(), '60'); ?>
                                </h3>
                                <div class="highlight"><?php  the_field('slogan'); // echo get_the_date('j. F'); ?></div> 
                            </div>
                        </a>
                            <div class="card-footer">
                                <a class="button card-button"  href="<?php echo get_site_url(); ?>/nachricht-erstellen/?project=<?php echo $post->post_name; ?>">
                                <?php _e('Projektupdate', 'quartiersplattform'); ?> </a>
                                <a class="button card-button"  href="<?php echo get_site_url(); ?>/veranstaltung-erstellen/?project=<?php echo $post->post_name; ?>">
                                <?php _e('Veranstaltung', 'quartiersplattform'); ?>
                                </a>
                                <!-- <a class="button card-button"  href="<?php echo get_site_url(); ?>/veranstaltung-erstellen/?project=<?php echo $post->post_name; ?>">+</a> -->
                            </div>
                    </div>
                    
                    
                    
            
            <?php
        }
        wp_reset_postdata();
    }

?>