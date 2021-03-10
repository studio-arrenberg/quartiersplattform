
<?php

    $args4 = array(
        'post_type'=> array('projekte'), 
        'post_status'=>'publish', 
        'author' =>  get_current_user_id(),
        'posts_per_page'=> -1, 
        'order' => 'DESC',
        'offset' => '0', 
    );
    
    $my_query = new WP_Query($args4);
    if ($my_query->post_count > 0) {
        

        $args4 = new WP_Query($args4);
        while ( $args4->have_posts() ) {


            ?>

                <div class="card smart-card ">
                    <div class="card-header">
                        <h2>Dein Projekt</h2>
                    </div>
                    
                    <?php

                    $args4->the_post();
                    set_query_var( 'list-item', true );
                    get_template_part('elements/card', get_post_type());

                    ?>
                    <div class="card-footer">
                        <a class="button card-button" href="<?php echo get_site_url(); ?>/nachricht-erstellen/?project=<?php echo $post->post_name; ?>">Update veröffentlichen</a>
                        <a class="button card-button" href="<?php echo get_site_url(); ?>/veranstaltung-erstellen/?project=<?php echo $post->post_name; ?>">Veranstaltung erstellen</a>
                    </div>

                </div>
            
            <?php
        }
        wp_reset_postdata();
    }

?>