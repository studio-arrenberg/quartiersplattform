# Installationsleitfaden (engl.)
Ich habe versucht, meine Installation der QP zu dokumentieren. Vielleicht hilfreich für andere ;)

## Datenbank erstellen
* Abhängig von eurer Hosting Umgebung und Provider
* Notiert euch den DB-host (URL), -namen, -benutzer & -password
## Install Wordpress
* Loggt euch mittels `SSH` auf eurem Webspace ein. (Falls ihr keinen SSH Zugang habt, geht es auch über FTP. Dann müsst ihr den Download und das Entpacken aber lokal vornehmen und den entpackten Ordner per FTP auf den Server laden)
* Ladet `latest.zip` from WP.org

`wget https://wordpress.org/latest.zip`
* und entpackt das ZIP

`unzip latest.zip -d folder_of_your_choice/`
* Dies entpackt `latest.zip` in den Ordner folder_of_your_choice/wordpress, weshalb wir das Ganze noch in folder_of_your_choice/ verschieben müssen

```
mv folder_of_your_choice/wordpress/* folder_of_your_choice/
rm -r folder_of_your_choice/wordpress
```
* Stellt bei eurem Hoster die Domain (example.com) so ein, dass sie auf folder_of_your_choice/ verweist. Dies geschieht in den DNS oder Domain Einstellungen eures Hosters
* Öffnet `http://example.com/wp-admin/install.php` in eurem Webbrowser
* Folgt dem Einrichtungs-Assistenten und gebt eure Daten für die Datenbank ein
* Vergebt einen Namen und erstellt den Admin-Benutzer mit einem sicheren Kennwort
* So alles erfolgreich verlaufen ist, landet ihr in eurem WP-Dashboard (Der Konfigurationsoberfläche von WP)
## Installiert das QP-Theme
### Download & Installation aus dem WP-Dashboard
* Ladet die aktuellste Version der Quartiersplattform von Github -> Releases
* Geht zu "Design --> Theme installieren", wählt die `Quartiersplattform.zip` und ladet diese hoch
* Sobald die Quartiersplattform hochgeladen und installiert ist, aktiviert das Theme.

