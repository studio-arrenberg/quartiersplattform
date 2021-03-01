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
			<div id="sdg-card" class="card card-sgd">
                    <div class="content">    
						<h3 class="card-title">
                        	Alle Farben 
                        </h3>
                        <p class="preview-text">
                        	Sortiert nach Farbton
                        </p>
                    </div>
                </a>
            </div>


			<div id="sdg-card" class="card card-sgd shadow bg_red">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							1 Keine Armut bg_red
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_red-dark">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							4 Bildung bg_red-dark
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_violett">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							8 Menschenwürde bg_violett
						</h3>
					</div>
				</a>
            </div>


			
			
			<div id="sdg-card" class="card card-sgd shadow bg_pink">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							10 Ungleichheit bg_pink
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_yellow">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							7 Saubere Energie bg_yellow
						</h3>
					</div>
				</a>
            </div>
		

			<div id="sdg-card" class="card card-sgd shadow bg_grey">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							2 Kein Hunger bg_grey
						</h3>
					</div>
				</a>
            </div>


			<div id="sdg-card" class="card card-sgd shadow bg_orange-light">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							11 Innovation bg_orange-light
						</h3>
					</div>
				</a>
            </div> 

			<div id="sdg-card" class="card card-sgd shadow bg_orange">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							9 Innovation bg_orange
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_orange-dark">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							5 Geschlechter bg_orange-dark
						</h3>
					</div>
				</a>
            </div>


			<div id="sdg-card" class="card card-sgd shadow bg_brown">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							12 Nachhaltiger konsum bg_brown
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_green-light">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							15 Leben an Land bg_green-light
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_green">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							3 Gesundheit und Wohlstand bg_green
						</h3>
					</div>
				</a>
            </div>

		
			<div id="sdg-card" class="card card-sgd shadow bg_green-dark">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							13 Klimaschutz bg_green-dark
						</h3>
					</div>
				</a>
            </div>



		

			<div id="sdg-card" class="card card-sgd shadow bg_cyan">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							6 Sauberes Wasser bg_cyan
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_blue-light">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							14 Leben unter wassser bg_blue-light
						</h3>
					</div>
				</a>
            </div>

		
			<div id="sdg-card" class="card card-sgd shadow bg_blue">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							16 Frieden Gerechtigkeit bg_bg_blue
						</h3>
					</div>
				</a>
            </div>


			<div id="sdg-card" class="card card-sgd shadow bg_blue-dark">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							17 Partnerschaft bg_bg_blue-dark
						</h3>
					</div>
				</a>
            </div>





			<div id="sdg-card" class="card card-sgd shadow bg_red">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							1 Keine Armut bg_red
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_grey">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							2 Kein Hunger
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_green">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							3 Gesundheit und Wohlstand bg_green
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_red-dark">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							4 Bildung bg_red-dark
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_orange-dark">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							5 Geschlechter bg_orange-dark
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_cyan">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							6 Sauberes Wasser bg_blue-light
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_yellow">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							7 Saubere Energie bg_yellow
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_violett">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							8 Menschenwürde bg_violett
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_orange">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							9 Innovation bg_orange
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_pink">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							10 Ungleichheit bg_pink
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_orange-light">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							11 Innovation bg_orange-light
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_brown">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							12 Nachhaltiger konsum bg_brown
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_green-dark">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							13 Klimaschutz bg_green-dark
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_blue-light">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							14 Leben unter wassser bg_blue-light
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_green-light">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							15 Leben an Land bg_green-light
						</h3>
					</div>
				</a>
            </div>

			<div id="sdg-card" class="card card-sgd shadow bg_blue">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							16 Frieden Gerechtigkeit bg_bg_blue
						</h3>
					</div>
				</a>
            </div>


			<div id="sdg-card" class="card card-sgd shadow bg_blue-dark">
				<a class="card-link"  onclick="myFunction()">
					<div class="content">    
						<h3 class="card-title">
							17 Partnerschaft bg_bg_blue-dark
						</h3>
					</div>
				</a>
            </div>


			<div id="sdg-projekts" class="card-content-hidden">

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

			</div>


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