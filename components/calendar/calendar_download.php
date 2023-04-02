<?php

// needed variables
$date_start = get_field('event_date', $post); // Start date
$time_start = get_field('event_time', $post); // Start time
$time_end = get_field('event_end_time', $post); // End time
$date_end = get_field('event_end_date', $post); // End date
        
$title = get_the_title();
$start = !empty($date_start) ? date('Ymd', strtotime("$date_start $time_start")) . "T" . date('His', strtotime("$date_start $time_start")) : '';

if (empty($date_end)) {
    // Enddatum not given - single day event
    $date_end = $date_start;
}

if (empty($time_end) || strtotime($start) > strtotime("$date_end $time_end")) {
    // one hour after start
    $time_end = date('H:i:s', strtotime("$time_start +1 hour"));
}

$ende = date('Ymd', strtotime("$date_end $time_end")) . "T" . date('His', strtotime("$date_end $time_end"));

// directory
$links = get_template_directory_uri();
$destination_folder = $_SERVER['DOCUMENT_ROOT'];
$man_link = getcwd()."/wp-content/themes/".get_template();

// acf fields - livestream
if (get_field('livestream')) {
    $location = get_field('livestream');
}
else {
    $location = '';
}
// acf fields - ticket
if (get_field('ticket')) {
    $website = get_field('ticket');
}
else {
    $website = '';
}

$description = get_field("text");
$file_name = $post->post_name;
$dir = "/assets/generated/calendar-files/";

$kb_start = $start;
$kb_end = $ende;

$kb_current_time = date("Ymd")."T".date("His");
$kb_title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');
$kb_location = preg_replace('/([\,;])/','\\\$1',$location); 
$kb_location = html_entity_decode($kb_location, ENT_COMPAT, 'UTF-8');
$kb_description = html_entity_decode($description. "\n".$website, ENT_COMPAT, 'UTF-8');
$kb_file_name = $file_name;

$kb_url = get_permalink($post);

if($ende == '19700101T000000' ) {
    die(); 
}

if ($start == '19700101T000000') {
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
    //'RRULE:FREQ='.$kb_freq.';UNTIL='.$kb_until.$eol.
    'SUMMARY:'.$kb_title.$eol.
    'URL;VALUE=URI:'.$kb_url.$eol.
    'DESCRIPTION:'.$kb_description.$eol.
    'UID:'.$kb_current_time.'-'.$kb_start.'-'.$kb_end.$eol.
    'END:VEVENT'.$eol.
    'END:VCALENDAR';
// header('HTTP/1.0 200 OK', true, 200);
fwrite($kb_ical, $kb_ics_content);
fclose($kb_ical);

?>

<a class="button" href="<?php echo get_bloginfo('template_url') .'/assets/generated/calendar-files/'.$kb_file_name.'.ics' ?>" target="_self"><?php _e('.iCal Herunterladen','quartiersplattform'); ?></a>
