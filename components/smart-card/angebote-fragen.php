<?php

    $args4 = array(
        'post_type'=> array('angebote', 'fragen'), 
        'post_status'=>'publish', 
        'author' =>  get_current_user_id(  ),
        'posts_per_page'=> -1, 
        'meta_query' => array(
			array(
				'key'     => 'expire_timestamp',
				'value'   => current_time('timestamp'),
				'compare' => '>',
				'type' 	=> 'timestamp',       
			),
		),
		'meta_key'          => 'expire_timestamp',
		'orderby'           => 'expire_timestamp',
		'order'             => 'ASC'
    );
    $my_query = new WP_Query($args4);
    if ($my_query->post_count > 0) {

        ?>

            <div class="card smart-card shadow">
                <div class="card-header">
                    <h2>Hallo <?php echo get_user_meta( get_current_user_id(), 'first_name', true ); ?>, </h2>
                    <h3>Du hast folgene <span class="highlight">Sharingangebote </span> und <span class="highlight">
                            Fragen</span> gepostet.</h3>
                </div>

        <?php 

            $args4 = new WP_Query($args4);
            while ( $args4->have_posts() ) {
                $args4->the_post();
                set_query_var( 'list-item', true );
                get_template_part('elements/card', get_post_type());
            }
            wp_reset_postdata();


        ?>

                <div class="card-footer">
                    <a class="button card-button" href="<?php echo get_site_url(); ?>/frage-dein-quartier//">Frage an die Community</a>
                    <a class="button card-button" href="<?php echo get_site_url(); ?>/angebot-erstellen/">Angebot teilen</a>
                </div>

            </div>
        <?php

        
    }
    else {

    }
?>

<!-- !!! muss später in the if else schleife -->
<div class="card smart-card shadow">
    <div class="card-header">
        <h2>Hallo Johann, </h2>
        <h3>Du hast leider noch <span class="highlight">kein Sharingangebot </span> erstellt und noch <span
                class="highlight">keine
                Frage</span> gepostet.</h3>
    </div>

    <div class="card-footer">
        <a class="button card-button" href="<?php echo get_site_url(); ?>/frage-dein-quartier//">Frage an die
            Community</a>
        <a class="button card-button" href="<?php echo get_site_url(); ?>/angebot-erstellen/">Angebot teilen</a>
    </div>
</div>


<!-- altes template -->
<div class="card smart-card shadow">
    <div class="card-header">
        <h2>Hallo Johann, </h2>
        <h3>Du hast <span class="highlight">ein Sharingangebot </span> erstellt und <span class="highlight">eine
                Fragen</span> gepostet.</h3>
    </div>
    <div class="list-item">
        <a href="#" class="frage">
            <div class="content">
                <div class="pre-title green-text">Deine Frage ist noch 3 Stunden verfügbar
                    <span class="date green-text">5 Kommentare<span>
                </div>
                <h3 class="card-title-large">
                    Ich bin deine Frage?
                </h3>
            </div>
            <div class="emoji">
                  😁
            </div>
        </a>
    </div>
    <div class="list-item">
        <a href="#" class="angebot">
            <div class="content">
                <div class="pre-title red-text">Dein Angebot
                    <span class="date red-text">5 Kommentare<span>
                </div>
                <h3 class="card-title-large">
                    Ich bin dein Angebot
                </h3>
            </div>
            <div class="emoji">
                  😁
            </div>
        </a>
    </div>
    <div class="card-footer">
        <a class="button card-button" href="<?php echo get_site_url(); ?>/frage-dein-quartier//">Frage an die
            Community</a>
        <a class="button card-button" href="<?php echo get_site_url(); ?>/angebot-erstellen/">Angebot teilen</a>
    </div>
</div>