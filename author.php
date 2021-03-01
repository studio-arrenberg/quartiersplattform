<?php 

get_header(); 

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

?>

<main id="site-content" class="center-header-template <?php if (!has_post_thumbnail()) echo "no-single-header-image"; ?>" role="main">
    <?php // print_r($curauth); ?>

    <div class="center-header">

        <img class="center-header-image" src="<?php echo get_avatar_url( $curauth->ID ) ?>" />

        <div class="center-header-content center-mobile">

            <h1><?php echo $curauth->display_name; ?></h1>
            <br>

            <!-- Kontakt  -->
            <?php $userid = "user_".$curauth->ID; ?>
                <?php if( get_field('phone', $userid) || get_field('email', $userid) ) { ?>
            
                <!-- mail -->
                <?php if( get_field('email', $userid) ) { ?>    
                        <a class="button is-style-outline" target="blank" href="mailto:<?php the_field('email', $userid);?>?subject=Hallo <?php echo get_the_author_meta( 'display_name');?>" target="_blank"
                        rel="nofollow"><?php the_field('email', $userid);?></a>
                <?php } ?>


                <!-- phone -->
                <?php if( get_field('phone', $userid) ) { ?>
                    <a class="button is-style-outline" target="blank" href="tel:<?php the_field('phone', $userid);?>" >
                        <?php the_field('phone', $userid); ?>
                    </a>
                <?php } ?>

                <?php if ($curauth->ID == get_current_user_id()) { ?>
                    <a class="button" href="<?php echo get_site_url(); ?>/profil">Mein Profil bearbeiten</a>
                    
                <?php } ?>

            <?php } ?>


        </div>
    </div>
    </div>




    <div class="single-content-fullwith">
        <!-- Projekte -->
        <?php
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
                
                echo "<h2>Projekte von $curauth->first_name</h2>";
                slider($args4, $type = 'card', $slides = '1', $dragfree = 'false', $align = 'start');
                
            }
        ?>

        <!-- Angebote und Fragen -->
        <?php
            $args4 = array(
                'post_type'=> array('angebote', 'fragen'), 
                'post_status'=>'publish', 
                'author' =>  $curauth->ID,
                'posts_per_page'=> -1, 
                'order' => 'DESC',
                'offset' => '0', 
            );
            $my_query = new WP_Query($args4);
            if ($my_query->post_count > 0) {
  
                echo "<h2>Frage und Angebote von $curauth->first_name</h2>";
                slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');
                
            }
        ?>

        <!-- Kontakt  -->
        <?php $userid = "user_".$curauth->ID; ?>

        <?php if( get_field('phone', $userid) || get_field('email', $userid) ) { ?>
            <h2>Nimm kontakt mit <?php echo $curauth->first_name;?> auf!</h2>
            <div class="share-button">

            <!-- phone -->
            <?php if( get_field('email', $userid) ) { ?>    
                    <a class="button is-style-outline" target="blank"
                    href="mailto:<?php the_field('email', $userid);?>?subject=Hallo <?php echo get_the_author_meta( 'display_name');?>" target="_blank"
                    rel="nofollow"><?php the_field('email', $userid);?></a>
            <?php } ?>


            <!-- mail -->
            <?php if( get_field('phone', $userid) ) { ?>
                <a class="button is-style-outline" target="blank" href="tel:<?php the_field('phone', $userid);?>" >
                    <?php the_field('phone', $userid); ?>
                </a>
            <?php } ?>
        

            </div>
        <?php } ?>

    
            
    </div>



</div>
<?php get_footer(); ?>