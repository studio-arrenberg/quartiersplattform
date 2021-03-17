<?php

$contact = get_query_var('contact_inforation');

?>

<div class="team">		
    <div class="team-member">	
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); // 32 or 100 = size ?>
            <?php echo get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) ); ?>
        </a>
    </div>
</div>

<?php 
if($contact && is_user_logged_in()){
    
    $userid = "user_".get_the_author_meta( 'ID' ); 
?>
    <div class="share-button">

        <?php if( get_field('mail', $userid) ){ ?>
            <a class="button is-style-outline" target="_blank" href="mailto:<?php echo the_field('mail', $userid);?>?subject=Hallo <?php echo get_the_author_meta( 'display_name');?>"rel="nofollow">
                <?php echo the_field('mail', $userid);?>
            </a>
        <?php } ?>

		<?php if( get_field('phone', $userid) ){?>
            <a class="button is-style-outline" target="_blank" href="tel:<?php echo the_field('phone', $userid);?>" >
                <?php echo the_field('phone', $userid); ?>
            </a>
		<?php } ?>

    </div>

<?php
}
