<?php
$location = get_field('map');
// echo "<br>".$location['lat']."  ".$location['lng'];
?>

<div class="list-item">
    <!-- <img src="https://api.mapbox.com/styles/v1/mapbox/light-v10/static/-87.0186,32.4055,14/500x300@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ" alt="Map of the Edmund Pettus Bridge in Selma, Alabama, with a black 'L' marker positioned in the middle of the bridge."> -->
    <!-- <img src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/<?php echo $location['lng'].",".$location['lat']; ?>,14/500x300@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ" alt="Projekt Location"> -->
    <img src="https://api.mapbox.com/styles/v1/studioarrenberg/ckig9l9ia5dez19nzk5328rus/static/<?php echo $location['lng'].",".$location['lat']; ?>,14/500x300@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ" alt="Projekt Location">
    <div class="content">
        <h3 class="card-title">
            <?php // shorten_title(get_the_title(), '30'); ?>
        </h3>
        <p class="preview-text">
            <?php  // get_excerpt(get_the_content(), '55'); ?>
        </p>
    </div>

    <div class="card-footer">

        <a class="button card-button" href="geo:<?php echo $location['lat']."  ".$location['lng']; ?>" target="_blank">In Karten öffenen</a>

        <a class="button card-button" target="_blank" onclick="return map_confirm()" href="https://www.google.com/maps/dir/?api=1&origin=&destination=<?php echo $location['lat'].",".$location['lng']; ?>&travelmode=walking&basemap=roadmap">In Maps öffnen</a>

    </div>
</div>


<script>
    function map_confirm() {
        if (confirm("Zu Google Maps wechseln?")) {
            // do stuff
        } else {
            return false;
        }
    }
</script>