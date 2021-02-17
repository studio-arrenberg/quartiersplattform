<?php 

get_header(); 

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

?>

<main id="site-content" role="main">

<?php print_r($curauth); ?>

    <div class="single-header  ">

        <img class="single-header-image" src="<?php echo get_avatar_url( $current_user->ID ) ?>" />

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
                'author' =>  $current_user->ID,
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
                'author' =>  $current_user->ID,
                'posts_per_page'=> -1, 
                'order' => 'DESC',
                'offset' => '0', 
            );
            $my_query = new WP_Query($args4);
            if ($my_query->post_count > 0) {
  
                echo "<h2>Frage und Angebote von $curauth->display_name</h2>";
                slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');
                
            }
        ?>


        <!-- Kontakt  -->
        <!-- not ready yet -->


    </div>



</div>
<?php get_footer(); ?>