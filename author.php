<?php 

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

if ( $curauth->ID == get_current_user_id() ) {
    exit(wp_redirect( home_url().'/profil'));
}

get_header(); 


?>

<main id="site-content" class="center-header-template <?php if (!has_post_thumbnail()) echo "no-single-header-image"; ?>" role="main">

    <div class="center-header">

        <img class="center-header-image" src="<?php echo get_avatar_url( $curauth->ID ) ?>" />

        <div class="center-header-content center-mobile">

            <h1><?php echo $curauth->first_name." ".$curauth->last_name; ?></h1>
            <br>

            <?php 
                if ($curauth->ID == get_current_user_id()) {
                    ?>
                        <a class="button" href="<?php echo get_site_url(); ?>/profil/"><?php _e('Mein Profil bearbeiten', 'quartiersplattform'); ?></a>
                    <?php 
                }
            ?>

            <!-- Kontakt  -->
            <?php 
            
            $userid = "user_".$curauth->ID; 
            // echo $curauth->ID;
            author_card(true, $curauth->ID);
            
            ?>

            
            <!-- About -->
            <?php if( get_field('about', $userid) ) { ?>
                <br>
                <br>
                <h2><?php _e('Über mich', 'quartiersplattform'); ?> </h2>
                <div><?php the_field('about', $userid); ?></div>
            <?php } ?>


        </div>
    </div>
    </div>


    <div class="single-content-fullwith">

        <?php
            // Projekte
            $args4 = array(
                'post_type'=> array('projekte'), 
                'post_status'=>'publish', 
                'author' =>  $curauth->ID,
                'posts_per_page'=> -1, 
                'order' => 'DESC',
                'offset' => '0', 
            );
            $my_query = new WP_Query($args4);
            if ($my_query->post_count > 0) {
                
                echo "<h2>".__("Projekte",'quartiersplattform')."</h2>";
                // slider($args4, $type = 'card', $slides = '1', $dragfree = 'false', $align = 'start');          
                card_list($args4);      
                
            }
        ?>

        <?php
            // Angebote und Fragen
            // $args4 = array(
            //     'post_type'=> array('angebote', 'fragen'), 
            //     'post_status'=>'publish', 
            //     'author' =>  $curauth->ID,
            //     'posts_per_page'=> 20, 
            //     'order' => 'DESC',
            //     'offset' => '0', 
            // );
            // $my_query = new WP_Query($args4);
            // if ($my_query->post_count > 0) {
  
            //     echo "<h2>Fragen und Angebote</h2>";
            //     slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');
            //     // get_template_part('elements/'.$type.'', get_post_type());
                
            // }
        ?>

    </div>


</div>
<?php get_footer(); ?>