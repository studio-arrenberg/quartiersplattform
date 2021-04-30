<?php

$contact = get_query_var('contact_inforation');

if (get_query_var('contact_user_id')) {
    $user_id = get_query_var('contact_user_id');
} 
else {
    $user_id = get_the_author_meta( 'ID' );
}

// echo $user_id;

?>

<div class="team">		
    <div class="team-member">	
            <a href="<?php echo get_author_posts_url($user_id); ?>">
            <?php echo get_avatar( $user_id, 100 ); // 32 or 100 = size ?>
            <?php echo get_the_author_meta( 'display_name', $user_id ); ?>
        </a>
    </div>
</div>

<?php 
if($contact && is_user_logged_in()){
    // echo $user_id;
    $userid = "user_".$user_id; 
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
    if( !get_field('phone', $userid) && !get_field('mail', $userid) && $userid == get_current_user_id()) {
        $text = 'Hinterlege deine Kontaktdaten <br> damit du kontaktiert werden kannst.';
        reminder_card('no-contact-information', 'Kontaktdaten hinterlegen', $text, 'Zum Profil', get_site_url().'/profil' );
    }
    

}   

?>