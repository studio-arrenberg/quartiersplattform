# Quartiersplattform Arrenberg

Repo für die Quartiersplattform am Arrenberg <br> <br>
Globale Entwicklungsumgebung unter [AP1](https://ap1.arrenberg.studio) <br>
Plugins werden unter [AP01](https://ap01.arrenberg.studio) getestet<br>
Mockup auf [Marvel](https://marvelapp.com/prototype/8gfhabd/screen/73095691) <br>

## 🧯 Wichtig 

## 📦 Requirements 

### Server
`Wordpress` 5.5.1 <br>
`PHP` 7.2.10

### Plugins

[Advanced Custom Fields PRO](https://github.com/AdvancedCustomFields/acf) <br>
Custom Post Types<br>
#### Later
[PWA for WP](https://github.com/ahmedkaludi/pwa-for-wp) <br>
[Favorites](https://github.com/kylephillips/favorites) <br>
Disable Rest API <br>
(Buddy Press)<br>
(WP Forms)<br>

#### Optional (Development)
Custom Post Type UI
[WP Sync DB](https://github.com/wp-sync-db/wp-sync-db) Get Data from [AP1](http://ap1.arrenberg.studio/wp-admin/) <br>
[Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/)

## 🔗 Set up
1. Setup local Wordpress 
2. Clone Repository *into wp-content/themes*
```sh
git clone https://github.com/studio-arrenberg/quartiersplattform.git
```
3. Sync Database with [WP Sync DB](https://github.com/wp-sync-db/wp-sync-db) <br>
4. Copy `wp-content` manually

## ⚙️ Development

### File structure
Images, Icons, Fonts, etc. => `assets/` <br>
Pages (Templates) => `pages/` <br>
Template Parts (WP) => `template-parts` <br>
Elements (card, list-card, ...) => `elements/` <br>
Components (call-to-action, energieampel, feedback, ...) => `components/` <br>
Define colors => `inc/custom-css.php` <br>
Functions => `functions.php` <br>

### Code Snippets

#### Path to Theme files
```php
<?php echo get_template_directory_uri(); ?>
```
#### Home URL
```php
<?php echo get_site_url(); ?>
```
#### Date Function
[PHP Date Format](https://www.php.net/manual/de/datetime.format.php)
```php
$date = "2020-03-27 12:23:22";
echo wp_date('F d, Y g:i a', strtotime($date)); 
```
`F j, G:i` November 28, 21:00 <br>
`F j, Y G:i` November 28, 2020 21:00 <br>
`j. M G:i` 28. Nov 21:00

[Get Term Archive](https://wordpress.stackexchange.com/questions/48435/get-term-archive-url-link)

[More](https://github.com/studio-arrenberg/quartiersplattform/blob/main/wordpress.md)

### Recources 

[Ajax Comments](https://rudrastyh.com/wordpress/ajax-comments.html) <br>
[Embla Carousel](https://davidcetinkaya.github.io/embla-carousel/#installation)


### Image Sizes (Ratio)

|           | S       | M       | L       |
|-----------|---------|---------|---------|
| Square    | 50x50   | 180x180 | 300x300 |
| 4:3       | 160x120 | 200x150 | 800x600 |
| Landscape | 200x100 | 400x200 | 970x485 |


### ???

1. Descriptions<br>
Description Atribut = Bierdeckeltext
2. Page Title 
3. URL <br>
arrenberg.de/projektname   — VS —  CUSTOM ALIAS   — VS —   arrenberg.de/projekte/Arrenberg-Farm
3. Robots.txt!! Crawlbare seiten indexieren
4. H1 H2 H3 P
5. Prüfen von Rich markup möglichkeiten<br>
https://search.google.com/test/rich-results
6. Data Highlighter verwenden
7. Veraltete Navigationsseite mit fehlerhaften Links<br>
Alte Links weiterleiten!
8. Lasy load + Alt Text = z.b Copy Right oder Bildbeschreibung


### Functions

#### Link Card
```php
link_card('Hallo Welt','Text....','/assets/images/400x200.png', '/veranstaltungen');
```
#### List Card
```php 
list_card($args3, get_site_url().'/veranstaltungen');
```
#### Slider
```php
slider($query, $type = 'card', $slides = '2', $dragfree = 'true');
```
#### Shorten
```php 
shorten_title($text, $count = '55'); // für den title
get_excerpt($text, $count = '55'); // für den fließtext
```
#### Calendar Download
```php
calendar_download($post);
```
#### Card List
```php
card_list($query);
```

### Notes

Google Maps API Key `AIzaSyACLoR7TPeF55Gds8HFR6YmX2HhGKORhz` <br>
[WP Sync DB Media Files](https://github.com/wp-sync-db/wp-sync-db-media-files)

### CSS Tricks

https://css-tricks.com/snippets/css/complete-guide-grid/ <br>
https://css-tricks.com/snippets/css/a-guide-to-flexbox/


### VS Code Plugins
extension.refreshBrowser <br>
felixfbecker.php-intellisense <br>
wordpresstoolbox.wordpress-toolbox <br>
rifi2k.format-html-in-php


## 🏛 Database Migration

0. Last Push to [vpp](https://vpp.arrenberg.studio)
1. Update (Optimise) through Wordpress
2. Comment Setting (WP Settings) 
3. Allow Comment on Post-Type (Post type list Buld action) Projekte
4. Custom Post Type enable Comments (Support) -> Projekte, Veranstaltungen
5. Update Parmalinks
6. Delete Calendar Files (created in local host) + (create path to files)
7. Set Menu (⚠️name/slug: "menu") & Page Templates
8. ACFs Veranstaltungen
    - Website
    - Livestream
    - start
    - end

9. ACFs Projekte
    - Ort
    - Kontakt
10. ACFs Setting 'has archive' => True (veranstaltungen, nachrichten) + archiv slug! ({post-type-slug}-archiv)
11. CPT Anmerkung (anmerkungen)
12. ACF Anmerkung (Post-type == Anmerkung) Text (text) Area / Status (status) True/False
13. Seite für Anmkerungen erstellen und tempate festlegen = Anmerkungen
14. [last] Regenerate Images

## 🧫 Fundamental (notes)
- Moderiert (Quertier/Stadt) oder demokratisch
- Text oder Bildsprache 

## 🎉 Releases

### development - v1
- Startseite
- Projekte
- Veranstaltungen
- Energie Ampel
- Feedback (Anmerkungen)
- Footer
- Login/Registrieren
- Email templates
- Profil bearbeiten
- Remove Eneregie ampel when not enough data