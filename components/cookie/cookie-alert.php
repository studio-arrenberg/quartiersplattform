<div style="display:none;" class="cookie-alert">
    <div class="overlay-content">
        <div class="card card-large reminder shadow">
            <div class="content large-margin-bottom">
                <h4 class="heading-size-2">
                    🍪 <?php _e("Wir verwenden Cookies", "quartiersplattform"); ?>
                </h4>
                <p class="text-size-2">
                    <?php _e("Wir nutzen Cookies auf der Quartiersplattform. Mit der Nutzung stimmst du der Verwendung zu, jedoch verwenden wir keine Cookies von Dritten.", "quartiersplattform"); ?>
                </p>
            </div>

            <div class="button-group">
            


            <?php 

                if (get_privacy_policy_url()) {

                    ?> 
                        <a class="button is-transparent" href="<?php echo get_privacy_policy_url(); ?>"><?php _e("Datenschutz", "quartiersplattform"); ?></a>
                    <?php

                }
                else {

                    ?> 
                        <a class="button " href="<?php echo get_site_url(); ?>/impressum/"><?php _e('Impressum', 'quartiersplattform'); ?> </a>
                    <?php

                }

            ?>

            <a onclick="cookie_disclaimer();" class="button accept is-primary" ><?php _e('Zustimmen', 'quartiersplattform'); ?> </a>
        </div>
        </div>
    </div>
</div>

<script>

    setTimeout(() => {
        const disclaimer = document.querySelector("div.cookie-alert");
        disclaimer.classList.add("visible", "overlay");  
        disclaimer.style.display = "block"
    }, 6000);
    
    function cookie_disclaimer() {

        var ajax_url = "<?= admin_url('admin-ajax.php'); ?>";
    
        var data = {
            'action': 'set_cookie',
            'request': 1
        };

        document.querySelector("div.cookie-alert").remove();

        var request = new XMLHttpRequest();
        request.open('POST', ajax_url, true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        request.onload = function () {
            if (this.status >= 200 && this.status < 400) {
                // If successful
                console.log(this.response);
                // $("div.cookie-alert").fadeOut();
                // alert('done');
            } else {
                // If fail
                console.log(this.response);
            }
        };
        request.onerror = function() {
            // Connection error
        };
        request.send('action=set_cookie&request=1');

    }

</script>