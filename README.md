## 2-Step Verification


Während der [WordCamp 2014](http://2014.hamburg.wordcamp.org) Session „[Zwei-Faktor Authentifizierung für WordPress](http://de.slideshare.net/stk_jj/2-fa4wp)“ hat [Christoph Daum](http://christoph-daum.de) eine interessante Idee geäußert, die Zwei-Schritte-Verifizierung (= [Zwei-Faktor-Authentifizierung](http://de.wikipedia.org/wiki/Zwei-Faktor-Authentifizierung)) direkt über die E-Mail abzuwickeln. Der Sicherheitscode kommt also per E-Mail.

Der Vorteil dieses Ansatzes: Keine Drittanbieter, keine weiteren Apps, keine dubiosen SMS- oder Messenger-Nachrichten. Der WordPress-Administrationsbereich wird nach einer erfolgreichen Anmeldung erst dann zugänglich, wenn auch der - per E-Mail erhaltene - Sicherheitscode  übereinstimmt.


### Funktionsweise

WordPress Anmeldeseite → Eingabe der Nutzerdaten → Login erfolgreich → Sicherheitscode per E-Mail → Weiterleitung auf die Abfrageseite → Eingabe des Sicherheitscodes → Weiterleitung zum Administrationsbereich.

Die Zwei-Wege-Authentifizierung findet ausschliesslich bei WordPress-Anmeldungen im Webbrowser statt. Logins via Apps (WordPress Mobile, Drittanwendungen wie Microsoft Live Writer etc.) sind vor Plugin-Funktionalität nicht betroffen.

Alles klar? Antworten auf [Häufige Fragen](https://github.com/sergejmueller/2-Step-Verification/wiki/Häufige-Fragen).


### Frisch aus dem Backofen

Das WordPress-Plugin „2-Step Verification“ wurde zwischen den beiden WordCamp 2014 Tagen entwickelt. Tests, Erfahrungen und Vorschläge sind willkommen.


### Plugin-Aktivierung

Nach der Aktivierung ist die Erweiterung scharf. Keine Einstellungen notwendig. Abmelden, anmelden, läuft.
In einer der nächsten Versionen wird es die Möglichkeit geben, eine separate und nur für die Zusendung des Sicherheitscodes genutzte E-Mail-Adresse zu hinterlegen ([Issue #4](https://github.com/sergejmueller/2-Step-Verification/issues/4)). Weitere Pläne als [Issues](https://github.com/sergejmueller/2-Step-Verification/issues).


### Plugin-Deaktivierung

Sollte etwas schief gehen und der Administrationsbereich ist blockiert, kann die Umbenennung bzw. Löschung des Plugins auf dem Webserver Abhilfe schaffen.


### Gemeinsam

Um den Entwicklungs(zu)stand zu professionalisieren, ist man als Entwickler auf die Mitarbeit der Community angewiesen. Folgende Punkte benötigen Unterstützung:

* Tests der Anwendung inkl. Feedback
* Vorschläge für Funktionen
* Korrekturprüfung der Texte und Sprachdateien (folgen)

Kommunikation gerne per [Issue](https://github.com/sergejmueller/2-Step-Verification/issues) oder E-Mail. Vielen Dank an dieser Stelle für den Support.


#### Mindestvoraussetzungen

* WordPress 3.9
* PHP 5.2.4


#### Inbetriebnahme

1. ZIP herunterladen
2. Plugin in WordPress installieren
    1. Wahlweise den entpackten Ordner per SFTP übertragen
    2. Oder die ZIP-Datei direkt in WordPress hochladen
3. Plugin aktivieren


#### Versionsverlauf

Seit Beginn der Entwicklung wird ein ausführlicher [Changelog](https://github.com/sergejmueller/2-Step-Verification/wiki/Changelog) geführt.
In der Textdatei landen alle größeren Änderungen, nach Möglichkeit mit verknüpften [Issues](https://github.com/sergejmueller/2-Step-Verification/issues).


##### Autor

[Sergej Müller](http://wpcoder.de)


##### Donuts

* [Gittip](https://www.gittip.com/sergejmueller/)
* [Flattr](https://flattr.com/submit/auto?user_id=sergej.mueller&url=https%3A%2F%2Fgithub.com%2Fsergejmueller%2F2-Step-Verification)
* [PayPal](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8CH5FPR88QYML)


##### Profil

* [Google+](https://plus.google.com/110569673423509816572?rel=author)
* [Twitter](https://twitter.com/wpSEO)
* [Impressum](http://wpcoder.de)
