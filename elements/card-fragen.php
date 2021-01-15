<?php

/**
 * Card => Gemeinsam
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<?php

// gone = now - (published + duration)
// gone = now - (published + duration)
$remaining = current_time('timestamp') - (get_post_time('U') + get_field('duration'));
// echo get_field('duration');

// echo "<br>".get_post_meta(get_the_ID(), 'expire_timestamp', true);

if (current_time('timestamp') < get_post_meta(get_the_ID(), 'expire_timestamp', true)) {
    // echo "<br>".gmdate("H:i:s", abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true)));
}

// calc time remaining
$time_remaining;
// minuten
if (abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true)) < 3600 ) {
    $time_remaining = round((abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true))/60), 0)." Minuten";
}
// stunden
else if (abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true)) < 10800 ) {
    $time_remaining = round((abs(current_time('timestamp') - get_post_meta(get_the_ID(), 'expire_timestamp', true))/3600), 0)." Stunden";
}
// today
else if (date('Ymd', current_time('timestamp')) == date('Ymd', get_post_meta(get_the_ID(), 'expire_timestamp', true))) {
    $time_remaining = "bis um ".wp_date('G:i', get_post_meta(get_the_ID(), 'expire_timestamp', true));    
}
// other
else {
    $time_remaining = "bis zum ".wp_date('j. M', get_post_meta(get_the_ID(), 'expire_timestamp', true));    
}


?>

<div class="card shadow frage ">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <div class="content">
            <div class="pre-title green-text">Frage von
                <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                <span class="date green-text"><?php echo $time_remaining; ?><span>
            </div>
            <h3 class="card-title-large">
                <?php  shorten_title(get_field('text'), '200'); ?>
            </h3>
        </div>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 15 ); ?>
        <div class="emoji">
            <?php  shorten_title(get_field('emoji'), '200'); ?>
        </div>
    </a>
</div>