<?php

$location = get_field('map');
$map_zoom = 15; 
$width = 500;
$height = 300;

if ( current_user_can('administrator') && get_field('map') ) { // new feature only for admins 


    // Fehler (divs)
?>




<div class="card landscape gardient ">
       <div class="content">

            <div class="pre-title">
                <span> 
                    <?php // if(get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) )) echo "Projekt von ".get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                </span>
            </div>

            <h3 class="card-title">
                <?php the_title(); ?>
            </h3>

            <p class="preview-text">
                <?php echo $location['street_name']." ".$location['street_number'];  ?>
            </p>

            <div class="card-footer">
                <a class="button card-button" href="http://maps.apple.com/?daddr=<?php echo $location['lat'].",".$location['lng'];?>" target="_blank">In Karten öffenen</a>
                <a class="button card-button" target="_blank" onclick="return map_confirm()" href="https://www.google.com/maps/dir/?api=1&origin=&destination=<?php echo $location['lat'].",".$location['lng']; ?>&travelmode=walking&basemap=roadmap"><?php _e('In Maps öffnen', 'quartiersplattform'); ?> </a>
            </div>

        </div>

        <div class="marker-container">

            <div class="marker">
                 <?php
                    if (empty(get_field('emoji'))) { 
                        the_post_thumbnail( 'square_m' ); 
                    } else { 
                        echo '<span class="emoji-marker">'; 
                        the_field('emoji'); 
                        echo "</span>"; 
                    } 
                    ?>
            </div>

        </div>
        
         <img src="https://api.mapbox.com/styles/v1/studioarrenberg/ckl9rpmct17pi17mxw1zw46h0/static/<?php echo $location['lng'].",".$location['lat'].",".$map_zoom."/".$width."x".$height; ?>@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ" alt="Projekt Ort">

        </div>
    </div>
</div>


<script>
    function map_confirm() {
        if (confirm("<?php _e('Zu Google Maps wechseln?', 'quartiersplattform'); ?>")) {
        } else {
            return false;
        }
    }
</script>

<?php

}

?>