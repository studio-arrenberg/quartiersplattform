<?php 

if ( current_user_can('administrator') ) { 

    $terms = get_field('sdg');
    // print_r($terms);

    if( $terms ) { ?>

        <h3 class="heading-size-3"><?php _e('Ziele für nachhaltige Entwicklung', 'quartiersplattform'); ?></h3>

        <?php 
        foreach( $terms as $term ): 

            $tax = get_term( $term, 'sdg' );
            $slug = $tax->slug;

            // echo $slug;

            $args = array(
                'post_type'=>'sdg', 
                'post_status'=>'publish', 
                'posts_per_page'=> -1,
                'meta_key'   => 'number',
                'meta_value' => $slug,
            );

            slider($args, $type = 'badge', $slides = '2', $dragfree = 'false');

        endforeach;
        ?>
            <a class="button" href="<?php echo get_site_url( ) ?>/sdgs"><?php _e('Übersicht der Ziele für nachhaltige Entwicklung', 'quartiersplattform'); ?> </a>
        <?php 

    }
    else {

        $text = __("Verfolgt dein Projekt Nachhaltigkeitsziele? In den Projekteinstellungen kannst du festlegen, welche Ziele dein Projekt unterstützt. Du weißt nicht genau was die nachhaligen Entwicklungsziele sind? Informiere dich auf der Seite SDGs worum es sich dabei handelt.",'quartiersplattform');
        reminder_card('project-share'.get_the_ID(  ), __('Ziele für nachhaltige Entwicklung','quartiersplattform'), $text);
        
    }
    
} 

?>