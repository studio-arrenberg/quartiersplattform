# Quartiersplattform Arrenberg

#### Repo für die [Quartiersplattform am Arrenberg](https://arrenberg.app) <br>
Globale Entwicklungsumgebung unter [AP1](https://ap1.arrenberg.studio) <br>
Mockup auf [Marvel](https://marvelapp.com/prototype/8gfhabd/screen/73095691) <br>

## 🧯 Wichtig 
- Matomo Tracking Codes/Strategy

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
Ulimate Member<br>
(WP Forms)<br>

### Ultimate member

#### Fixes
File needs to be replaced: 
ultimate-member > includes > core > class-fields.php (line 107)
```php 
function add_hidden_field( $field ) {
echo '<div style="display: none !important;">'; -- custom to enable profil picture replacement
// zu: (remove styles)
echo '<div>';
```   

#### Optional (Development)
Custom Post Type UI<br>
[WP Sync DB](https://github.com/wp-sync-db/wp-sync-db) Get Data from [AP1](http://ap1.arrenberg.studio/wp-admin/) <br>
[Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/)<br>
[Maintenance Redirect](https://wordpress.org/plugins/jf3-maintenance-mode/)

## 🔗 Set up
1. Setup local Wordpress 
2. Clone Repository *into wp-content/themes*
```sh
git clone https://github.com/studio-arrenberg/quartiersplattform.git
```
3. Sync Database with [WP Sync DB](https://github.com/wp-sync-db/wp-sync-db) <br>
4. Copy `wp-content` manually
5. Install Plugins

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
[Embla Carousel](https://davidcetinkaya.github.io/embla-carousel/#installation)<br>
[Ultimate Member Remove Recources](https://docs.ultimatemember.com/article/1490-how-to-remove-css-and-js-on-non-um-pages)<br>
[Mail Template Inline Styles Converter](https://templates.mailchimp.com/resources/inline-css/)


### Image Sizes (Ratio)

|           | S       | M       | L       |
|-----------|---------|---------|---------|
| Square    | 80x80   | 180x180 | 300x300 |
| 4:3       | 160x120 | 200x150 | 800x600 |
| Landscape | 200x100 | 400x200 | 970x485 |


### SEO

1. Descriptions: Description Atribut = Bierdeckeltext
2. Page Title 
3. URL: arrenberg.de/projektname   — VS —  CUSTOM ALIAS   — VS —   arrenberg.de/projekte/Arrenberg-Farm
3. Robots.txt!! Crawlbare seiten indexieren
4. H1 H2 H3 P
5. [Prüfen](https://search.google.com/test/rich-results) von Rich markup möglichkeiten
6. Data Highlighter verwenden
7. Veraltete Navigationsseite mit fehlerhaften Links (Alte Links weiterleiten!)
8. Lasy load + Alt Text = z.b Copy Right oder Bildbeschreibung

[Google PageSpeed](https://developers.google.com/speed/pagespeed/insights/?hl=de&url=http%3A%2F%2Fap1.arrenberg.studio%2F)

### Functions

#### Link Card
```php
link_card('Hallo Welt','Text....',get_template_directory_uri().'/assets/images/400x200.png', '/veranstaltungen');
link_card('Hallo Welt','Text....',get_site_url().'/wp-content/uploads/2020/05/CTL_Titelbild-1.jpg', '/veranstaltungen');
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
calendar_download($post); // nur für veranstaltungen
```
#### Card List
```php
card_list($query);
```

### Notes

Google Maps API Key `AIzaSyACLoR7TPeF55Gds8HFR6YmX2HhGKORhz` <br>
[WP Sync DB Media Files](https://github.com/wp-sync-db/wp-sync-db-media-files)

#### Get Rid of all untracked changes
```bash
git stash
```

#### Update public branch from master
```bash
git fetch
git checkout public
git reset --hard main
```

#### Trash commits ahead
```bash
git push --force
```

#### Checkout any commit
```bash
git checkout <commit-id> . 
```


### CSS Tricks

https://css-tricks.com/snippets/css/complete-guide-grid/ <br>
https://css-tricks.com/snippets/css/a-guide-to-flexbox/


### VS Code Plugins
extension.refreshBrowser <br>
felixfbecker.php-intellisense <br>
wordpresstoolbox.wordpress-toolbox <br>
rifi2k.format-html-in-php


## 🏛 Database Migration

0. Seiten mit templates verknüpfen
0. Regenerate Images
0. WP Cli installieren
0. Last Push to [vpp](https://vpp.arrenberg.studio)
1. Update (Optimise) through Wordpress
2. Comment Setting (WP Settings) 
3. Allow Comment on Post-Type (Post type list Buld action) Projekte
4. Custom Post Type enable Comments (Support) -> Projekte
5. Update Parmalinks
6. Delete Calendar Files (created in local host) + (create path to files)
7. Set Menu (name/slug: "menu") & Page Templates
10. ACFs Setting 'has archive' => True (veranstaltungen, nachrichten) + archiv slug! ({post-type-slug}-archiv)
11. CPT Anmerkung (anmerkungen)
12. ACF Anmerkung (Post-type == Anmerkung) Text (text)
12. TAX Anmerkung Version (version_anmerkungen) und Status (status_anmerkungen)
13. Seite für Anmerkungen erstellen und tempate festlegen = Anmerkungen
14. Feedback formular hide lable by id
16. Setup UM (Pages + Shortcodes)
    - Profile Picture Sizes (100 x 300)
17. Set up matomo

### --- Later
8. ACFs Veranstaltungen
    - Website
    - Livestream
    - start
    - end
9. ACFs Projekte
    - Ort
    - Kontakt

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
