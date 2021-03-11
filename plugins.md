![Quartiersplattform Banner](https://github.com/studio-arrenberg/quartiersplattform/raw/main/.github/assets/quartiersplattform-banner-02.jpg)

## Dokumentation für die Quartiersplattform
Hier finden sich alle Informationen und Einstellungen die für die korrekte Einrichtung der Quartiersplattform benötigt werden.

### Plugin – WP Mail SMTP
1. Installieren Sie das Plugin über den Wordpress Plugin Manager. [WP Mail SMTP](https://de.wordpress.org/plugins/wp-mail-smtp/) 
2. Aktivieren Sie das Plugin.
3. Starten Sie den Plugin Assistenten.
4. Wählen Sie andere SMTP Verbindung aus.
5. Tragen Sie Ihre SMTP-Login Informationen ein.
6. Überspringen Sie Schritt 4-6 (Die PRO Version wird nicht benötigt).
7. Senden Sie eine Test Mail, um die Einstellungen zu überprüfen.
8. Das WP-SMTP Plugin wurde erfolgreich eingerichtet.

### Plugin Ultimate Member

#### Installation
1. Installieren Sie das Plugin über den Wordpress Plugin Manager. [Ultimate Member](https://de.wordpress.org/plugins/ultimate-member/) 
2. Aktivieren Sie das Plugin.
3. Öffnen Sie den Bereich Ultimate Member im Wordpress Admin Panel.
4. Erstellen Sie die Seiten durch das Ultimate Member Plugin.
![Seiteneinstellungen](/documentation/UM_Pages_Documentation.jpg)
<br>
<br>

#### Einstellungen Formulare
1. Tragen Sie auf der Seite Profil den Shortcode von Ultimate Member für das Profil Formular ein. Diesen finden Sie in den Ultimate Member Einstellungen im Bereich Formulare.
![Formulare](/documentation/UM_Allgemein_Benutzer_Documentation.jpg)
<br>
<br>
2. Deaktivieren Sie das Profil Menü in den Einstellungen von Ultimate Member unter dem Reiter Design.
![Profil Menü](/documentation/UM_Design_Profilmenu_Documentation.jpg)
<br>
<br>
3. Deaktivieren Sie in den Einstellungen "Allgemein --> Konto" die Datenschutz, Nachrichten und die Konto löschen Registerkarte.
![Datenschutz](/documentation/UM_Allgemein_Konto_Documentation.jpg)



#### Einstellungen – Benutzer
1. Deaktivieren Sie in den `Einstellungen von Ultimate Member` unter dem Bereich Benutzer die Profilweiterleitung und das Mitgliederverzeichnis. <br>
![Benutzereinstellungen](/documentation/UM_Allgemein_Benutzer_Documentation.jpg)

#### Einstellungen – E-Mail
1. Deaktivieren Sie unter dem Bereich E-Mail alle Benachrichtigungen, außer der Willkommens- der Aktivierungs- sowie den beiden Passwort E-Mails.
![E-Mail Einstellungen](/documentation/E-Mail_Documentation.jpg)

#### Einstellungen – Weiterleitungen
1. Stellen Sie in den Einstellungen von Ultimate Member im Bereich Benutzerrollen die korrekten Weiterleitungen bei der Benutzerrolle "Subscriber" und "Administrator" ein. Ändern Sie die Einstellung wie folgt als Registrierungs- Anmelde- und Abmeldeoption:<br>
Maßnahmen, die nach der Anmeldung ergriffen werden --> Zu URL Umleiten
Benutzerdefinierte Weiterleitungs-URL setzen --> **https://quartiersplattform-domain.de** (Durch die Domain der Quartiersplattform Installation ersetzen)
![Benutzerrollen](/documentation/UM_Benutzerrollen_Weiterleitung_Documentation.jpg)


#### Allgemeine Quartierseinstellungen
1. Legen Sie die Seite Datenschutzerklärung mit den Informationen Ihrer Organisation für die Quartiersplattform an, indem Sie auf die Schaltfläche klicken.
![Quartierseinstellungen](/documentation/QP_Datenschutz_Documentation.jpg)
<br>
<br>

2. Unter dem Bereich Quartierseinstellungen können Sie die Konfiguration der Plattform anpassen. So kann der Name, das Logo und die Liste der Sponsoren in diesem Bereich angepasst werden.
![Quartierseinstellungen](/documentation/QP_Quartierseinstellungen_Documentation.jpg)












