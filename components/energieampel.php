<?php
/**
 * Energie Ampel
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
?>

<?php

date_default_timezone_set('Europe/Berlin');
$now = date('Y-m-d H');

$wpdb_b = new wpdb( "vpp_user", "4oM1&3ge", "vpp", "localhost" );

$tag_data_missing = $wpdb_b->get_var( "
    SELECT ampel_status.color FROM `Ampel` 
    join ampel_status on Ampel.status = ampel_status.id
    WHERE `timestamp` = '".$now.":00'
    Limit 0,1
" );

$tag_data_missing = "sd";

// echo "
// SELECT ampel_status.color FROM `Ampel` 
// join ampel_status on Ampel.status = ampel_status.id
// WHERE `timestamp` = '".$now.":00'
// Limit 0,1
// ";

echo $tag_data_missing;

?>

<div>
    <div>
        <h2>Energie Ampel</h2>
        <h3 class="red">Rote Phase</h3>
    </div>

    <div>
        <h2>430g</h2>
        <h3>CO2 pro kWh</h3>
    </div>

    <div class="strom_array">
        <div class="red">Jetzt</div>
        <div class="red"></div>
        <div class="red"></div>
        <div class="red"></div>
        <div class="yellow">18:00</div>
        <div class="yellow"></div>
        <div class="yellow"></div>
        <div class="yellow"></div>
    </div>
</div>