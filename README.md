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
[Favorites](https://github.com/kylephillips/favorites) <br>
#### Later
[PWA for WP](https://github.com/ahmedkaludi/pwa-for-wp) <br>
Disable Rest API <br>
(Buddy Press)<br>
(WP Forms)<br>

#### Optional (Development)
Custom Post Type UI
[WP Sync DB](https://github.com/wp-sync-db/wp-sync-db) Get Data from [AP1](http://ap1.arrenberg.studio/wp-admin/) <br>

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

Path to Theme files
```php
<?php echo get_template_directory_uri(); ?>
```
Home URL
```php
<?php echo get_site_url(); ?>
```

### Recources 

[Ajax Comments](https://rudrastyh.com/wordpress/ajax-comments.html) <br>
[Embla Carousel](https://davidcetinkaya.github.io/embla-carousel/#installation)


### Functions

#### Link Card
```php
link_card('Hallo Welt','Text....','/assets/images/400x200.png', '/veranstaltungen');
```
#### Card List
```php 
card_list($query); 
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

### Notes

Google Maps API Key `AIzaSyACLoR7TPeF55Gds8HFR6YmX2HhGKORhz` <br>
[WP Sync DB Media Files](https://github.com/wp-sync-db/wp-sync-db-media-files)

#### 🚦 Energie Ampel
##### Phase:
```mysql
SELECT Ampel.status,  ampel_status.color, FLOOR( RAND() * (( ampel_status.carbon_factor + 20) - (ampel_status.carbon_factor - 20)) + (ampel_status.carbon_factor - 20)) as gramm, FLOOR(ampel_status.carbon_factor) FROM `Ampel` 
join ampel_status on Ampel.status = ampel_status.id
WHERE `timestamp` = '2020-10-28 15:00' 
Limit 0,1
```
##### Timeline:
```mysql
SELECT ampel_status.color, ampel_status.name,  DATE_FORMAT( Ampel.timestamp,'%H:%i') as time FROM Ampel 
Join ampel_status on Ampel.status = ampel_status.id
WHERE `timestamp` >= '$datetime' - INTERVAL 24 Hour AND `timestamp` < '$datetime' + INTERVAL 24 Hour
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

0. Last Push to [vpp](https://vpp.arrenberg.studio)
1. Update (Optimise) through Wordpress
2. Comment Setting (WP Settings)
3. Allow Comment on Post-Type (Post type list Buld action)
4. Custom Post Type enable Comments (Support) -> Projekte, Veranstaltungen
5. Update Parmalinks

## 🧫 Fundamental

- Moderiert (Quertier/Stadt) oder demokratisch
- Text oder Bildsprache 