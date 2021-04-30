<?php 

if ( current_user_can('administrator') ) { 

    $terms = get_field('sdg');

    if( $terms ) { ?>

        <h2>Ziele für nachhaltige Entwicklung</h2>

        <?php 
        foreach( $terms as $term ): 

            $tax = get_term( $term, 'sdg' );
            $slug = $tax->slug;

            $args = array(
                'post_type'=>'sdg', 
                'post_status'=>'publish', 
                'posts_per_page'=> -1,
                'name'=> $tax->slug 
            );

            slider($args, $type = 'badge', $slides = '2', $dragfree = 'false');

        endforeach;

        ?>
            <a class="button" href="<?php echo get_site_url( ) ?>/sdgs">Übersicht der Ziele für nachhaltige Entwicklung</a>
        <?php 

    }
    else {

        $text = "Füge dein Projekt zu den Ziele für nachhaltige Entwicklung hinzu";
        reminder_card('project-share'.get_the_ID(  ), 'Keinen SDGs zugeteilt', $text);
        
    }
    
} 

?>