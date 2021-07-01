<h1 align="center">Quartiersplattform</h1>
<!-- <p align="center">Developing a Plattform for self Districts</p> -->

<p align="center">
  <img src="https://img.shields.io/github/license/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="License"/>
  <img src="https://img.shields.io/github/repo-size/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Repo Size"/>
  <img src="https://img.shields.io/github/commit-activity/w/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Commits"/>
  <img src="https://img.shields.io/tokei/lines/github/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Lines of code"/>
  <img src="https://img.shields.io/github/languages/code-size/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Code Size"/>
</p>

<!-- ## Wordpress Snippets

![GitHub](https://img.shields.io/github/license/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square)

![GitHub repo size](https://img.shields.io/github/repo-size/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square)

![GitHub commit activity](https://img.shields.io/github/commit-activity/w/studio-arrenberg/quartiersplattform?color=%230091FF&style=flat-square)

![Lines of code](https://img.shields.io/tokei/lines/github/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square)

![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square) -->

## translation
- [x] strategy 1: load from theme directory 2: load from wordpress directory (initiate multilanguge)
- [x] name qp files with `quartiersplattform.mo` => not compliant
- [ ] add catalog in `/languages` dir (.php & .pot)
- [x] load `twentytwenty` translation files OR change strings in Theme to `quartiersplattform` (deutsch fehlt)
- [x] check & update `ultimate-member` translation files (..123)
- [x] check `twentytwenty` translation
- [x] check `reset-password.php`
- [x] check `404`
- [x] check `login`
- [x] check `profile`
- [x] check `archiv`
- [x] Wartungsmodus und Matomo field are gone
## future
- [x] Energie Wetter API and Plugin
- [x] cookie disclaimer
- [ ] notifications
- [ ] acf [avatar](https://thestizmedia.com/acf-pro-simple-local-avatars/)
- [x] Update note
- [x] Admin Settings
- [x] Startseite Scroll (ohne Inhalt in Firefox => .admin-bar)
- [x] Startseite Abstand der Inhalte
- [ ] Cant login when login page is not set through UM...
- [x] Multi Image upload preview!
- [ ] Locations! (Calendar)
- [ ] Projekt Liste (eigene als erstes)
- [ ] Projektverzeichnis Card (mehr bild und beschreibung...)
- [x] Open Graph Tags Extended
- [ ] Kalendar Uhrzeit Bis anzeigen (weitere felder ...?)
- [x] Kalendar Export Livestream..?
- [ ] no more `twentytwenty` language strings
## dokumentation
- troubleshooting
  - 404 error => permalinks neu initieren
- user kann seine deiträge nicht sehen
  - check rolle => contributor / mitarbeiter
- [UM Language Packs](https://translate.wordpress.org/projects/wp-plugins/ultimate-member/language-packs/)

## v1.7.3 🗓
- QP WP Actions (Overlays, Menu Buttons)
- Energie Ampel als Plugin
- Cookie Disclaimer
- Update Note für Admins
- Seite über den Status der Quartiersplattform
- Einstellungen der Quartiersplattform
- Redesign der Mails
- Verbesserung der Übersetzungen
- UM Profile Image Upload Helper
- Software Licence Update
- Open Graph Tags zur SEO optimierung
- Project Image Upload in settings
- Multiple Image Upload Preview
- Translation der Quartiersplattform
### Bugs
- ACF Loading Spinner
- Calendar Download File Fix
- Layout Issues
- Project security Fix

## v1.7.2 🚀
- Login Weiterleitung zu Projekten
- Sicherheitslücke Anheften und Sichtbarkeit Toggle behoben
- Startseite ohne Inhalte nicht scrollbar
- Authoren Card Namensfehler behoben

## v1.7 🚀
### Features
- Beiträge verbergen
- Pinned Posts (Projekt & Quartier)
- Neue Menu Leiste
- Neuer Footer
- Restrukturierte Quartiersseite
- Cookie Disclaimer
- Über Mich
- Ziele für Nachhaltige Entwicklung 
- Sichtbarkeitseinstellung von Beiträgen und Projekten
### Bugs
- Umfragen im Newsfeed
- Ajax mit Nonce Sicherheit
- Löschung aller Projekt Posts beim Löschen des Projektes
- CSS Editor
- Archiv Darstellung
- WP StrToDate Timezone

## Theme Publication

1.  [WordPress Coding Standards](https://codex.wordpress.org/WordPress_Coding_Standards)
2.  [Theme Requirments](https://make.wordpress.org/themes/handbook/review/required/)
3.  [Unit Test](https://codex.wordpress.org/Theme_Unit_Test)
4.  [Review Process](https://make.wordpress.org/themes/handbook/review/)
5.  Upload for Review

## Database Structure
#### Custom Post Types
* Projekte `projekte`
* Nachrichten `nachrichten`
* Veranstaltungen `veranstaltungen`
* Umfragen `umfragen`
* Anmerkungen `anmerkungen`
* Fragen `fragen`
* Angebote `angebote`

#### Taxonomys
* Projekte `projekt` in `nachrichten`, `veranstaltungen`, `umfragen`
* Status `anmerkungen_status` in `anmerkungen`
* SDG `sdg` in `projekte`

## Custom Functions
#### Link Card
```php
landscape_card($args); // iterate landscape card with wp query
landscape_card(null, 'Hallo Welt','Text....',get_site_url().'/wp-content/uploads/2020/05/CTL_Titelbild-1.jpg', '/veranstaltungen'); // without query
landscape_card(null, 'Hallo Welt','Text....',get_template_directory_uri().'/assets/images/400x200.png', '/veranstaltungen'); // without query
landscape_card($args, 'Geschichte', '', '', '/geschichten'); // combination Query and Manual
```
#### List Card
**🚨 deprechted**
```php 
list_card($args3, get_site_url().'/veranstaltungen', 'title', 'subtitle');
```
#### Slider
`slides` get multiplied by 2 for desktop view
```php
slider($query, $type = 'card', $slides = '2', $dragfree = 'true');
slider($query, $type = 'square_card', $slides = '4', $dragfree = 'true');
slider($query,'landscape_card', '1','false'); 
```
#### Shorten
```php 
shorten($text, $count = '55'); // für alles
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
author_card(true); // true for contact details (only for logged in users)
```
#### Creat Mail and Website links in Text
```php 
extract_links($text);
```
#### Display Date
```php
echo qp_date( $date, $detail = false, $time = '' );
```
#### Display Time remaining
```php
echo qp_remaining( $date );
```
#### Reminder Card
Logged in users can remove reminder cards (uses `ajax`).
```php
reminder_card( $slug, $title, $text, $button = '', $link = '' );
// example
reminder_card('unique_slug', 'Title', 'Text...', 'Impressum', home_url( ).'/impressum' );
// warning without ID no close button
reminder_card('warning', 'Dein Profil ist unsichtbar','' );
// warning with ID with close button
reminder_card('warning'.$current_user->ID, 'Dein Profil ist unsichtbar','' );
// without close button
reminder_card('', 'Dein Profil ist unsichtbar','' );
```
#### No Content Card
Used as placeholder if there is no content displayed
```php
no_content_card($icon, $title, $text, $link_text = '', $link_url = '')
```

#### Visibility Toggle
Toggle between `draft` and `pubish` for all post types.
Can only be used in Loop
```php
post_visibility_toggle();
```

#### pin_toggle($type = 'pin_project')
Pin Post or Pages on the Landing Page `pin_main` or Projekt Page `pin_project`
Can only be used in Loop
```php
pin_toggle($type = 'pin_project');
```

#### Visibility badge
Post status of Project or Post, shown when invisible 
Can only be used in Loop
```php
visibility_badge();
```

#### Project Owner
Checks if User has privilages for Post or Project
Can be used in if query
```php
qp_project_owner();
```

##### QP Permalink Parameter
Creates Link to current page if added parameter. 
```php
qp_parameter_permalink($suffix);
```

#### QP Backend Link
Creates Backend Link for admins
```php
qp_backend_edit_link();
```

#### Project Card
Displays the Project of a Post as Card
```php
project_card($id, $type = "post") 
```

#### Count Query
Counts the Query. Can be used in if query. `$amount` set threshold for *true*
```php
if (count_query($args, $amount))
```


## Actions

### How to use
```php 
do_action('qp_menu_button'); // define location and slug

add_action('qp_menu_button', 'energie_ampel_overlay', 10, 3); // add function to action with priority and variables 

function energie_ampel_overlay() { // init function
  // code ...
}
```

#### QP filter for menu buttons 'qp_menu_button' 
Used for buttons in the menu
```php 
do_action('qp_menu_button');
```

#### QP filter for overlays 'qp_overlays' 
Used for Overlays
```php 
do_action('qp_overlays');
```