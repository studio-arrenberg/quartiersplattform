<?php

/**
 * 	Setup File
 * 	Fired on the initialization of WordPress
 * 
 * 
 * 
 */


# CPT + TAX for SDGs 
function cptui_register_my_cpts_SDG() {

	# Add CPT
	$labels = [
		"name" => __( "SDGs", "quartiersplattform" ),
		"singular_name" => __( "SDG", "quartiersplattform" ),
	];

	$args = [
		"label" => __( "SDGs", "quartiersplattform" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "sdg", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-aside",
		"supports" => [ "title", "editor" ],
	];

	register_post_type( "sdg", $args );

	# Add TAX
    $labels = [
		"name" => __( "SDGs", "quartiersplattform" ),
		"singular_name" => __( "SDG", "quartiersplattform" ),
	];

	$args = [
		"label" => __( "SDG", "quartiersplattform" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'sdg', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "sdg",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
			];
	register_taxonomy( "sdg", [ "projekte" ], $args );

	# Add/Update Posts
	$sdgs = array(
		0 => array('title' => 'Keine Armut', 'slogan' => 'Armut in all ihren Formen und überall beenden', 'content' => 'Es gehört zu den zentralen Entwicklungszielen bis 2030 die extreme Armut auf der Welt zu beseitigen. Allerdings wird extreme Armut mit einem gegenwärtigen Grenzwert von 1,25 US-Dollar, die pro Person pro Tag zur Verfügung stehen, definiert. Kritiker halten diesen Wert für deutlich zu niedrig.'), 
		1 => array('title' => 'Keine Hungersnot', 'slogan' => 'Den Hunger beenden, Ernährungssicherheit und eine bessere Ernährung erreichen und eine nachhaltige Landwirtschaft fördern', 'content' => 'Alle Menschen sollen bis 2030 „ganzjährig Zugang zu sicheren, nährstoffreichen und ausreichenden Nahrungsmitteln haben“. Obwohl bereits heute genügend Nahrungsmittel zur Verfügung stehen, haben immer noch nicht alle Menschen Zugang zu ihnen. Ebenso sollen alle Formen der Mangelernährung beseitigt sowie die landwirtschaftliche Produktivität und die Einkommen der kleinen Nahrungsmittelproduzenten verdoppelt werden.'),
		2 => array('title' => 'Gute Gesundheitsversorgung', 'slogan' => 'Ein gesundes Leben für alle Menschen jeden Alters gewährleisten und ihr Wohlergehen fördern', 'content' => 'Bis 2030 soll die weltweite Müttersterblichkeit auf unter 70 je 100.000 Lebendgeburten sinken. Vermeidbare Todesfälle bei Neugeborenen und Kindern unter fünf Jahren sollen verhindert werden. In den Zielvorgaben sind die Beseitigung der Aids-, Tuberkulose- und Malaria-Epidemien sowie der vernachlässigten Tropenkrankheiten von besonderer Bedeutung, ebenso der Zugang zu einer Gesundheitsversorgung für alle.'),
		3 => array('title' => 'Hochwertige Bildung', 'slogan' => 'Inklusive, gleichberechtigte und hochwertige Bildung und Möglichkeiten lebenslangen Lernens für alle fördern', 'content' => 'Die wichtigste Zielvorgabe besagt, dass bis 2030 sichergestellt werden soll, „dass alle Mädchen und Jungen gleichberechtigt eine kostenlose und hochwertige Grund- und Sekundarschulbildung abschließen“. In weiteren Zielvorgaben werden Maßstäbe für Vorschulerziehung sowie Hochschul- und Berufsbildung formuliert.'),
		4 => array('title' => 'Gleichberechtigung der Geschlechter', 'slogan' => 'Geschlechtergleichstellung erreichen und alle Frauen und Mädchen zur Selbstbestimmung befähigen', 'content' => 'Zu den wesentlichen Anliegen gehört, alle Formen der Diskriminierung von Frauen und Mädchen zu beenden und die Gewalt gegen sie zu beseitigen. Weitere Zielvorgaben befassen sich mit individuellen Formen der geschlechtsspezifischen Diskriminierung, wie beispielweise Zwangsheirat, fehlende Chancengleichheit bei dem Erlangen von Führungspositionen und ungleiche Rechte auf wirtschaftliche Ressourcen.'),
		5 => array('title' => 'Sauberes Wasser und sanitäre Einrichtungen', 'slogan' => 'Verfügbarkeit und nachhaltige Bewirtschaftung von Wasser und Sanitärversorgung für alle gewährleisten', 'content' => 'Bis 2030 soll der Zugang zu einwandfreiem und bezahlbarem Trinkwasser sowie einer angemessenen und gerechten Sanitärversorgung für alle verwirklicht werden. In weiteren Zielvorgaben geht es u.a. um die Verbesserung der Wasserqualität, die Effizienz der Wassernutzung und den Schutz wasserverbundener Ökosysteme.'),
		6 => array('title' => 'Erneuerbare Energien', 'slogan' => 'Zugang zu bezahlbarer, verlässlicher, nachhaltiger und moderner Energie für alle sichern', 'content' => 'Der allgemeine Zugang zu Energiedienstleistungen soll bis 2030 gesichert werden. Dabei soll der Anteil erneuerbarer Energie deutlich erhöht werden. Gleichzeitig soll die Steigerungsrate der Energieeffizienz verdoppelt werden.'),
		7 => array('title' => 'Gute Arbeitsplätze und wirtschaftliches Waachstum', 'slogan' => 'Dauerhaftes, breitenwirksames und nachhaltiges Wirtschaftswachstum, produktive Vollbeschäftigung und menschenwürdige Arbeit für alle fördern', 'content' => 'Großes Gewicht wird auf Fragen des nachhaltigen Wirtschaftswachstums und der Beschäftigung gelegt. Ein hohes Wirtschaftswachstum wird vor allem in den am wenigsten entwickelten Ländern für erforderlich gehalten, mindestens 7 % im Jahr. Für alle Länder werden höhere wirtschaftliche Produktivität und Ressourceneffizienz angestrebt. Andere Zielvorgaben befassen sich mit menschenwürdigen Arbeitsplätzen, einer produktiven Vollbeschäftigung, der Beendigung von Zwangsarbeit, Sklaverei und Menschenhandel sowie dem Schutz der Arbeitsrechte.'),
		8 => array('title' => 'Innovation und Infrastruktur', 'slogan' => 'Eine widerstandsfähige Infrastruktur aufbauen, breitenwirksame und nachhaltige Industrialisierung fördern und Innovation unterstützen', 'content' => 'Es wird angestrebt, eine hochwertige, verlässliche, nachhaltige und widerstandsfähige Infrastruktur aufzubauen, um so wirtschaftliche Entwicklung und menschliches Wohlergehen zu unterstützen. Insbesondere in Entwicklungsländern sollen kleine Industriebetriebe einen besseren Zugang zu Finanzdienstleistungen, Wertschöpfungsketten und Märkten erhalten.'),
		9 => array('title' => 'Weniger Ungleichheiten', 'slogan' => 'Ungleichheit in und zwischen Ländern verringern', 'content' => 'Eine wichtige Zielvorgabe lautet: „Bis 2030 ein über dem nationalen Durchschnitt liegendes Einkommenswachstum der ärmsten 40 Prozent der Bevölkerung zu erreichen.“ Angestrebt wird außerdem u. a. eine „verstärkte Mitsprache der Entwicklungsländer bei der Entscheidungsfindung in den globalen internationalen Wirtschafts- und Finanzinstitutionen“.'),
		10 => array('title' => 'Nachhaltige Städte und Gemeinden', 'slogan' => 'Städte und Siedlungen inklusiv, sicher, widerstandsfähig und nachhaltig gestalten', 'content' => '„Bis 2030 den Zugang zu angemessenem, sicherem und bezahlbarem Wohnraum und zur Grundversorgung für alle sicherstellen und Slums sanieren.“ Dazu gehören u. a. ein Verkehrssystem für alle, eine partizipative Siedlungsplanung, ein verbesserter Katastrophenschutz, eine Verminderung der Umweltbelastung und eine größere Widerstandsfähigkeit gegenüber den Folgen des Klimawandels.'),
		11 => array('title' => 'Nachhaltiger Konsum und Produktion', 'slogan' => 'Nachhaltige Konsum- und Produktionsmuster sicherstellen', 'content' => 'Zur Umsetzung dieses Ziels „sind an der Spitze die entwickelten Länder“ gefordert, während die Entwicklungsländer entsprechend ihrem Entwicklungsstand und ihren Kapazitäten Maßnahmen ergreifen sollen. Als wichtige Themen werden dabei u. a. die nachhaltige Bewirtschaftung und effiziente Nutzung der natürlichen Ressourcen, eine Halbierung der Nahrungsmittelverschwendung und ein umweltverträglicher Umgang mit Chemikalien und Abfällen aufgeführt. Angestrebt wird auch eine allmähliche Abschaffung der schädlichen Subventionen für fossile Brennstoffe.'),
		12 => array('title' => 'Maßnahmen zum Klimaschutz', 'slogan' => 'Umgehend Maßnahmen zur Bekämpfung des Klimawandels und seiner Auswirkungen ergreifen', 'content' => 'Es gilt, wird in einer Zielvorgabe formuliert, „die Widerstandskraft und die Anpassungsfähigkeit gegenüber klimabedingten Gefahren und Naturkatastrophen in allen Ländern“ zu stärken. Dafür müssen Klimaschutzmaßnahmen in die nationalen Politiken, Strategien und Planungen einbezogen werden. Ausdrücklich wird an die Verpflichtung der entwickelten Länder erinnert, ab 2020 jährlich 100 Milliarden US-Dollar für den Klimaschutz in Entwicklungsländern aufzubringen.'),
		13 => array('title' => 'Leben unter dem Wasser', 'slogan' => 'Ozeane, Meere und Meeresressourcen im Sinne nachhaltiger Entwicklung erhalten und nachhaltig nutzen', 'content' => 'Bis 2025 sollen alle Arten der Meeresverschmutzung gestoppt oder erheblich verringert werden. Außerdem sollen die Meeres- und Küstenökosysteme nachhaltig bewirtschaftet und die Versauerung der Ozeane bekämpft werden. Angestrebt werden auch eine wirksame Regelung der Fangtätigkeit und die Beendigung der Überfischung.'),
		14 => array('title' => 'Leben an Land', 'slogan' => 'Landökosysteme schützen wiederherstellen und ihre nachhaltige Nutzung fördern, Wälder nachhaltig bewirtschaften, Wüstenbildung bekämpfen, Bodendegradation beenden und umkehren und dem Verlust der biologischen Vielfalt ein Ende setzen', 'content' => 'Bis 2020 soll eine nachhaltige Nutzung der Land- und Binnensüßwasser-Ökosysteme sowie der Wälder erreicht werden. Ebenso werden eine Bekämpfung der Wüstenbildung und die Erhaltung der Bergökosysteme angestrebt. Um den Verlust der biologischen Vielfalt zu beenden, sollen bedrohte Arten geschützt und ihr Aussterben verhindert werden.'),
		15 => array('title' => 'Frieden und Gerechtigkeit', 'slogan' => 'Friedliche und inklusive Gesellschaften für eine nachhaltige Entwicklung fördern, allen Menschen Zugang zur Justiz ermöglichen und leistungsfähige, rechenschaftspflichtige und inklusive Institutionen auf allen Ebenen aufbauen', 'content' => 'Um dieses Ziel zu erreichen, sollen alle Formen von Gewalt verringert und Rechtsstaatlichkeit gewährleistet werden, wozu auch der Aufbau leistungsfähiger Institutionen gehört. Ebenso gilt es, bis 2030 die illegalen Finanz- und Waffenströme deutlich zu verringern.'),
		16 => array('title' => 'Partnerschaften zur Erreichung der Ziele', 'slogan' => 'Umsetzungsmittel stärken und die Globale Partnerschaft für nachhaltige Entwicklung stärken', 'content' => 'Die Industrieländer werden aufgefordert, ihre Zusagen von öffentlicher Entwicklungshilfe einzuhalten, insbesondere die Bereitstellung von 0,7 % ihres Bruttonationaleinkommens für diese Aufgaben. Gefördert werden soll eine verstärkte Nord-Süd- und Süd-Süd-Zusammenarbeit im Bereich Wissenschaft, Technologie und Innovation. Zu den Zielvorgaben gehört es auch, ein gerechtes multilaterales Handelssystem unter dem Dach der Welthandelsorganisation zu schaffen.')
	);
	
	for ($i = 0; $i < count($sdgs); $i++) {

		$my_post = [];
		$my_post = array(
			'post_title'    => wp_strip_all_tags( $sdgs[$i]['title'] ),
			'post_content'  => $sdgs[$i]['content'],
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type'		=> 'sdg'
		);

		if(post_exists($sdgs[$i]['title']) === 0){
			# create post
			wp_insert_post( $my_post );
		}
		else {
			$mypost_id = get_page_by_title( $sdgs[$i]['title'], '', 'sdg' );
			$my_post['ID'] = $mypost_id->ID;
			# update post
			wp_update_post( $my_post );
			# create tax
			$post_slug = get_post_field( 'post_name', $mypost_id->ID );
			wp_insert_term(
				$sdgs[$i]['title'],
				'sdg',
				array(
					'description' => $sdgs[$i]['slogan'],
					'slug'        => $post_slug
				) 
			);
		}
	}

	# Create SDG Page
	// function create_sdg_page(){

		$title = 'SDGs';
		$slug = 'sdg';
		$page_content = ''; // your page content here
		$post_type = 'page';
	
		$page_args = array(
			'post_type' => $post_type,
			'post_title' => $title,
			'post_content' => $page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => $slug
		);
		
		if ( ! function_exists( 'post_exists' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/post.php' );
		}
	
		if(post_exists($title) === 0){
			$page_id = wp_insert_post($page_args);
		}
	
	// } 
    
}
add_action( 'init', 'cptui_register_my_cpts_SDG' );


?>