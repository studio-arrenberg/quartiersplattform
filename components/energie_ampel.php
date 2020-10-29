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
$datetime = date('Y-m-d H:i');

// echo $datetime;

$wpdb_b = new wpdb( "vpp_user", "4oM1&3ge", "vpp", "localhost" );
$connection = mysqli_connect("localhost", "vpp_user", "4oM1&3ge", "vpp");

if (mysqli_connect_errno()) {
    // echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    // exit();
    // fall back function
    ?>

<div class="energie-ampel">
    <div class="energie-ampel-titles">
        <div>
            <h2>Energie Ampel</h2>

            <h3 class="green">grüne Phase</h3>
        </div>

        <div>
            <h2>230g</h2>
            <h3>CO2 pro kWh</h3>
        </div>
    </div>

    <div class="strom_array-container">
        <div class="strom_array">
            <div class="red"><label>18:00</label></div>
            <div class="red"></div>
            <div class="red"></div>
            <div class="red"></div>
            <div class="red"></div>
            <div class="red"></div>
            <div class="red"></div>
            <div class="red"></div>
            <div class="yellow"><label>14:00</label></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="yellow"></div>
            <div class="green"><label>00:00</label></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
            <div class="green"></div>
        </div>
    </div>
</div>


<?php
}
else {

$phase_color = $wpdb_b->get_var( "
    SELECT ampel_status.color FROM `Ampel` 
    join ampel_status on Ampel.status = ampel_status.id
    WHERE `timestamp` = '".$now.":00'
    Limit 0,1
" );

$phase_name = $wpdb_b->get_var( "
    SELECT ampel_status.name FROM `Ampel` 
    join ampel_status on Ampel.status = ampel_status.id
    WHERE `timestamp` = '".$now.":00'
    Limit 0,1
" );

$phase_gramm = $wpdb_b->get_var( "
    SELECT FLOOR( RAND() * (( ampel_status.carbon_factor + 10) - (ampel_status.carbon_factor - 10)) + (ampel_status.carbon_factor - 10)) as gramm FROM `Ampel` 
    join ampel_status on Ampel.status = ampel_status.id
    WHERE `timestamp` = '".$now.":00'
    Limit 0,1
" );

$timeline = ("
SELECT ampel_status.color, ampel_status.name,  DATE_FORMAT( Ampel.timestamp,'%H:%i') as time FROM Ampel 
Join ampel_status on Ampel.status = ampel_status.id
WHERE `timestamp` >= '".$datetime."' - INTERVAL 24 Hour AND `timestamp` < '".$datetime."' + INTERVAL 24 Hour
");

// echo $timeline;

?>

<div class="energie-ampel">
    <div class="energie-ampel-titles">
        <div>
            <h2>Energie Ampel</h2>

            <h3 class="<?php echo $phase_color; ?>"><?php echo $phase_name; ?>e Phase</h3>
        </div>

        <div>
            <h2><?php echo $phase_gramm; ?>g</h2>
            <h3>CO2 pro kWh</h3>
        </div>
    </div>

    <div class="strom_array-container">

        <div class="strom_array">
            <?php


    $timeline_r = mysqli_query($connection, $timeline) or die("could not perform query");
    while($row = mysqli_fetch_assoc($timeline_r)) {

        $time = $row['time'];
        $lable = "<label>".$time."</label>";

        if ($row['color'] == $color) $lable = "";

        ?>
            <div class="<?php echo $row['color']; ?>"><?php echo $lable ?></div>
            <?php

        $color = $row['color'];        
    } 
    ?>
        </div>
    </div>
</div>
</div>
<?php
}
?>