<?php

/**
 * 
 * Template Name: SDG
 * Template Post Type: page
 * 
 */

get_header();
?>

<main id="site-content" role="main">

    <?php
	// featured projekte
	$args = array(
		'post_type'=>'sdg', 
		'post_status'=>'publish', 
		'posts_per_page'=> -1,
		'orderby' => 'ASC'
	);

	$args = new WP_Query($args);
	while ( $args->have_posts() ) {
		$args->the_post();
		// get_template_part('elements/card', get_post_type());

		?>
			<div id="sdg-card" class="card card-sgd shadow bg_red">
                <a class="card-link"  onclick="myFunction()">
                    <div class="content">    
						<h3 class="card-title">
                        	<?php echo get_the_title(); ?>
                        </h3>
                        <p class="preview-text">
                        	<?php
                        		if (strlen(get_field('text')) > 2) {
                            		shorten(get_field('text'), '55');
                            	}
                                else {
									shorten(get_the_content(), '55');
                                }
                                ?>
                        </p>
                    </div>
                </a>
            </div>


			<!-- <div id="sdg-projekts" class="card-content-hidden"> -->

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

			<!-- </div> -->


		<?php

	}
	?>

	<script>
		function myFunction() {
		var element = document.getElementById("sdg-projekts");
		element.classList.add("card-content-visible");


		var element = document.getElementById("sdg-card");
		element.classList.remove("shadow");
		}

	</script>
</main><!-- #site-content -->

<?php get_footer(); ?>