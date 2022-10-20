# Quartiersplattform
Entwicklung der Quartiersplattform

<p>
  <img src="https://img.shields.io/github/license/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="License"/>
  <!-- <img src="https://img.shields.io/github/repo-size/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Repo Size"/> -->
  <img src="https://img.shields.io/tokei/lines/github/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Lines of code"/>
  <img src="https://img.shields.io/github/languages/code-size/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Code Size"/>
  <img src="https://img.shields.io/github/commit-activity/m/studio-arrenberg/quartiersplattform?color=%23f7f7f7&style=flat-square" alt="Commits"/>
  <img alt="Scrutinizer code quality (GitHub/Bitbucket)" src="https://img.shields.io/scrutinizer/quality/g/studio-arrenberg/quartiersplattform/main?style=flat-square">
</p>
<br>

#### Code Quality on [scrutinizer](https://scrutinizer-ci.com/g/studio-arrenberg/quartiersplattform/?branch=main)
<br>

# Backlog
- [ ] Project Notifications (Branch: `notifications`)
- [ ] ACF Profile Upload [Avatar](https://thestizmedia.com/acf-pro-simple-local-avatars/)
- [ ] Cant login when login page is not set through UM...
- [ ] Projekt List function (rank by ownership)
- [x] Projektverzeichnis Card (Picture + Text)
- [ ] Remove `twentytwenty` Language strings
- [ ] Publish as Theme
- [x] Bilder vergrößern
- [ ] Werkzeugkasten immer sichtbar (über reitern)
- [ ] Welcome screen for registered users
- [ ] Navigation durch die Projekte (Mobile ansicht)
- [ ] View Pictures in Large => Plugin
- [x] Cookie Warning mit Timeout (Relese Snapshots)
- [ ] Bessere Einbettung der Kommentare (Einloggen zum Schreiben...) 
- [ ] Gestaltung der Startseite (Gutenberg Blocks)
- [ ] Emojis laden manchmal nicht direkt
- [x] Energie Ampel Fallback/Error Display
- [ ] Advanced Custom fields (free) compatible
- [ ] Decide between Project `icon` or `image` for the badge
- [ ] Contact [Altengerechte Quartiere.NRW](https://www.aq-nrw.de/ueber-uns/landesbuero-altengerechte-quartierenrw/unsere-leistungen/?schluessel=praxis#praxis)
- [x] Menu as html buttons not list
- [ ] Quartiersüberblick (Sprachen, Projekte, Wiki, Bezirksvertretung)
- [x] Logout button direkt im Profil
- [ ] WP Uploader Admin => Show all Uploads
- [x] I/O fields bestätigung ✅
- [ ] Projekt Seite => Seitenleiste besser nutzen
- [ ] Anmerkungen Mails an Admins

### ACF Issues
- [ ] multiple image upload
- [ ] wp uploader all images for admins
- [ ] acf form time H:i (without seconds not possible)

### Bugs
- [x] Leere Chronik `no content card` wird im falschen reiter angezeigt
- [x] Update Project Modify date when post is edited!
- [x] Share to facebook (open graph tags)

<br><br>

# Versions

## v1.8.3
*see release notes on github*
## v1.8.2
- Rechtschreibfehler

## v1.8.2

### Fixes
- Neue Gestaltung der Projektkachel
- "Im Kalendar Eintragen" -> ".iCal Herunterladen"
- Facebook Teilen Link
- Rechtschreibung
- WP Bilder Hochladen Feature (für Admins)
- ACF Einstellungen Bilder Upload Fix
- Backend Font *Cairo*
- Veranstaltungen Überlappung Startseite `CSS` Fix
- Featured Image vollständig sichtbar
- Bilder im Newsfeed in voller Auflösung
- Author Card Fix
- Umfragen Link Highlight
- Kommentar Link zum Profil Fix
- Update Projekt on Post update
- Mail with inline styles
- Sponsor Images with WP Image function
- Umfragen Titel und Text nachträglich editierbar
- User und Admin informationen im Profil
## v1.8 💬
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
- WP Bilder Hochladen Feature (für Admins)
### Bugs
- ACF Loading Spinner
- Calendar Download File Fix
- Layout Issues
- Project security Fix
- "Im Kalendar Eintragen" -> ".iCal Herunterladen"
- FB Teilen Link ist falsch
- Bild Auflösung im Projektfeed

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