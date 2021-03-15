<?php

/**
 * Card => Gemeinsam
 *
 * Used for both singular and index.
 */

?>

<?php

// calc time remaining
// minuten
if (abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true)) < 3600 ) {
    $time_remaining = "noch ". round((abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true))/60), 0)." Minuten";
}
// stunden
else if (abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true)) < 10800 ) {
    $time_remaining = "noch ". round((abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true))/3600), 0)." Stunden";
}
// today
else if (date('Ymd', current_time('timestamp')) == date('Ymd', get_post_meta(get_the_ID(), 'expire_timestamp', true))) {
    $time_remaining = "bis um ".wp_date('G:i', get_post_meta(get_the_ID(), 'expire_timestamp', true));    
}
// tomorrow
else if (date('Ymd', (current_time('timestamp') + 86400)) == date('Ymd', get_post_meta(get_the_ID(), 'expire_timestamp', true))) {
    $time_remaining = "bis Morgen";
}
// no data
else if (!get_post_meta(get_the_ID(), 'expire_timestamp', true)) {
    $time_remaining = "vom ".get_the_date('j. M');
}
else if (get_post_meta(get_the_ID(), 'expire_timestamp', true) < current_time('timestamp')) {
    $time_remaining = "vom ".date('j. M', get_post_meta(get_the_ID(), 'expire_timestamp', true));
}
// other
else {
    $time_remaining = "bis zum ".wp_date('j. M', get_post_meta(get_the_ID(), 'expire_timestamp', true));    
}

?>



<div class="card <?php if (!is_single()) echo 'shadow'; ?> ">
    <?php if(!is_single()) { ?>
    <a href="<?php echo esc_url( get_permalink() ); ?>">
    <?php } ?>
        <div class="content">
            <div class="pre-title red-text ">Angebot 
                <?php if(get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) )) echo "von"; ?>
                <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>

                <span class="date red-text"><?php echo $time_remaining; ?><span>
            </div>
            <h3 class="card-title-large">
                <?php  
                    if (!is_single( )) shorten_title(get_field('text'), '50'); 
                    else the_field('text'); 
                ?>
            </h3>
        </div>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 15 ); ?>
        <div class="emoji">
            <?php  shorten_title(get_field('emoji'), '200'); ?>
        </div>
    <?php if(!is_single()) { ?>
    </a>
    <?php } ?>
</div>