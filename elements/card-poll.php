<?php

/**
 * Card => Gemeinsam
 *
 * Used for both singular and index.
 */

?>



<div class="card <?php if (!is_single()) echo 'shadow'; ?> ">
    <?php if(!is_single()) { ?>
    <a href="<?php echo esc_url( get_permalink() ); ?>">
    <?php } ?>
        <div class="content">
            <div class="pre-title red-text ">Umfrage 
                <?php if(get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) )) echo "von"; ?>
                <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>

            </div>
            <h3 class="card-title-large">
                <?php  
                    if (!is_single( )) shorten_title(get_the_title(), '50'); 
                    else echo get_the_title(); 
                ?>
            </h3>
            <p class="preview-text"> 
                <?php  
                    if (!is_single( )) shorten_title(get_field('text'), '50'); 
                    else the_field('text'); 
                ?>
            </p>
            <!-- <h4>Poll:</h4> -->
            <form class="poll" id="poll-form" method="POST" action="<?php echo admin_url( 'admin-ajax.php' ); ?>">
            <?php

            // Check rows exists.
            if( have_rows('questions') ):

                $i = 0;
                $array = get_post_meta(get_the_ID(), 'polls', true);

                while( have_rows('questions') ) : the_row();

                    $sub_value = get_sub_field('item');

                    ?>
                    
                        <input type="radio" <?php if(in_array(get_current_user_id(), $array[$i]['user'])) echo "checked='true'"; ?> id="poll<?php echo $i; ?>" name="poll" value="<?php echo $i; ?>">
                        <label id="poll<?php echo $i; ?>" for="<?php echo $sub_value; ?>"><?php echo $sub_value; ?></label>
                        <div id="poll<?php echo $i; ?>">
                            <?php
                                if (find_in_array(get_current_user_id(), $array)) {
                                    echo $array[$i]['count']." Stimmmen";
                                }
                            ?>
                        </div>
                        <br>
                    
                    <?php
                
                    $i++;
                // End loop.
                endwhile;
            else :
            endif;

            
            ?>
            
            <?php 
            if (is_single( )) {
                ?>
                    <input type="hidden" name="ID" value="<?php echo get_the_ID(); ?>" />
                    <input type="hidden" name="action" value="polling" />
                    <input type="submit" value="Abstimmen" />
                <?php
            }
            ?>
            </form>

            <script>

                jQuery(document).ready(function($){
                    // console.log('ready');
                    jQuery('#poll-form').ajaxForm({
                        success: function(response){
                            // console.log(response);
                            $.each(response.data, function(k, v) {
                                // console.log(k+" : "+v['user']);
                                $('form div#poll' + k ).text(v['count']+' Stimmen');
                                if (v['user'] == 'true') {
                                    $('form input#poll' + k).attr('checked',true);
                                }
                            });
                            $('form input:submit').fadeOut('fast');
                        },
                        error: function(response){
                            console.log(response);
                        },
                        resetForm: true
                    })
                });
                // console.log('hello');
            </script>

        </div>

    <?php if(!is_single()) { ?>
    </a>
    <?php } ?>
</div>