<?php

/**
 * Card => Gemeinsam
 *
 * Used for both singular and index.
 */

?>


<div class="card <?php if (!is_single()) echo 'shadow'; ?> ">
    <?php if(!is_single()) { ?>
    <a class="flex-col" href="<?php echo esc_url( get_permalink() ); ?>">
        <?php } ?>
        <div class="content">
            <div class="pre-title red-text ">
                <?php 
                    # get projekt or owner
                    if (get_cpt_term_owner($post->ID, 'projekt')) echo "Umfrage von ".get_cpt_term_owner($post->ID, 'projekt');
                ?>
            </div>
            <h3 class="card-title-large">
                <?php  
                        if (!is_single( )) shorten_title(get_the_title(), '50'); 
                        else echo get_the_title(); 
                    ?>
            </h3>
            <p class="preview-text">
                <?php if (!is_single( )) shorten_title(get_field('text'), '50'); else the_field('text'); ?>
            </p>
        </div>

        <?php
            # get poll meta data
            $array = get_post_meta(get_the_ID(), 'polls', true);
            // print_r($array);

            # set vote state 
            for ($i = 0; $i < count($array); $i++) if(in_array(get_current_user_id(),$array[$i]['user'])) $vote_state = true;

            ?>

        <form class="poll" id="poll-form" method="POST" action="<?php echo admin_url( 'admin-ajax.php' ); ?>">

            <div class="answers">
                <?php
            // Check rows exists.
            if( have_rows('questions') ) {

                $i = 0;
                while( have_rows('questions') ) : the_row();
                    $sub_value = get_sub_field('item');

                    ?>

                <button class="" <?php if (!is_user_logged_in()) echo "disabled"; ?>
                    <?php if (is_user_logged_in()) echo "type='submit'"; ?>
                    <?php if(in_array(get_current_user_id(), $array[$i]['user'])) echo "checked='true'"; ?>
                    id="poll<?php echo $i; ?>" name="poll" value="<?php echo $i; ?>">

                    <span class="scale" id="poll<?php echo $i; ?>"style="width: <?php if ($vote_state ) echo $array[$i]['percentage']; else echo '0'; ?>%"></span>
                    <label id="poll<?php echo $i; ?>" for="<?php echo $sub_value; ?>">

                    <?php echo $sub_value; ?>
                    <?php 
                        if (in_array(get_current_user_id(), $array[$i]['user'])) {
                            ?>
                                <img class="button-icon hide" src="<?php echo get_template_directory_uri()?>/assets/icons/star.svg" />
                            <?php
                        }
                        ?>
                    
                    <!-- <img class="button-icon " src="<?php  //echo get_template_directory_uri()?>/assets/icons/check.svg" /> -->


                    <!-- <img class="avatar" src="<?php //echo um_get_user_avatar_url(get_current_user_id(), $size = '300' ) ?>" /> -->


                </label>

                    <div id="poll<?php echo $i; ?>">
                        <?php
                                if ($vote_state ) echo $array[$i]['count']." Stimmen";
                            ?>
                    </div>
                </button>

                <?php
                
                    $i++;
                endwhile;
            }
            
            ?>
            </div>

            <?php 
            if (is_single( ) && is_user_logged_in()) {
            ?>

            <div class="card-footer">
                <input class="button card-button" type="hidden" name="ID" value="<?php echo get_the_ID(); ?>" />
                <input class="button card-button" type="hidden" name="action" value="polling" />
                <!-- <input class="button card-button" type="submit" value="Abstimmen" /> -->
            </div>


            <?php
            }
            if (!is_user_logged_in()) {
            ?>
            <div class="login-wall">
                <p>Melde dich auf der Quartiersplattform an um an der Umfrage teilzunehmen.</p>
                <a class="button card-button" href="<?php echo get_site_url(); ?>/anmelden">
                    Anmelden
                </a>
                <a class="button card-button" href="<?php echo get_site_url(); ?>/anmelden">
                    Registrieren
                </a>
            </div>
            <?php
            }
        ?>

        </form>

        <script>
        jQuery(document).ready(function($) {
            // console.log('ready');
            jQuery('.poll').ajaxForm({
                success: function(response) {
                    // console.log(response);
                    $.each(response.data, function(k, v) {
                        // console.log(k+" : "+v['user']);
                        $('form div#poll' + k).text(v['count'] + ' Stimmen');
                        $('form.poll span#poll' + k).css('width', v['percentage'] + '%');
                        if (v['user'] == 'true') {
                            $('form input#poll' + k).attr('checked', true);
                        }
                    });
                    // $('form input:submit').fadeOut('fast');
                },
                error: function(response) {
                    // console.log(response);
                },
                resetForm: true
            })
        });
        // console.log('hello');
        </script>


        <?php if(!is_single()) { ?>
    </a>
    <?php } ?>
</div>