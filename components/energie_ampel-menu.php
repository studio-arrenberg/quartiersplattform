<?php

// get API
$url = "http://api.energiewetter.de/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($curl);
curl_close($curl);

// decode for readout
$res = json_decode($resp, true);
?>

<div class="energie-ampel">

    <div class="energie-ampel-titles">
        <div>
            <h2><?php _e('Energie Ampel', 'quartiersplattform'); ?> <span>für Wuppertal</span></h2>
            <h3 class="<?php echo $res['current']['color']; ?>"><?php echo __($res['current']['label']['plural'], 'quartiersplattform')." "; ?><?php _e('Phase', 'quartiersplattform'); ?></h3>
        </div>

        <div>
            <h2><?php echo $res['current']['emissions']['amount']." ".__('gramm', 'quartiersplattform'); ?></h2>
            <h3><?php echo "CO<sub>2</sub> ".__('pro kWh', 'quartiersplattform'); ?> </h3>
        </div>
    </div>

    <div class="strom_array-container">
        <div class="strom_array">
            <div class="<?php echo $res['current']['color']; ?>"><label class="day">Jetzt</label></div>

                <?php 
                // iterate array
                foreach ($res['forecast'] as $timeline => $item) {

                    $label = '';
                    if ($color != $item['color']) $label = "<label>".$item['time']."</label>";
                    if (strftime('%A', $timeline) != strftime('%A', $unix)) echo "<label class='midnight'>".strftime('%A', $timeline)."</label>";
                    
                    echo "<div class='".$item['color']."'>$label</div>";

                    $color = $item['color']; 
                    $unix = $timeline; 
                }
                ?>

        </div>
    </div>
</div>

<div class="vpp-animation">
    <img class="vpp-animation <?php echo $res['current']['color']; ?>" src="<?php echo get_template_directory_uri()?>/assets/vpp-animation/VPP_Stromampel_Animation_<?php echo $res['current']['color']; ?>.svg">
</div>

<script>

    energieAmpel = false;   
    
    function show() {
        // show
        if (energieAmpel == false) {
        
            var element = document.getElementById("overlay");
            element.classList.remove("hidden");
            element.classList.add("visible");

            var htmlElement = document.getElementsByTagName("html")[0];
            htmlElement.classList.add("no-scroll");

            document.querySelector("a.energie-ampel-button").classList.add('is-primary');
            energieAmpel = true;
        
        }
        // hide
        else {
            hide();  
        }
    }

    function hide() {
        energieAmpel = false;

        var element = document.getElementById("overlay");
        element.classList.remove("visible");
        element.classList.add("hidden");

        var htmlElement = document.getElementsByTagName("html")[0];
        htmlElement.classList.remove("no-scroll");

        document.body.style.overflowY = "scroll";
        document.querySelector("a.energie-ampel-button").classList.remove('is-primary');
    }
</script>