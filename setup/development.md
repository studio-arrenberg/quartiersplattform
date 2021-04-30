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

## v1.7

### Features
- Beiträge verbergen
- Pinned Posts (Projekt & Quartier)
- Neue Menu Leiste
- Neuer Footer
- Restrukturierte Quartiersseite
### Bugs
- Umfragen im Newsfeed
- Ajax mit Nonce Sicherheit

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