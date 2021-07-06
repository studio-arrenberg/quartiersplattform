# Quartiersplattform
Entwicklung der Quartiersplattform

<p>
  <img src="https://img.shields.io/github/license/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="License"/>
  <!-- <img src="https://img.shields.io/github/repo-size/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Repo Size"/> -->
  <img src="https://img.shields.io/github/commit-activity/w/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Commits"/>
  <img src="https://img.shields.io/tokei/lines/github/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Lines of code"/>
  <img src="https://img.shields.io/github/languages/code-size/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Code Size"/>
</p>
<br><br>

# Backlog
- [ ] Project Notifications (Branch: `notifications`)
- [ ] ACF Profile Upload [Avatar](https://thestizmedia.com/acf-pro-simple-local-avatars/)
- [ ] Cant login when login page is not set through UM...
- [ ] Projekt List function (rank by ownership)
- [ ] Projektverzeichnis Card (Picture + Text)
- [ ] Remove `twentytwenty` Language strings
- [ ] Publish as Theme
- [ ] Bilder vergrößern
- [ ] Werkzeugkasten immer sichtbar (über reitern)
- [ ] Alternative zum Admin (eine rolle tiefer...)

<br><br>

# Versions
## v1.8 💬
### Missing
- [x] "Im Kalendar Eintragen" -> ".iCal Herrunterladen"
- [-] Pinnen feature richtig erklären
- [x] FB Teilen Link ist falsch
- [x] "Quarier" Rechtschreibung
- [ ] WP Bilder Hochladen Feature (für Admins)
- [ ] Reihenfolge im Projekt Carousel
- [ ] ACF Einstellungen Bilder Upload (Bisherige Werden gelöscht)
- [ ] Officina im Backend verlinkt => Cairo
- [ ] Emoji Picker (height) Projekt Einstellungen
- [ ] Veranstaltungen Überlappung Startseite
- [ ] Nachricht/Veranstaltungs Bild nicht voll sichtbar (Andreas)
- [ ] Bilder im Newsfeed nicht in voller Auflösung

### Features
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

### Features
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

<br><br>
# Quartierplattform Functions
### Link (Landscape) Card
```php
landscape_card($args); // iterate landscape card with wp query
landscape_card(null, 'Hallo Welt','Text....',get_site_url().'/wp-content/uploads/2020/05/CTL_Titelbild-1.jpg', '/veranstaltungen'); // without query
landscape_card(null, 'Hallo Welt','Text....',get_template_directory_uri().'/assets/images/400x200.png', '/veranstaltungen'); // without query
landscape_card($args, 'Geschichte', '', '', '/geschichten'); // combination Query and Manual
```
### Slider
```php
slider($query, $type = 'card', $slides = '2', $dragfree = 'true');
slider($query, $type = 'square_card', $slides = '4', $dragfree = 'true');
slider($query,'landscape_card', '1','false'); 
```
`slides` get multiplied by 2 for desktop view
### Shorten
```php 
shorten($text, $count = '55'); // für alles
```
Prints String with in function.
### Calendar Download
```php
calendar_download($post); // nur für veranstaltungen
```
### Card List
```php
card_list($query);
```
### Get owner of Post
Including projekts
```php
get_cpt_term_owner($post_ID, $term, $type = 'name');
```
### Get Author of Post Type
Should be used in the Wordpress Loop 
```php
// contact true/false => show mail and phone
// $user int => specify user id
// $profile true/false => show profile picture and name
author_card($contact = true, $user = '', $profile = true); 
```
### Creat Mail and Website links in Text
```php 
extract_links($text);
```
Create `HTML` Links for Mails and Website Links in text.
### Display Date
```php
// $date => timestamp in Unix time format
// $datail true/false => display H:i
// $time H:i:s => if Daytime is seperated
// $time_only true/false => Show H:i without date
echo qp_date( $date, $detail = false, $time = '', $time_only = false );
```
### Display Time remaining
```php
echo qp_remaining( $date );
```
### Reminder Card
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
### No Content Card
Used as placeholder if there is no content displayed
```php
no_content_card($icon, $title, $text, $link_text = '', $link_url = '')
```
### Visibility Toggle
Toggle between `draft` and `pubish` for all post types.
Can only be used in Loop
```php
post_visibility_toggle();
```

### Pin Toggle
Pin Post or Pages on the Landing Page `pin_main` or Projekt Page `pin_project`
Can only be used in Loop
```php
pin_toggle($type = 'pin_project');
```

### Visibility badge
Post status of Project or Post, shown when invisible 
Can only be used in Loop
```php
visibility_badge();
```

### Project Owner
Checks if User has privilages for Post or Project.
Can be used in `if` Statement.
```php
// $project by Slug to specify the project
qp_project_owner($project = '');
```

### QP Permalink Parameter
Creates Link to current page if added parameter. 
```php
qp_parameter_permalink($suffix);
```

### QP Backend Link
Creates Backend Link for admins.
```php
qp_backend_edit_link();
```

### Project Card
Displays the Project of a Post as Card
```php
project_card($id, $type = "post") 
```

### Count Query
Counts the Query. Can be used in if query. `$amount` set threshold for *true*
```php
if (count_query($args, $amount))
```

### QP Language
Detect, Sets & Returns the user Language. 
```php 
qp_language();
```
### QP Detect Browser Language
Detect the Browser Language.
```php
qp_detect_browser_language();
```
## Actions

### How to use
```php 
do_action('qp_menu_button'); // define location and slug

function energie_ampel_overlay() { // init function
  // code ...
} add_action('qp_menu_button', 'energie_ampel_overlay', 10, 3);
```

### QP filter for menu buttons 'qp_menu_button' 
Used for buttons in the menu
```php 
do_action('qp_menu_button');
```

### QP filter for overlays 'qp_overlays' 
Used for Overlays
```php 
do_action('qp_overlays');
```

<br><br>

# Database Structure
#### Custom Post Types
* Projekte `projekte`
* Nachrichten `nachrichten`
* Veranstaltungen `veranstaltungen`
* Umfragen `umfragen`
* Anmerkungen `anmerkungen`
#### Taxonomys
* Projekte `projekt` in `nachrichten`, `veranstaltungen`, `umfragen`
* Status `anmerkungen_status` in `anmerkungen`
* SDG `sdg` in `projekte`

# Resources
### Wordpress Theme Publication

1.  [WordPress Coding Standards](https://codex.wordpress.org/WordPress_Coding_Standards)
2.  [Theme Requirments](https://make.wordpress.org/themes/handbook/review/required/)
3.  [Unit Test](https://codex.wordpress.org/Theme_Unit_Test)
4.  [Review Process](https://make.wordpress.org/themes/handbook/review/)
5.  Upload for Review

