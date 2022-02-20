# 2-Step Verification #
* Contributors:      pluginkollektiv
* Donate link:       https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=TD4AMD2D8EMZW
* Tags:              2FA, Auth, authenticate, google authenticator, login, password, security, two factor auth, two-factor,
* Requires at least: WordPress 3.9
* Tested up to:      4.3
* Stable tag:        trunk
* License:           GPLv2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.html


## Description ##
This Plugin was developed at WordCamp Hamburg 2014
WordPress Login Page → Enter login credentials → Login successful → Code via Email → Got to forwarded Page → Paste received code → Get forwarded to admin panel.
Only works in Webbrowsers.
Logins via Apps (WordPress Mobile, Microsoft Live Writer etc.) sind vor Plugin-Funktionalität nicht betroffen.
No frills. No third party.
Common questions https://github.com/pluginkollektiv/2-Step-Verification/wiki/H%C3%A4ufige-Fragen

### Deutsch ###
Während der WordCamp 2014 Session „Zwei-Faktor Authentifizierung für WordPress“ hat Christoph Daum eine interessante Idee geäußert, die Zwei-Schritte-Verifizierung (= Zwei-Faktor-Authentifizierung) direkt über die E-Mail abzuwickeln. Der Sicherheitscode kommt also per E-Mail.
Der Vorteil dieses Ansatzes: Keine Drittanbieter, keine weiteren Apps, keine dubiosen SMS- oder Messenger-Nachrichten. Der WordPress-Administrationsbereich wird nach einer erfolgreichen Anmeldung erst dann zugänglich, wenn auch der - per E-Mail erhaltene - Sicherheitscode übereinstimmt.
WordPress Anmeldeseite → Eingabe der Nutzerdaten → Login erfolgreich → Sicherheitscode per E-Mail → Weiterleitung auf die Abfrageseite → Eingabe des Sicherheitscodes → Weiterleitung zum Administrationsbereich.
Die Zwei-Wege-Authentifizierung findet ausschliesslich bei WordPress-Anmeldungen im Webbrowser statt. Logins via Apps (WordPress Mobile, Drittanwendungen wie Microsoft Live Writer etc.) sind vor Plugin-Funktionalität nicht betroffen.

### Activate ###
Just install and you are ready to go

### Deactivate ###
In case something goes wrong Rename Plugin via SFTP


## Installation ##
* If you don’t know how to install a plugin for WordPress, [here’s how](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

### Requirements ###
* WordPress 3.9
* PHP 5.2.4

### 0.0.2 / 15.06.2014 ###
* Feature: Gültigkeitsablauf des Codes nach 5 Minuten (<del>[Issue #2](https://github.com/sergejmueller/2-Step-Verification/issues/2)</del>, follow up: [Issue #5](https://github.com/sergejmueller/2-Step-Verification/issues/5))
* Feature: Dynamische Pfade zu CSS-Dateien auf der Abfrageseite (<del>[Issue #3](https://github.com/sergejmueller/2-Step-Verification/issues/3)</del>)
* Revision: Kommentare zu Funktionen, Überarbeitung des Sourcecodes

### 0.0.1 / 14.06.2014 ###
* Initial-Version

### Credits ###
Author: Sergej Müller
Maintainers: pluginkollektiv
