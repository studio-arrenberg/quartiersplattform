<div class="overlay visible cookie-alert">
    <div class="overlay-content">
        <div class="card card-large reminder">
            <div class="content content-shrink">
                <h1 class="card-title-large">
                    🍪 Wir verwenden Cookies
                </h1>
                <h3>
                    Wir nutzen Cookies auf der Quartiersplattform. Mit der Nutzung stimmst du der Verwendung zu, jedoch verwenden wir keine Cookies von Dritten.
                </h3>
            </div>
            

            <?php 

                if (get_privacy_policy_url()) {

                    ?> 
                        <a class="button is-style-outline" href="<?php echo get_privacy_policy_url(); ?>">Datenschutzerklärung</a>
                    <?php

                }
                else {

                    ?> 
                        <a class="button is-style-outline" href="<?php echo get_site_url(); ?>/impressum/">Impressum</a>
                    <?php

                }

            ?>


            <a class="button accept" >Zustimmen</a>
        </div>
    </div>
</div>

<script>
    
    $("div.cookie-alert a.button").click(function(){

        var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    
        var data = {
        'action': 'set_cookie',
        'request': 1
        };

        $.ajax({
            url: ajax_url,
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(response){
                $("div.cookie-alert").fadeOut();
            }
        });

    });

</script>