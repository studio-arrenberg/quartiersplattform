<div class="card-group">
    
    <?php if (get_query_var( 'additional_info') && get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) { ?>
        <div class="pre-card">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                <span>
                    <b><?php _e('Umfrage', 'quartiersplattform'); ?> </b>
                    <br>
                    <?php _e('veröffentlicht von ', 'quartiersplattform'); ?> <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                    <?php echo qp_date(get_the_date('Y-m-d H:i:s'), false); ?>
                </span>
            </a>
        </div>
    <?php } ?>

    <!-- main card -->
    <div class="card <?php if (!is_single()) echo 'shadow'; ?> ">
        <a class="card-link " href="<?php echo esc_url( get_permalink() ); ?>">
            <div class="content">
                <div class="highlight text-size-3 ">
                    <?php echo qp_date(get_the_date('Y-m-d'), false); ?>
                </div> 
                <h3 class="heading-size-3">
                    <?php  
                        if (!is_single( )) shorten(get_the_title(), '50'); 
                        else echo get_the_title(); 
                    ?>
                </h3>
                <?php visibility_badge(); ?>
                <p class="preview-text">
                    <?php if (!is_single( )) shorten(get_field('text'), '50'); else the_field('text'); ?>
                </p>
            </div>
        </a>

            <?php
            // get poll meta data
            $array = get_post_meta(get_the_ID(), 'polls', true);
            // set vote state 
            $vote_state = false;
            for ($i = 0; $i < count($array); $i++) if(in_array(get_current_user_id(),$array[$i]['user'])) $vote_state = true;

            $randId = md5(rand());
            ?>

            <form class="poll" id="poll-<?php echo get_the_ID(  ).$randId; ?>" method="POST" action="<?php echo admin_url( 'admin-ajax.php' ); ?>">

                <div class="answers">
                
                    <?php
                    if( have_rows('questions') ) {

                        $i = 0;
                        while( have_rows('questions') ) : the_row();
                            $sub_value = get_sub_field('item');

                        ?>

                            <button id="poll<?php echo $i; ?>" name="poll" value="<?php echo $i; ?>" <?php  if (!is_user_logged_in()) echo "disabled"; if (is_user_logged_in()) echo "type='submit'"; if(in_array(get_current_user_id(), $array[$i]['user'])) echo "checked='true'"; ?> >

                                <span class="scale" id="poll<?php echo $i; ?>"style="width: <?php if ($vote_state ) echo $array[$i]['percentage']; else echo '0'; ?>%"></span>

                                <label id="poll<?php echo $i; ?>" for="<?php echo $sub_value; ?>">
                                    <?php echo $sub_value; ?>
                                    <img class="button-icon <?php if(!in_array(get_current_user_id(), $array[$i]['user'])) echo "hide"; ?>" src="<?php echo get_template_directory_uri()?>/assets/icons/star.svg" />
                                </label>

                                <div id="poll<?php echo $i; ?>">
                                    <?php if ($vote_state ) echo $array[$i]['count'].__(" Stimmen",'quartiersplattform'); ?>
                                </div>

                            </button>

                        <?php
                        
                            $i++;
                        endwhile;
                    }
                    ?>
                </div>

                <?php 
                if (is_user_logged_in()) {
                ?>

                    <div class="card-footer">
                        <input class="button card-button" type="hidden" name="ID" value="<?php echo get_the_ID(); ?>" />
                        <input class="button card-button" type="hidden" name="action" value="polling" />
                    </div>

                <?php
                }

                if (!is_user_logged_in()) {
                ?>
                    <div class="login-wall hidden">
                        <p><?php _e('Melde dich auf der Quartiersplattform an um an der Umfrage teilzunehmen.', 'quartiersplattform'); ?> </p>
                        <a class="button card-button" href="<?php echo get_site_url(); ?>/login">
                            <?php _e('Anmelden', 'quartiersplattform'); ?> 
                        </a>
                        <a class="button card-button" href="<?php echo get_site_url(); ?>/register">
                            <?php _e('Registrieren', 'quartiersplattform'); ?> 
                        </a>
                        <a class="close-card-link">
                            <img class="close-card-icon" src="<?php echo get_template_directory_uri()?>/assets/icons/close.svg" />
                        </a>
                    </div>
                <?php
                }
            ?>

            </form>

            <script>
            
            <?php if (is_user_logged_in()) { ?>

            jQuery(document).ready(function($) {
                // console.log('ready');
                jQuery('#poll-<?php echo get_the_ID(  ).$randId; ?>').ajaxForm({
                    success: function(response) {
                        // console.log(response);
                        $.each(response.data, function(k, v) {
                            // console.log(k+" : "+v['user']);
                            $('form#poll-<?php echo get_the_ID(  ).$randId; ?> div#poll' + k).text(v['count'] + '<?php _e(' Stimmen', 'quartiersplattform'); ?>');
                            $('form#poll-<?php echo get_the_ID(  ).$randId; ?> span#poll' + k).css('width', v['percentage'] + '%');
                            
                            if (v['user'] == 'true') {
                                // $('form input#poll' + k).attr('checked', true);
                                $('form#poll-<?php echo get_the_ID(  ).$randId; ?> label#poll' + k + ' img.button-icon').removeClass('hide');
                            }
                            else {
                                $('form#poll-<?php echo get_the_ID(  ).$randId; ?> label#poll' + k + ' img.button-icon').addClass('hide');
                            }
                        });
                    },
                    error: function(response) {
                        // console.log(response);
                    },
                    resetForm: true
                })
            });

            <?php 
            } else {

                ?>

                jQuery('#poll-<?php echo get_the_ID(  ).$randId; ?> div.login-wall').on('click', function(e) {
                    $('#poll-<?php echo get_the_ID(  ).$randId; ?> div.login-wall').toggleClass('hidden');
                });

                <?php 

            } 
            
            ?>
            </script>
            <?php if (!empty($array[0]['total_voter']) && $array[0]['total_voter'] >= 3) { ?>
                <div class="content">
                    <p class="preview-text"><?php echo $array[0]['total_voter']." ".__('Stimmen','quartiersplattform'); ?></p>
                </div>
            <?php } ?>
        <!-- </a> -->
    </div>

    <?php if (get_query_var( 'additional_info') ) { ?>
        <div class="after-card">
            <a href="<?php echo get_permalink( get_term_id($post->ID, 'projekt') ); ?>">
                <?php echo get_the_title( get_term_id($post->ID, 'projekt') ); ?>
                <span style="margin:-1px 0px 0px 5px"><?php the_field('emoji', get_term_id($post->ID, 'projekt')); ?></span>
            </a>
        </div>
    <?php } ?>

</div>