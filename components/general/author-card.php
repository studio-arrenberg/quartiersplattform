<?php

$contact = get_query_var('contact_inforation');

if (get_query_var('contact_user_id')) {
    $user_id = get_query_var('contact_user_id');
} 
else {
    $user_id = get_the_author_meta( 'ID' );
}

// echo $user_id;
// name to be displayed
if ( empty(get_the_author_meta( 'first_name', $user_id )) && empty(get_the_author_meta( 'last_name', $user_id ))) {
    $name = get_the_author_meta( 'display_name', $user_id );
}
else {
    $name = get_the_author_meta( 'first_name', $user_id )." ".get_the_author_meta( 'last_name', $user_id );
}

?>
<div class="team">

    <?php if (get_query_var('contact_profile')) { ?>
    <div class="team">		
        <div class="team-member simple-card shadow">	
            <a href="<?php echo get_author_posts_url($user_id); ?>">
                <?php echo get_avatar( $user_id, 100 ); // 32 or 100 = size ?>
                <h3 class="heading-size-3"><?php echo $name; ?></h3>

                <?php 
                if($contact && is_user_logged_in() || $contact && user_can($user_id, 'administrator')){
                    // echo $user_id;
                    $userid = "user_".$user_id; 
                ?>
            </a>

                <div class="share-button">
                    <?php if( get_field('mail', $userid) ){ ?>
                    <div class="button is-transparent button-has-icon is-one-row">
                        <a class=" button-has-icon is-one-row" id="btn1" target="_blank" href="mailto:<?php echo the_field('mail', $userid);?>?subject=Hallo <?php echo get_the_author_meta( 'display_name');?>"rel="nofollow">
                            <?php require get_template_directory() . '/assets/icons/mail.svg'; ?>
                            <?php echo the_field('mail', $userid);?>
                        </a>
                        <button class="is-primary copy-button" onclick="copyStringToClipboard1()" >
                        <?php require get_template_directory() . '/assets/icons/copy.svg'; ?>
                        </button>
                    </div>
                    <?php } ?>
                    
                    <?php if( get_field('phone', $userid) ){?>
                        <div class="button is-transparent button-has-icon is-one-row">
                        <a class=" button-has-icon is-one-row" id="btn2" class="button is-transparent button-has-icon is-one-row" target="_blank" href="tel:<?php echo the_field('phone', $userid);?>" >
                            <?php require get_template_directory() . '/assets/icons/phone.svg'; ?>
                            <?php echo the_field('phone', $userid); ?>
                        </a>
                        <button class="is-primary copy-button" onclick="copyStringToClipboard2()" >
                        <?php require get_template_directory() . '/assets/icons/copy.svg'; ?>
                        </button>
                    </div>

                    <?php } ?>
                </div>

                <script>
                function copyStringToClipboard1 () {
                    var str = document.getElementById("btn1").innerText;
                    // Create new element
                    var el = document.createElement('textarea');
                    // Set value (string to be copied)
                    el.value = str;
                    // Set non-editable to avoid focus and move outside of view
                    el.setAttribute('readonly', '');
                    el.style = {position: 'absolute', left: '-9999px'};
                    document.body.appendChild(el);
                    // Select text inside element
                    el.select();
                    // Copy text to clipboard
                    document.execCommand('copy');
                    // Remove temporary element
                    document.body.removeChild(el);
                }

                function copyStringToClipboard2 () {
                    var str = document.getElementById("btn2").innerText;
                    // Create new element
                    var el = document.createElement('textarea');
                    // Set value (string to be copied)
                    el.value = str;
                    // Set non-editable to avoid focus and move outside of view
                    el.setAttribute('readonly', '');
                    el.style = {position: 'absolute', left: '-9999px'};
                    document.body.appendChild(el);
                    // Select text inside element
                    el.select();
                    // Copy text to clipboard
                    document.execCommand('copy');
                    // Remove temporary element
                    document.body.removeChild(el);
                }
                </script>

        </div>
    </div>
    <?php } ?>

   
        <?php 
        // reminder card to set contact information
        if( is_user_logged_in() && $user_id == get_current_user_id() && !get_field('phone', $userid) && !get_field('mail', $userid) ) {
            $text = __('Hier kannst du deine Kontaktdaten hinterlegen,','quartiersplattform')."<br>".__(" damit du kontaktiert werden kannst.",'quartiersplattform');
            reminder_card('no-contact-information', 'Kontaktdaten hinterlegen', $text, 'Zum Profil', get_site_url().'/profil' );
        }
        

    }   

    ?>
</div>