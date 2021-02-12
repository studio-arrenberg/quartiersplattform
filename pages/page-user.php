<?php
/**
 * Template Name: User
 */

get_header();
?>

<main id="site-content" role="main">

<?php 

print_r(get_userdata(get_query_var('author')));
?>

    <div class="single-header profil">
        
        <?php 

        # get user
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $_GET['author_name']) : get_userdata($_GET['author']);
        $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));

        print_r ($curauth);
        echo get_author_template();
        echo "sd ds sdds";
        // User Avatar
        $current_user = $_GET['author_name'];
        echo get_avatar( $current_user->user_email, 32 );
        ?>


        <!-- user  name -->
        <div class="single-header-content">
            <h1><?php echo $curauth->nickname; ?></h1>
        </div>

    </div>

    <p>This is <?php echo $curauth->nickname; ?>'s page</p>

    <br>

    <!-- user posts -->
    <h2>Angebote und Fragen von ...</h2>
    <?php
        $args4 = array(
            'post_type'=> array('angebote', 'fragen'), 
            'post_status'=>'publish', 
            'author' =>  $current_user->ID,
            'posts_per_page'=> -1, 
            'order' => 'DESC',
            'offset' => '0', 
        );
        slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');
    ?>

    <div class="card-container card-container__small">
		<?php get_template_part( 'components/call', 'frage' ); ?>
		<?php get_template_part( 'components/call', 'angebot' ); ?>
    </div>

    <br>
    <h2>Projekte von ...</h2>
    <?php
        $args4 = array(
            'post_type'=> 'projekte', 
            'post_status'=> 'publish', 
            'author' =>  $current_user->ID,
            'posts_per_page'=> 10, 
            'order' => 'DESC',
            'offset' => '0', 
        );
        slider($args4, $type = 'card', $slides = '1', $dragfree = 'false');

    ?>

    <div class="card-container card-container__center card-container__long">
        <?php get_template_part( 'components/call', 'projekt' ); ?>
    </div>

   
</main><!-- #site-content -->


<?php get_footer(); ?>