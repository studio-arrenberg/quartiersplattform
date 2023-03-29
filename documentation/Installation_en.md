# Installationsleitfaden (engl.)
I've tried to document my installation procedure. Maybe helpful to others

## Create Database
* Depends on your hosting environment. 
* Note DB-Host (URL), -name, -user & -password
## Install Wordpress
* `ssh` login to webspace (if you've got no SSH login, you're also able to use FTP. Downloading & unpacking is done locally and the folder is transferred via FTP then)
* download `latest.zip` from WP.org

`wget https://wordpress.org/latest.zip`
* unpack

`unzip latest.zip -d folder_of_your_choice/`
* this unzips latest.zip into folder folder_of_your_choice/wordpress so we have to move it to folder_of_your_choice/

```
mv folder_of_your_choice/wordpress/* folder_of_your_choice/
rm -r folder_of_your_choice/wordpress
```
* Set your domain (example.com) to point to folder_of_your_choice/. This is done in DNS or Domain settings of your hosting provider
* Open `http://example.com/wp-admin/install.php` in your webbrowser
* Follow the setup wizard and put in your DB credentials
* Enter site name and create admin user with password
* This will bring you to your WP's admin Dashboard
## Install Theme
### Download & Install from WP-Dashboard
* Download latest version of Quartiersplattform from github
* Go to "Design --> Theme installieren" and upload Quartiersplattform.zip
* Once Quartiersplattform is uploaded and installed, acticate it

**ATTENTION**: As of the time writing this document (15.6.22), the latest release zip (1.8.2) from the release page isn't correct, see: [Issue #133](https://github.com/studio-arrenberg/quartiersplattform/issues/133)
### Alternative #1 - clone the repo
So here's the alternative and probably the better way to go by cloning the QP-repo to your webspace. This even allows pulling in updates without re-installing/updating the theme:
* ssh login to your webspace and got to your wordpress' theme folder and pull in the QP-repo

```
cd ~/wordpress/wp-content/themes
git clone https://github.com/studio-arrenberg/quartiersplattform.git
```
* now you only need to activate the theme in WP-Dashboard
### Alternative #2 - Download ZIP from repo's main page
Another possible solution is to download the ZIP by clicking `Code --> Download ZIP` on the repo's main page, upload and install it like explained above 

