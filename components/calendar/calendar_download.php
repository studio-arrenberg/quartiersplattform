<?php

// needed variabels
$date = get_field('event_date', $post);
$time = get_field('event_time', $post);
$time_end = get_field('event_end_time', $post);
        
$title = get_the_title();
$start = date('Ymd', strtotime("$date $time")) . "T" . date('His', strtotime("$date $time"));
$ende = date('Ymd', strtotime("$date $time")) . "T" . date('His', strtotime("$date $time_end"));

if (empty($ende) || strtotime($start) > strtotime($ende) ) {
    // one hour after start
    $ende = date('Ymd', strtotime($start) + (60*60)) . "T" . date('His', strtotime($start) + (60*60));
}

// echo "<p>".$time_end."</p><br>";

// echo "<p>".strtotime($start)."</p><br>";
// echo "<p>".strtotime($ende)."</p><br>";

// // $start = qp_date(get_field('event_date'), true, get_field('event_time'));
// echo "<p>".$start."</p><br>";
// echo "<p>".$ende."</p>";

// directory
$links = get_template_directory_uri();
$destination_folder = $_SERVER['DOCUMENT_ROOT'];
$man_link = getcwd()."/wp-content/themes/".get_template();

// get ort name
$taxonomies = get_object_taxonomies( $post );
// $product_terms = wp_get_object_terms( $post->ID, $taxonomies[1]);

// if (!empty($product_terms[0]->name)) {
//     $ort = $product_terms[0]->name;
// }
// else {
//     $ort = "";
// }

if (get_field('livestream')) {
    $location = get_field('livestream');
}
else {
    $location = '';
}
if (get_field('website')) {
    $website = get_field('website');'';
}
else {
    $website = '';
}

$kurz = get_field( "text" );
$file_name = $post->post_name;
$dir = "/assets/generated/calendar-files/";

$kb_start = $start;
$kb_end = $ende;
$kb_current_time = date("Ymd")."T".date("His");
$kb_title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');
$kb_location = preg_replace('/([\,;])/','\\\$1',$location); 
$kb_location = html_entity_decode($kb_location, ENT_COMPAT, 'UTF-8');
$kb_description = html_entity_decode($kurz. "\n".$website, ENT_COMPAT, 'UTF-8');
$kb_file_name = $file_name;

$kb_url = get_permalink($post);

if($ende == '19700101T000000') {
    die(); 
}

$kb_ical = fopen($man_link.$dir.$kb_file_name.'.ics', 'w') or die(__('Datei kann nicht gespeichert werden!','quartiersplattform')); 
    
$eol = "\r\n";

$kb_ics_content =
'BEGIN:VCALENDAR'.$eol.
'VERSION:2.0'.$eol.
'PRODID:-//kulturbanause//kulturbanause.de//DE'.$eol.
'CALSCALE:GREGORIAN'.$eol.
'BEGIN:VEVENT'.$eol.
'DTSTART:'.$kb_start.$eol.
'DTEND:'.$kb_end.$eol.
'LOCATION:'.$kb_location.$eol.
'DTSTAMP:'.$kb_current_time.$eol.
// 'RRULE:FREQ='.$kb_freq.';UNTIL='.ende_der_widerholung.
'SUMMARY:'.$kb_title.$eol.
'URL;VALUE=URI:'.$kb_url.$eol.
'DESCRIPTION:'.$kb_description.$eol.
'UID:'.$kb_current_time.'-'.$kb_start.'-'.$kb_end.$eol.
'END:VEVENT'.$eol.
'END:VCALENDAR';
// header('HTTP/1.0 200 OK', true, 200);
fwrite($kb_ical, $kb_ics_content);
fclose($kb_ical);

echo '<a 
    class="button is-primary" 
    href="'.get_bloginfo('template_url') .'/assets/generated/calendar-files/'.$kb_file_name.'.ics" 
    target="_self">'.__("Termin im Kalender speichern",'quartiersplattform').'</a>'; 