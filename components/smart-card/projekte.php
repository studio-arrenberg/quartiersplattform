
<?php
    $args4 = array(
        'post_type'=> array('projekte'), 
        'post_status'=>'publish', 
        'author' =>  $current_user->ID,
        'posts_per_page'=> -1, 
        'order' => 'DESC',
        'offset' => '0', 
    );
    $my_query = new WP_Query($args4);
    if ($my_query->post_count > 0) {
        

        $args4 = new WP_Query($args4);
        while ( $args4->have_posts() ) {


            ?>

                <div class="card smart-card shadow">
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





<div class="card smart-card shadow">
    <div class="card-header">
        <h2>Dein Projekt</h2>
    </div>
    <div class="list-item">
        <a href="http://localhost:8888/quatiersplattform/projekte/quartiersplattform/">
            <div class="content">
                <!-- <div class="pre-title">Pre-Title <span class="date">vor 30 Minuten<span></div> -->
                <h3 class="card-title">
                    Quartiersplattform </h3>
                <div class="pre-title"> <span class="date">Solidarische Plattform für den
                        Arrenberg<span></span></span></div>

                <p class="preview-text">

                    Die Arrenberg App ist deine Quartiersplattform am... </p>
            </div>
            <img width="200" height="150"
                src="http://localhost:8888/quatiersplattform/wp-content/uploads/2020/11/willkommen-am-arrenberg_DE-200x150.png"
                class="attachment-preview_m size-preview_m wp-post-image" alt="" loading="lazy"
                srcset="http://localhost:8888/quatiersplattform/wp-content/uploads/2020/11/willkommen-am-arrenberg_DE-200x150.png 200w, http://localhost:8888/quatiersplattform/wp-content/uploads/2020/11/willkommen-am-arrenberg_DE-160x120.png 160w"
                sizes="(max-width: 200px) 100vw, 200px">
        </a>
    </div>

    <div class="card-footer">
        <a class="button card-button" href="<?php echo get_site_url(); ?>/frage-dein-quartier//">Update
            veröffentlichen</a>
        <a class="button card-button" href="<?php echo get_site_url(); ?>/angebot-erstellen/">Verantaltung
            erstellen</a>
    </div>
</div>