## Install needed Plugins
* Download `ACF *Pro*`, install & activate it, like stated in Dashboard
* Download `Ultimate Member`, install & activate it, like stated in Dashboard
* Download `WP Mail SMTP`, install & activate it
## Configuration of Quartiersplattform
### Ultimate Ultimate Member
* Configure Ultimate Member, like stated in the documentation: [Ultimate Member](https://github.com/studio-arrenberg/quartiersplattform/blob/main/documentation/Ultimate_Member.md)
* Let the plugin create its sites (button in Dashboard)
* Go to `Ultimate Member --> Formulare` and note the shortcode for `Default Profile`. In my case it was [ultimatemember form_id="42"]
* Go to `Seiten` in Dashboard's menu, choose `Profil` and enter this shortcode (Hit the `+` button to add a (Gutenberg-)Block, type shortcode to create a shortcode-block and enter the shortcode from above. Hit `Aktualisieren` to save the page. 

The documentation is missing the correct picture atm. This will get **FIXED** with [PR#136](https://github.com/studio-arrenberg/quartiersplattform/pull/136)
* Go back to Dashboard by clicking the Wordpress-Logo **W** in the upper left corner
* Go to `Ultimate Member --> Einstellungen --> Design --> Profil Menu` and deactivate it. Save your settings
* Go to `Ultimate Member --> Einstellungen --> Allgemein --> Konto` and deactivate `Datenschutz, Nachrichten, Konto löschen`, like stated in the documentation. Don't forget to hit `save` in the bottom. 

**QUESTION**: How is a user able to delete his/her account!? The documentation is unclear here and there's no option in the user's menu. See [Issue #130](https://github.com/studio-arrenberg/quartiersplattform/issues/130)
* The next step in documentation, deactivation of `Profilweiterleitung & Mitgliederverzeichnis` in `Ultimate Member --> Einstellungen --> Allgemein --> Konto` seems to be obsolete, if I get the documentation correct. Those settings are already deactivated. Activating them isn't even possible.
**FIXED**, PR: https://github.com/studio-arrenberg/quartiersplattform/pull/136
* Go to `Ultimate Member --> Einstellungen --> E-Mail` and deactivate all but `Willkommens-, Aktivierungs- & beiden Passwort E-Mails`. I even also used the chance to get the `Betreff` of each Mail in a continous manner by starting them with `{site_name} - ...`. I even activated the `Neuer Benutzer Benachrichtigung` for the Admin-User to be notified about new users. May be of interest in the beginning.
* I left out the last step, `Einstellungen --> Weiterleitungen` here, as the documentation states that this is automated now.

**QUESTION**: Obsolete?
* If you want users to confirm registration with a link sent in a Mail, you need to change to corresponding setting in `Ultimate Member --> Benutzerrollen --> Contributor` under `Registrierungs Optionen`

**NEEDS FIX**: No matter what subject one sets for confirmation mails, the subject of the sent mail will always be `checkmail_email`!? See [Issue #131](https://github.com/studio-arrenberg/quartiersplattform/issues/131)
#### Some own settings I've done
* I wanted to have `*` to mark fields that need to be filled when registering a new user. 
* The setting to enable those `*` is in `Ultimate Member --> Einstellungen --> Sonstiges` and is named `Ein Sternchen für erforderliche Felder anzeigen`. 
* If you choose to do so, there's a problem with translation and `Benutzername` gets `username` and `Passwort` gets `password`. To change this, go to `Ultimate Member --> Formulare` and choose `Default Registration`. Click the pencil next to `Username` and change `Beschriftung` to `Benutzername`. Same goes for `Password`. 
* While you're at it, even also enable the setting `Ist dieses Feld erforderlich?` in `Email Adress` to `true` 
* If you also want the user to check the `Datenschutzerklärung` when registering, there's an option on the right side for it. Change drop-down menu to `Ja` and set the correct page for your `Datenschutzerklärung`. The rest may stay like it is.
* After you're done, hit `Aktualisieren` in the upper right to save your changes.
### WP Mail SMTP
* Install Plugin as stated in the Dashboard by clicking the button, install and activate it: [Documentation](https://github.com/studio-arrenberg/quartiersplattform/blob/main/documentation/WP_Mail_SMTP.md)
* After activating it, use the setup wizard. 
* Choose `Benutzerdefinierter SMTP Server`, hit next
* After setting up smtp server, TLS, Port and authentication and finishing up the wizard (no more entries needed), I got 2 errors displayed (SPF & DMARC), but test mail was sent correctly.
#### Fixing SPF & DMARC
* I fixed the SPF error by adding a DNS record (TXT) to my domain's DNS settings. Followed instructions my provider gave me
* Fixed DMARC with adding another DNS Record: `TXT, _dmarc, "v=DMARC1;p=none;pct=100"`
* After adding those 2 DNS Records, `WP MAil SMTP` reported `success`, no more errors ;)
### Setting up Quartiersplattform
#### Add a `Datenschutzerklärung`
* Click the button in Dashboard. First time I setup Quartiersplattform there wasn't a page `Datenschutzerklärung` created, so I did not find it in the dropdown menu. This time it was there.
* Choose `Bearbeiten` to edit the page
* After editing the page choose `Veröffentlichen` to save it.
* Hit the Wordpress-Logo **W** in the upper left corner to leave to Dashboard
#### Add an `Impressum`
* Click the button in Dashboard
* Click the page `Impressum`
* Edit the page and click `Aktualisieren` when finished to save it
* Leave the editor
#### Edit your Quartiers settings
* Click the button in Dashboard
* Add a Name (the length of the name is limited!!)
* Add a headline and description text
* Add Picture & Logo

**IMPROVEMENT:** Would be nice to have the sizes of images shown directly in this dialog, to make it easier to choose correct size when uploading. There are sizes and ratios mentioned [HERE](https://github.com/studio-arrenberg/quartiersplattform/blob/main/documentation/development-notes.md)

**ATTENTION:** The title picture gets cropped somehow and it's a pita to prepare the picture beforehand so that it fits as wanted and needed.
### Add `Energie Ampel` Plugin
* Download the plugin from here: https://github.com/studio-arrenberg/energie-ampel-plugin
* Got to `Plugins --> Installieren` and choose `Plugin hochladen` (on the top of the page)
* Activate the plugin

## More useful plugins
* WPForms (What for?)
* Statify (nice google analytics free statistics)

## Left Overs
* Ultimate Member Plugin shows as `noch nicht vollständig eingerichtet` in Dashboard, up until the end.  

**QUESTION:** What is missing, what does it need for this message to disappear?
* It wasn't possible to log into my Admin's Dashboard neither with using wp-admin nor wp-login. This is a know issue, see [Issue #43](https://github.com/studio-arrenberg/quartiersplattform/issues/43), as I've noticed only today, and it caused me quite some headache and made me edit function.php. 

**HINT:** When logging in to Quartiersplattform as admin user, the Dashboard's headline appears and you are able to enter it from there.
* The setting to change or set that is found within the corresponding user-role settings `Ultimate Member --> Benutzerrollen`

**QUESTION:** If I'm correct, there's only 3 user roles being used by QP atm. This is _Admin_, _Contributor_ (standard role for new users and _First mover_ (beta testing, being able to login and use page although page is in maintenance mode)

**IMPROVEMENT:** It would be nice to have at least one other role to use. Background: right now only the admin user is able to edit projects, events, etc. within WP's Editor, which gives a lot more design possibilities, like pictures, etc. So being able to use the role _Redakteur_ for that would be nice, as it could allow a Redakteur to edit in WP's Editor without being able to (mis-)configure WP itself. See [Issue #132](https://github.com/studio-arrenberg/quartiersplattform/issues/132)
# Betrieb und Gestaltung
## Site Pin
* If you enable `Site Pin` on a page, it gets a link box on the front page under the description

**HINT:** Only admins are able to do so
* Order of these `link badges` is by date descending

## Project Pin
* Admins (and only admins) are able to pin projects so that they appear prominent on the startpage

## Event Pin
* project owners are able to pin events & notes, making them stay prominent on top of the project's chronic

## User roles
* There are no other user roles usefully integrated in QP than Contributor (Mitarbeiter) & Admin (Administrator). 

**IMPROVEMENT**: It would be useful and handy to allow more user roles, like editor (Redakteur) and author (Autor) (see above)

## Writing descriptions
* One is able to write project and event descriptions directly on the QP, but for to create and design more sophisticated descriptions including pictures, etc., it needs to be able to edit the description within Wprdpress' Editor.

**IMPROVEMENT**: As above, more user roles would be needed for to allow editing with WP's Gutenberg Editor but without being able to gain admin rights and (mis-)configure the complete site
