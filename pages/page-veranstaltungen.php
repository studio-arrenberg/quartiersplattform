<?php

/**
 * 
 * Template Name: Veranstaltungen
 * Template Post Type: page
 * 
 */

get_header();

?>

<main id="site-content" role="main">
		
	<div class="card card-large">
		<div class="content content-shrink">
			<h1 class="card-title-large">
				Veranstaltungen in deinem Viertel
			</h1>
			<h3>
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt sed veritatis et quibusdam molestiae repellendus fugiat in dolorum. Tempore illo eum itaque voluptate, nulla exercitationem laborum placeat eius odio possimus?	
			</h3>

		</div>
		<a class="close-card-link" href="#">
			<img class="close-card-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/close.svg" />
		</a>
	</div>

	
	<?php 
			$args4 = array(
			'post_type'=> array('veranstaltungen'), 
			'post_status'=>'publish', 
			'posts_per_page'=> 50,
			'orderby' => 'modified'
		);
		?>  
		
		<div class="grid-2col" data-grid>
			<?php card_list($args4);?>
		</div>




</div>

<!-- archive veranstltungen -->
<a class="button" href="<?php echo get_post_type_archive_link( 'veranstaltungen' ); ?>">Archiv</a>

</main><!-- #site-content -->


<?php get_footer(); ?>