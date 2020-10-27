# Quartiersplattform Arrenberg

Repo für die Quartiersplattform am Arrenberg <br> <br>
Globale Entwicklungsumgebung unter [AP1](https://ap1.arrenberg.studio) <br>
Plugins werden unter [AP01](https://ap01.arrenberg.studio) getestet<br>
Mockup auf [Marvel](https://marvelapp.com/prototype/8gfhabd/screen/73095691) <br>

## 🧭 Wichtig 

* Naming der Templates Files
* Englisch oder Denglish?
* Naming element (landscape_card) css (landscape card)

## Requirements 

### Server
`Wordpress` 5.5.1 <br>
`PHP` 7.2.10

### Plugins

[Advanced Custom Fields PRO](https://github.com/AdvancedCustomFields/acf) <br>
[Favorites](https://github.com/kylephillips/favorites) <br>
#### Later
[PWA for WP](https://github.com/ahmedkaludi/pwa-for-wp) <br>
Disable Rest API <br>

#### Optional (Development)
Custom Post Type UI
[WP Sync DB](https://github.com/wp-sync-db/wp-sync-db) Get Data from [AP1](http://ap1.arrenberg.studio/wp-admin/) <br>

## 🔗 Set up
1. Setup local Wordpress 
2. Clone Repository *in wp-content/themes*
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


### Recources 

[Ajax Comments](https://rudrastyh.com/wordpress/ajax-comments.html)

### Notes

Google Maps API Key `AIzaSyACLoR7TPeF55Gds8HFR6YmX2HhGKORhz`

[WP Sync DB Media Files](https://github.com/wp-sync-db/wp-sync-db-media-files)


### CSS Tricks

https://css-tricks.com/snippets/css/complete-guide-grid/ <br>
https://css-tricks.com/snippets/css/a-guide-to-flexbox/


### VS Code Plugins
extension.refreshBrowser <br>
felixfbecker.php-intellisense <br>
wordpresstoolbox.wordpress-toolbox <br>

