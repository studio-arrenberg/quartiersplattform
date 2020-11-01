# Quartiersplattform Arrenberg

Repo für die Quartiersplattform am Arrenberg <br> <br>
Globale Entwicklungsumgebung unter [AP1](https://ap1.arrenberg.studio) <br>
Plugins werden unter [AP01](https://ap01.arrenberg.studio) getestet<br>
Mockup auf [Marvel](https://marvelapp.com/prototype/8gfhabd/screen/73095691) <br>

## 🧯 Wichtig 

- [ ] Bilder einbetten
- [ ] Archieve (Nachrichten, Veranstaltungen)

## 📦 Requirements 

### Server
`Wordpress` 5.5.1 <br>
`PHP` 7.2.10

### Plugins

[Advanced Custom Fields PRO](https://github.com/AdvancedCustomFields/acf) <br>
[Favorites](https://github.com/kylephillips/favorites) <br>
#### Later
[PWA for WP](https://github.com/ahmedkaludi/pwa-for-wp) <br>
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

### Recources 

[Ajax Comments](https://rudrastyh.com/wordpress/ajax-comments.html) <br>
[Embla Carousel](https://davidcetinkaya.github.io/embla-carousel/#installation)


### Image Sizes (Ratio)

|           | S       | M       | L       |
|-----------|---------|---------|---------|
| Square    | 50x50   | 180x180 | 300x300 |
| 4:3       | 160x120 | 200x150 | 800x600 |
| Landscape | 200x100 | 400x200 | 970x485 |

### Functions

#### Link Card
```php
link_card('Hallo Welt','Text....','/assets/images/400x200.png', '/veranstaltungen');
```
#### Card List
```php 
card_list($query, $link); 
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


## 🧫 Fundamental

- Moderiert (Quertier/Stadt) oder demokratisch
- Text oder Bildsprache 

## 🎉 Releases

### development - v1
- Startseite
- Projekte
- Veranstaltungen
- Energie Ampel
- Feedback

- [x] Startseite
- [x] Projekte
- [x] Veranstaltungen
- [x] Energie Ampel
- [ ] Feedback
- [x] Menu
- [ ] Footer
- [ ] Login/Registrieren
- [ ] Email templates
- [ ] Profil bearbeiten
- [ ] Remove Eneregie ampel when not enough data