**ACHTUNG**: Zu Zeit, als diese Anleitung entstand (15.6.22), war die letzte Version (1.8.2) von der Release-Seite fehlerhaft und installiert nur Version 1.8(!), mehr dazu: [Issue #133](https://github.com/studio-arrenberg/quartiersplattform/issues/133)
### Alternative #1 - das QP-Repo klonen
Hier ist eine Alternative, die zudem eigentich die bessere Variante ist, da sie spätere Updates erleichtert. Ihr 'klont' das QP-Repo einfach auf euren Webspace (erfordert SSH-Zugang). Dies erlaubt später ein Update des Themes mittels `git pull`:
* Loggt euch mittels SSH auf eurem Webspace ein, geht in den Themes-Ordner eurer WP-Installation und 'zieht' das Repo:

```
cd ~/wordpress/wp-content/themes
git clone https://github.com/studio-arrenberg/quartiersplattform.git
```
* Nun muss das Theme nur noch im Dashboard aktiviert werden
### Alternative #2 - ZIP von der Repo-Hauptseite laden
Eine andere Option ist es, das Theme von der Hauptseite des QP-Repos zu laden. Dafür oben auf der Hauptseite auf `Code --> Download ZIP`klicken, das ZIP hochladen und installieren, wie oben erklärt.

## Installation der benötigten Plugins
* Installiert `ACF *Pro*`, indem ihr dem Link im Dashboard folgt
* Installiert `Ultimate Member`, indem ihr dem Link im Dashboard folgt
* Selbiges mit dem Plugin `WP Mail SMTP`
* aktivieren der Plugins nicht vergessen
## Konfiguration der Quartiersplattform
### Ultimate Ultimate Member
* Einrichtung, wie in der Doku erklärt: [Ultimate Member](https://github.com/studio-arrenberg/quartiersplattform/blob/main/documentation/Ultimate_Member.md)
* Lasst vom Plugin die Seiten erstellen (blauer Knopf im Dashboard)
* Geht zu `Ultimate Member --> Formulare` und notiert euch den `Shortcode` für das `Default Profile`. Bei mir war es [ultimatemember form_id="42"]
* Geht zu `Seiten` im Dashboard Menü, wähl die Seite `Profil` und gebt den Shortcode ein (Wäht den `+` Knopf, um einen (Gutenberg-)Block hinzuzufügen, tippt `shortcode`, um einen shortcode-block zu erstellen und fügt den notierten Code ein. Mit `Aktualisieren` speichert ihr das Ganze. 

Die Dokumentation zeigt hier derzeit das falsche Bild. Hier habe ich bereits einen PR gepostet: **FIXED** [PR#136](https://github.com/studio-arrenberg/quartiersplattform/pull/136)
* Geht zurück zum Dashboard indem ihr auf das Wordpress-Logo **W** oben links klickt
* Geht zu `Ultimate Member --> Einstellungen --> Design --> Profil Menu` und deaktiviert es. Speichern nicht vergessen
* Geht zu `Ultimate Member --> Einstellungen --> Allgemein --> Konto` und deaktiviert `Datenschutz, Nachrichten, Konto löschen`, wie in der Doku angegeben. Speichern nicht vergessen 

**FRAGE**: Wie kann ein Nutzer sein Konto löschen!? Die Dokumentation ist hier unklar und es gibt keine Option im Benutzermenü auf der Plattform. [Issue #130](https://github.com/studio-arrenberg/quartiersplattform/issues/130)
* Der nächste Schritt der Doku, deaktivieren von `Profilweiterleitung & Mitgliederverzeichnis` in `Ultimate Member --> Einstellungen --> Allgemein --> Konto` scheint obsolet, wenn ich die Doku richtig deute. Diese Einstellungen sind deaktiviert und lassen sich auch nicht aktivieren.
**BEHOBEN**, PR: https://github.com/studio-arrenberg/quartiersplattform/pull/136
* Geht zu `Ultimate Member --> Einstellungen --> E-Mail` und deaktiviert alles, außer `Willkommens-, Aktivierungs- & beiden Passwort E-Mails`. Ich habe ebenso die Chance genutzt und den `Betreff` der Mails in eine einheitliche Form gebracht: `{site_name} - ...`. Ebenfalls aktiviert habe ich `Neuer Benutzer Benachrichtigung` für den Admin, um über neue Registrierungen informiert zu werden. Könnte für den Anfang spannend sein.
* Den Schritt, `Einstellungen --> Weiterleitungen` habe ich hier ausgelassen, da die Doku erklärt, dies wäre nun automatisiert.

**FRAGE**: Ist das obsolet?
* Möchtet ihr, dass neue Benutzer ihre Mail-Adressse bestätigen (Link in einer Mail), müsst ihr die entsprechende Einstellung in `Ultimate Member --> Benutzerrollen --> Contributor` unter `Registrierungs Optionen` ändern.

**FEHLER**: Egal welchen `Betreff` ihr bei der Bestätigungsmail angebt, der Betreff ist immer `checkmail_email`!? [Issue #131](https://github.com/studio-arrenberg/quartiersplattform/issues/131)
#### Weitere von mir gemachte Einstellungen
* Ich wollte `*` an den notwendigen Angaben bei der Registrierung. 
* Die Einstellung, um diese `*` zu aktiviereb findet sich in `Ultimate Member --> Einstellungen --> Sonstiges` und heißt: `Ein Sternchen für erforderliche Felder anzeigen`. 
* Solltet ihr das auch machen, bedenkt, dass die Übersetzung der Seite dann nicht mehr ordnungsgemäß funktioniert und `Benutzername` wird zu `username` und `Passwort` zu `password`. Um dies zu ändern, geht zu `Ultimate Member --> Formulare`, wählt `Default Registration`. Klickt auf den Stift neben `Username` und ändert die `Beschriftung` zu `Benutzername`. Selbiges für `Password`. 
* Während ihr gerade dabei seid, aktiviert das Kästchen `Ist dieses Feld erforderlich?` bei der `Email Adress` auf `true` 
* Möchtet ihr, dass die `Datenschutzerklärung` bei der Anmeldung bestätigt werden muss, gibt es dafür eine Option auf der rechten Seite. Wechselt das drop-down Menü zu `Ja` und gebt eure entsprechende Seite für die `Datenschutzerklärung` an. Der Rest kann bleiben, wie er ist.
* Wenn ihr fertig seid, klickt `Aktualisieren` oben rechts, zum Speichern der Änderungen.
### WP Mail SMTP
* Installation des Plugins, wie im Dashboard angegeben durch Klick auf den blauen Knopf. [Doku](https://github.com/studio-arrenberg/quartiersplattform/blob/main/documentation/WP_Mail_SMTP.md)
* Nach der Aktivierung folgt einfach dem Einrichtungs-Assistenten 
* Wählt `Benutzerdefinierter SMTP Server`, weiter
* Gebt die Daten eures SMTP-Servers ein, TLS, Port, Name und Kennwort und beendet den Assistenten. Es sind keine weiteren Angaben mehr nötig. Ich erhielt nach der Einrichtung und der Testmail 2 Fehler (SPF & DMARC), allerdings wurde die Mail korrekt verschickt.
#### Beheben von SPF & DMARC
* Den SPF-Fehler konnte ich durch Hinzufügen eines DNS-Records (TXT) in den DNS Einstellungen meines Providers erledigen. Hier bin ich einfach der Anleitung meines Hosters gefolgt (Ionos)
* Auch der DMARC-Fehler ließ sich mittels eines DNS-Records beheben: `TXT, _dmarc, "v=DMARC1;p=none;pct=100"`
* Nach Hinzufügen dieser 2 DNS-Records wurde die Testmail ordnungsgemäß versandt und `WP MAil SMTP` meldete keine Fehler mehr ;)
### Einrichtung der Quartiersplattform
#### `Datenschutzerklärung` hinzufügen
* Klickt den Knopf im Dashboard. Bei meinem ersten Versuch, die QP aufzusetzen, gab es die Seite `Datenschutzerklärung` noch nicht, weshalb ich sie nicht im Drop-Down auswählen konnte, sondern erstellen lassen musste. Beim zweiten mal gab es die Seite!?
* Wählt `Bearbeiten`, um die Seite anzupassen
* Nach der Bearbeitung klickt auf `Veröffentlichen`, um die Seite zu speichern und online zu stellen.
* Klickt auf das Wordpress-Logo **W** oben links, um wieder zum Dashboard zu gelangen
#### `Impressum` hinzufügen
* Wieder Knopf im Dashboard klicken
* Wählt die Seite `Impressum`
* Bearbeitet die Seite und klickt `Aktualisieren` zum Speichern
* Verlasst den Editor wieder
#### Eure Quartiers-Einstellungen
* Wieder Knopf im Dashboard
* Gebt der Seite einen Namen (Die Länge ist beschränkt!!)
* Fügt Überschrift und Beschreibung hinzu
* Ebenfalls ein Titelbild und ein Logo

**VERBESSERUNG:** Es wäre gut, wenn es beim Upload von Bildern direkt Angaben zur optimalen Größe der Bilder gäbe. Dies würde das Hochladen in der richtigen Größe erleichtern. Es gibt Größen und Seitenverhältnisse [HIER](https://github.com/studio-arrenberg/quartiersplattform/blob/main/documentation/development-notes.md)

**ACHTUNG:** Das Titelbild wird irgendwie beschnitten und es brauchte zahlreiche Versuche, das gewünschte Bild und den gewünschten Ausschnitt vorab so zu bearbeiten, dass es dann auch passte!
### Das `Energie Ampel` Plugin
* Ladet euch das Plugin von hier: https://github.com/studio-arrenberg/energie-ampel-plugin
* Geht zu `Plugins --> Installieren`, wählt `Plugin hochladen` (oben auf der Seite)
* Aktiviert das Plugin

## Weitere nützliche Plugins
* WPForms. Habe ich auf der Seite arrenberg.app und unserlangerfeld.de gesehen. Einen Nutzen habe ich noch nicht entdeckt!?
* Statify (hübsches Statistik-Plugin, ohne Goole-Analytics nutzen zu müssen)

## Überbleibsel
* Das Ultimate Member Plugin meldete bis zuletzt `noch nicht vollständig eingerichtet` im Dashboard Hab ich was vergessen!?

**FRAGE:** Was fehlt? Was brauchts, dass die Nachricht von alleine verschwindet?
* Nach der Installation der QP war es mir nicht mehr möglich, mich im Admin-Dashboard anzumelden! Weder example.com/wp-admin, noch example.com/wp-login funktionierten. Dies ist ein länger bekannter Fehler [Issue #43](https://github.com/studio-arrenberg/quartiersplattform/issues/43), wie ich heute festgestellt habe. Dies hat mir ganz schön Kopfzerbrechen bereitet, da es nicht dokumentiert ist!

**HINWEIS:** Wenn ihr aufs Dashboard wollt, meldet euch mit den Zugangsdaten eures Admin-Kontos auf der Quartiersplattform an. Es sollte dann eine Zeile ganz oben auf der Seite erscheinen, von wo aus ihr ins Dashboard kommt.
* Die Einstellung, um dies zu ändern, findet ihr bei den Benutzerrollen `Ultimate Member --> Benutzerrollen` in der jeweiligen Rolle

**FRAGE:** Ist es richtig, dass nur 3 Benutzerrollen von der QP aktiv genutzt werden? _Admin_, _Contributor/Mitarbeiter_ (Standard-Rolle für neue Benutzer und _First mover_ (erlaubt die Anmeldung und Einrichtung von Projekten, etc, auch wenn die Seite im Maintenance-Modus ist)

**VERBESSERUNG:** Es wäre super, wenn es wenigstens noch eine weitere Rolle gäbe (_Editor/Redakteur_). Hintergrund: Aktuell ist es nur Admins möglich, ein Projekt oder eine Veranstaltung im WP-Editor zu bearbeiten. Dieser erlaubt aber wesentlich umfangreichere und elegantere Bearbeitungen (Bilder, Gallerien, etc.), als der Editor in der QP. Es wäre also sehr nett, wenn die Rolle _Editor/Redakteur_ hierfür zu nutzen wäre. So könnte es eine Art _Projekt-Admins_ geben, die ihre Projekte dezidierter bearbeiten können, ohne gleich Admin sein zu müssen und wichtige Einstellungen der Plattform selbst verstellen zu können. Mehr: [Issue #132](https://github.com/studio-arrenberg/quartiersplattform/issues/132)
# Betrieb und Gestaltung
## Site Pin
* Man kann Seiten im WP-Editor `anpinnen`. Macht ihr das, so erscheint ein Link zur Seite unterhalb eurer Beschreibung auf der Startseite der Plattform. 

**HINWEIS:** Aktuell können dies nur Admins (s.o.)
* Mehrere gepinnte Seiten werden nach absetigendem Datum (Veröffentlichungsdatum der Seite) sortiert.

## Projekt Pin
* Admins (und wiederum nur diese) können bestimmte Projekte prominent auf der Startseite `anpinnen`.

## Veranstaltungs Pin
* Projekt-Eigentümer können Nachrichten und Veranstaltungen anpinnen, so dass diese immer oben in der Projekt-Chronic landen

## Benutzerrollen
* Es sind keine weiteren Rollen sinnvoll zu verwenden, außer _Contributor/Mitarbeiter_ und Admins. Die _First mover_ sind da ein Sonderfall

**VERBESSERUNG**: Wenigstens noch eine weitere Rolle (Redakteur) wäre sinnvoll! (s.o.)
