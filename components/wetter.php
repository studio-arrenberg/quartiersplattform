<?php

/**
 * Landscape Card
 */

?>

<!-- get weather station data -->
<?php 
// // Clients public and private key provided by service provider
$public_key = "7a9946078ddcaa966ab528c62fa4053bb93d9d39ad9743ae";
$private_key = "95c7452c43169aa49410eb43310b8b0c8dcdc2926e164fd9";

// Define the request parameter's
$method = "GET";
$request = "/data/0020B6E7/raw/last/1";

$timestamp = gmdate('D, d M Y H:i:s T'); // Date as per RFC2616 - Wed, 25 Nov 2014 12:45:26 GMT

// Creating content to sign with private key
$content_to_sign = $method.$request.$timestamp.$public_key;

// Hash content to sign into HMAC signature
$signature = hash_hmac("sha256", $content_to_sign, $private_key);

// Add required headers
// Authorization: hmac public_key:signature
// Date: Wed, 25 Nov 2014 12:45:26 GMT
$headers = [
    "Accept: application/json",
    "Authorization: hmac {$public_key}:{$signature}",
    "Date: {$timestamp}"
];

// Prepare and make https request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.fieldclimate.com/v2" . $request);
// https://api.fieldclimate.com/v2
// SSL important
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$output = curl_exec($ch);
curl_close($ch);

// Parse response as json and work on it ..
// echo $output. PHP_EOL;


$json_decoded = json_decode($output);

// niederschalg

if ($json_decoded->data[4]->values->sum[0] == 0) {
    $niederschlag = "Kein Niederschlag";
}
else {
    $niederschlag = ($json_decoded->data[4]->values->sum[0] * 100)."% Niederschlag";
}

?>

<!-- display data -->
<div class="card landscape shadow bg_green" data-content-piece="Arrenberg Wetter">
    <a href="<?php echo get_site_url(); ?>/projekte/arrenberg-farm/">
        <div class="content white-text">
            <div class="emojis-top"><?php echo $json_decoded->data[0]->values->avg[0]; ?>°C</div>
            <h3 class="card-title">
                Das aktuelle Wetter von der Arrenberg Farm <?php // echo date('G:i',$json_decoded->dates[0]);  ?>
            </h3>
            <p class="preview-text">
                <?php echo number_format($json_decoded->data[9]->values->avg[0], 0); ?>% Luftfeuchtigkeit & <?php echo $niederschlag; ?>  
            </p>
        </div>

        <!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/gemeinsam.png" alt="" /> -->
    </a>
</div>