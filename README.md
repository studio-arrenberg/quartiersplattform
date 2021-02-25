# Quartiersplattform Arrenberg

#### Repo für die [Quartiersplattform am Arrenberg](https://arrenberg.app)
Globale Entwicklungsumgebung unter [AP1](https://ap1.arrenberg.studio) Mockup auf [Marvel](https://marvelapp.com/prototype/8gfhabd/screen/73095691).
Unterstützt durch das Wuppertal Institut bei den Projekten [SolPlat](https://wupperinst.org/p/wi/p/s/pd/921/) und [UTL Arrenberg](https://wupperinst.org/p/wi/p/s/pd/905/) 


## 🧯 Wichtig 

## 📦 Requirements 

### Server
* `Wordpress` 5.5.1
* `PHP` 7.2.10

### Plugins
- [Advanced Custom Fields PRO](https://github.com/AdvancedCustomFields/acf)
- Custom Post Types
#### Later
- [PWA for WP](https://github.com/ahmedkaludi/pwa-for-wp) 
- [Favorites](https://github.com/kylephillips/favorites)
- Disable Rest API 
- Ulimate Member
- (WP Forms)

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
- Custom Post Type UI
- [WP Sync DB](https://github.com/wp-sync-db/wp-sync-db) Get Data from [AP1](http://ap1.arrenberg.studio/wp-admin/) 
- [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/)
- [Maintenance Redirect](https://wordpress.org/plugins/jf3-maintenance-mode/)

## 🔗 Set up
1. Setup local Wordpress 
2. Clone Repository *into wp-content/themes*
```sh
git clone https://github.com/studio-arrenberg/quartiersplattform.git
```
3. Sync Database with [WP Sync DB](https://github.com/wp-sync-db/wp-sync-db)
4. Copy `wp-content` manually
5. Install Plugins

## ⚙️ Development

### File structure
- Images, Icons, Fonts, etc. => `assets/`
- Pages (Templates) => `pages/`
- Template Parts (WP) => `template-parts`
- Elements (card, list-card, ...) => `elements/`
- Components (call-to-action, energieampel, feedback, ...) => `components/`
- Define colors => `inc/custom-css.php`
- Functions => `functions.php`
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
echo wp_date('F d, Y g:i a', strtotime($date)); // dont use php date() function!
date('Ymd', strtotime(get_field( "event_date" )));
```
* `F j, G:i` November 28, 21:00 
* `F j, Y G:i` November 28, 2020 21:00 
* `j. M G:i` 28. Nov 21:00


### Get term Archive
[Get Term Archive](https://wordpress.stackexchange.com/questions/48435/get-term-archive-url-link)
[More PHP Wordpress Snippets](https://github.com/studio-arrenberg/quartiersplattform/blob/main/wordpress.md)

### Recources 
- [Ajax Comments](https://rudrastyh.com/wordpress/ajax-comments.html)
- [Embla Carousel](https://davidcetinkaya.github.io/embla-carousel/#installation)
- [Ultimate Member Remove Recources](https://docs.ultimatemember.com/article/1490-how-to-remove-css-and-js-on-non-um-pages)
- [Mail Template Inline Styles Converter](https://templates.mailchimp.com/resources/inline-css/)
- [Emoji Picker](https://github.com/OneSignal/emoji-picker)

#### Other Emoji Libraries
* [jQuery Emoji Picker](https://github.com/wedgies/jquery-emoji-picker) [Demo](http://wedgies.github.io/jquery-emoji-picker/demo.html)
* [EmojioneArea](https://github.com/mervick/emojionearea) [Demo](https://jsfiddle.net/mervick/1v03Lqnu/765/)


### Image Sizes (Ratio)

| Name          | S       | M       | M(2)    | M(3)    | L       |
| ------------- | ------- | ------- | ------- | ------- | ------- |
| Square 1:1    | 80x80   | 180x180 | 300x300 | -       | 400x400 |
| Preview 4:3   | 160x120 | 200x150 | 400x300 | 600x450 | 800x600 |
| Landscape 2:1 | 400x200 | 750x375 | -       | -       | 970x485 |

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

### Matomo Event Tracking
[Basics](https://matomo.org/docs/event-tracking/)
[In Depth](https://developer.matomo.org/guides/tracking-javascript-guide)

```js
_paq.push(['trackEvent', 'Categories', 'Action', 'Name/Page URL', 1000]);
```
#### Tracked
* Share (social media buttons)
* Interaction (Energie Ampel, Slider)

#### Track Content

```js
_paq.push(['trackVisibleContentImpressions']);
```
```html 
<div data-track-content>
    <div data-content-piece="arrenberg wetter" >
    </div>
</div>
```
#### Tracked
* Arrenberg Wetter
* List Card
* Footer


### Functions

#### Link Card
```php
landscape_card($args); // iterate landscape card with wp query
landscape_card(null, 'Hallo Welt','Text....',get_site_url().'/wp-content/uploads/2020/05/CTL_Titelbild-1.jpg', '/veranstaltungen'); // without query
landscape_card(null, 'Hallo Welt','Text....',get_template_directory_uri().'/assets/images/400x200.png', '/veranstaltungen'); // without query
landscape_card($args, 'Geschichte', '', '', '/geschichten'); // combination Query and Manual
```
#### List Card
```php 
list_card($args3, get_site_url().'/veranstaltungen', 'title', 'subtitle');
```
#### Slider
`slides` get multiplied by 2 for desktop
```php
slider($query, $type = 'card', $slides = '2', $dragfree = 'true');
slider($query, $type = 'square_card', $slides = '4', $dragfree = 'true');
slider($query,'landscape_card', '1','false'); 
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
#### Comment Counter
```php
comment_counter($post->ID);
```
#### Get owner of Post
Including projekts
```php
get_cpt_term_owner($post_ID, $term, $type = 'name');
```
#### Get Author of Post Type
Should be used in the Wordpress Loop 
```php
get_author();
```

### Notes
- Google Maps API Key `AIzaSyACLoR7TPeF5*fünf*Gds8HFR6YmX2HhGKORhz`
- [WP Sync DB Media Files](https://github.com/wp-sync-db/wp-sync-db-media-files)

### MapBox
* [Studio](https://studio.mapbox.com)
* [Static Map](https://docs.mapbox.com/playground/static/)

#### Get Rid of all untracked changes
```bash
git stash
```

#### Update public branch from master
```s
git fetch
git checkout public
git reset --hard main
```

#### Go back in timelin
```bash
git fetch
git reset --hard *hash*
git push --force
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
- https://css-tricks.com/snippets/css/complete-guide-grid/ 
- https://css-tricks.com/snippets/css/a-guide-to-flexbox/

### Field Name Issue
acf differnet field groups with same name have same field id
* [is it safe](https://support.advancedcustomfields.com/forums/topic/it-is-possible-to-use-the-same-field-name-in-different-field-groups/)
* [update scf fields](https://support.advancedcustomfields.com/forums/topic/it-is-possible-to-use-the-same-field-name-in-different-field-groups/)

### VS Code Plugins
- extension.refreshBrowser
- felixfbecker.php-intellisense
- wordpresstoolbox.wordpress-toolbox
- rifi2k.format-html-in-php

# Issues before distribution
- CPT naming (Deutsch vs Englisch) ==> Deutsch
- Page Link naming (.app/veranstaltungen/...) (Deutsch vs Englisch) (Singular vs Plural) ==> Deutsch
- ACF naming constitent 
- UM `picture upload button` jQuery fix (updates should always work) ==> DONE
- `text` feld oder Gutenberg Editor für text

## Auto Setup
- Pages with Templates
- CPTs
- ACFs
- Menu 
- Landing Page with Gutenberg Block ..?
- Pre Filled option Page
  
## (new) ReadMe inhalt
- Introduction
  - Mission
  - Konzept
  - Features
  - Roadmap
- Setup
  - Requirements
- Partner / Exsamples
- Ressouces 

## Custom Setup
- General
- Structure by CPTs
  - files
  - databank
  - 
- Functions 
  - explained
- code policy
  - html element

### Custom Post Types
* Projekte `projekte`
* Nachrichten `nachrichten`
* Veranstaltungen `veranstaltungen`
* Umfragen `umfragen`
* Anmerkungen `anmerkungen`
* Fragen `fragen`
* Angebote `angebote`

#### Quartier Arrenberg: 
* Geschichten `geschichten`
* Team `team` **deprecated**


### Taxonomys
* Projekte `projekt` in `nachrichten`, `veranstaltungen`, `umfragen`
* Status `anmerkungen_status` in `anmerkungen`
* SDG `sdg` in `projekte`
### Advanced custom fields 
will soon be imported seperatly from the admin page into files in `setup/` folder.
## Code Snippets
- Wordpress
  - Links
  - Snippets
- Github
  - Commands
  


## 🏛 Database Migration (New Setup)

0. ~~Seiten mit templates verknüpfen~~
0. ~~Regenerate Images~~
0. ~~WP Cli installieren~~
0. ~~Last Push to [vpp](https://vpp.arrenberg.studio)~~
1. ~~Update (Optimise) through Wordpress~~
2. Comment Setting (WP Settings) 
3. Allow Comment on Post-Type (Post type list Buld action) Projekte
4. ~~Custom Post Type enable Comments (Support) -> Projekte~~
5. Update/Set Parmalinks
6. ~~Delete Calendar Files (created in local host) + (create path to files)~~
7. Set Menu (name/slug: "menu") & Page Templates
10. ACFs Setting 'has archive' => True (veranstaltungen, nachrichten) + archiv slug! ({post-type-slug}-archiv)
11. CPT Anmerkung (anmerkungen)
12. ~~ACF Anmerkung (Post-type == Anmerkung) Text (text)~~
12. ~~TAX Anmerkung Version (version_anmerkungen) und Status (status_anmerkungen)~~
13. ~~Seite für Anmerkungen erstellen und tempate festlegen = Anmerkungen~~
14. ~~Feedback formular hide lable by id~~
16. ~~Setup UM (Pages + Shortcodes)~~
    ~~- Profile Picture Sizes (100 x 300)~~
17. Set up matomo

## 🧫 Fundamental (notes)
- Moderiert (Quertier/Stadt) oder demokratisch
- Text oder Bildsprache 


```diff
- text in red
+ text in green
! text in orange
# text in gray
@@ text in purple (and bold)@@
```