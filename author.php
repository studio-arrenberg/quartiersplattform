<?php 

get_header(); 

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

?>

<main id="site-content" role="main">

<?php // print_r($curauth); ?>

    <div class="single-header  ">

        <img class="single-header-image" src="<?php echo get_avatar_url( $curauth->ID ) ?>" />

        <div class="single-header-content center-mobile">

            <h1><?php echo $curauth->display_name; ?></h1>

        </div>

    </div>



    <div class="single-content">

    

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
                
                echo "<h2>Projekte von $curauth->display_name</h2>";
                slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');
                
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
  
                echo "<h2>Fragen und Angebote von $curauth->display_name</h2>";
                slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');
                
            }
        ?>


        <!-- Kontakt  -->
        <h2>Bearbeite deine Kontaktinformationen</h2>
        <?php 
            $userid = "user_".$curauth->ID; 
            $wpuserid = 'user_'.get_current_user_id();
            if($userid == $wpuserid){
                acf_form (
                    array(
                        'form' => true,
                        'post_id' => $userid,
                        'return' => '%post_url%',
                        'submit_value' => 'Änderungen speichern',
                        'post_title' => false,
                        'post_content' => false,    
                        'field_groups' => array('group_602e70c8d0a1b', 'group_6033daea4d4ac'), //Lokal
                        
                    )
                );
            


            
            }else{
                ?>
                <h1>Name</h1>
                <p><?php the_field('name', $userid); ?></p>
                <h1>Telefonnummer</h1>
                <p><?php the_field('telefonnummer', $userid); ?></p>
                <h1>E-Mail</h1>
                <p><?php the_field('email', $userid); ?></p>
                
                <?php
            }

            ?>
        
        
        

        
        



    </div>



</div>
<?php get_footer(); ?>