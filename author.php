<?php 

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

if ( $curauth->ID == get_current_user_id() ) {
    exit(wp_redirect( home_url().'/profil'));
}

get_header(); 


?>




<main id="site-content" class="page-grid  <?php if (!has_post_thumbnail()) echo "no-single-header-image"; ?>" role="main">

	<div class="left-sidebar">

		<div class="hidden-small">

			<?php 
				$args4 = array(
					'post_type'=> array('projekte'), 
					'post_status'=>'publish', 
					'posts_per_page'=> 20,
					'orderby' => 'date'
				);
			?>  

			<?php // card_list($args4); ?>

            <?php projekt_carousel(); ?>

		</div>

		
	</div>


	<div class="main-content">

        <div class="profil-header">
            <div class="profil-header-avatar">
                <img class="" src="<?php echo get_avatar_url( $curauth->ID ) ?>" />

            </div>
            <!-- user name -->
            <div class="profil-header-content">
                <h1><?php echo $curauth->first_name." ".$curauth->last_name; ?></h1>
            </div>
        </div>


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
        author_card(true, $curauth->ID, false);
        
        ?>

        
        <!-- About -->
        <?php if( get_field('about', $userid) ) { ?>
            <h2><?php _e('Über mich', 'quartiersplattform'); ?> </h2>
            <div><?php the_field('about', $userid); ?></div>
            <br>
        <?php } ?>

    
            
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
                if (count_query($args4)) {
                    echo "<h2 class='margin-bottom'>".__("Projekte von",'quartiersplattform')." ".$curauth->first_name."</h2> <br>";
                    card_list($args4);      
                }
            ?>

            <br>
            <br>


            <?php
                $args4 = array(
                    'post_type'=> array('veranstaltungen', 'nachrichten','umfragen'), 
                    'post_status'=>'publish', 
                    'author' =>  $curauth->ID,
                    'posts_per_page'=> 20, 
                    'order' => 'DESC',
                    'offset' => '0', 
                );
                if (count_query($args4)) {
                    echo "<h2 class='margin-bottom'>".__("Beiträge von",'quartiersplattform')." ".$curauth->first_name."</h2> <br>";
                    card_list($args4);      
                }
            ?>

        </div>
        </div>
    </div>
            </main>
</div>
<?php get_footer(); ?>