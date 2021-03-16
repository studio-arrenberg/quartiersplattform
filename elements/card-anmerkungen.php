<?php

/**
 * 
 * Card => Anmerkung
 *
 */

$terms_status = get_the_terms($post->ID, 'anmerkungen_status' );
?>

<div class="card <?php if(!is_single( )) echo 'shadow'; ?> anmerkung <?php echo $terms_status[0]->slug; ?>">
    <?php if(!is_single()) { ?>
    <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
    <?php } ?>
        <div class="content">
            <div class="pre-title">
                <?php echo $terms_status[0]->name; ?>
                <span class="date">
                    <?php if( get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) echo "Vorschlag von ".get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                <span>
            </div>
            <h3 class="card-title-large">
                <?php  
                    if (!is_single( )) {
                        shorten(get_field('text'), '85'); 
                    } 
                    else {
                        shorten(get_field('text'), '22285'); 
                    }
                ?>
            </h3>
            <div class="comment-count">
                <?php echo comments_number('', 'Ein Kommentar', '% Kommentare'); ?>
            </div>
        </div>
    <?php if(!is_single()) { ?>
    </a>
    <?php } ?>
</div>