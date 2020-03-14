<?php
/**
 * In dieser Datei werden ein paar Grundeinstellungen f�r WordPress vorgenommen.
 *
 * Zu diesen Einstellungne geh�ren: MySQL Einstellungen, Tabellenpr�fix,
 * Secret Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es auf de {@link http://codex.wordpress.org/Editing_wp-config.php
 * wp-config.php editieren} Seite im Codex. Die Informationen f�r die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeungsroutine verwendet. Sie wird ausgef�hrt, wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch direkt in dieser Datei alle Eingaben vornehmen und sie von wp-config-sample.php in wp-config.php umbenennen und die Installation starten.
 *
 * @package WordPress
 */

// ** MySQL Einstellungen ** //
define('DB_NAME', 'putyourdbnamehere');    // Ersetze putyourdbnamehere mit dem Namen der Datenbank, die du benutzt.
define('DB_USER', 'usernamehere');     // Ersetze usernamehere mit deinem MySQL-Datenbank-Benutzernamen.
define('DB_PASSWORD', 'yourpasswordhere'); // Ersetze yourpasswordhere mit deinem MySQL-Passwort.
define('DB_HOST', 'localhost');    // In 99% der F�lle musst du hier nichts �ndern. Falls doch ersetze localhost mit der MySQL-Serveradresse.
define('DB_CHARSET', 'utf8');	// Der Datenbankzeichensatz sollte nicht ge�ndert werden
define('DB_COLLATE', '');

// �ndere jeden KEY in eine beliebiege, m�glichst einzigartige Phrase. Du brauchst dich sp�ter
// nicht mehr daran erinnern, also mache sie am besten m�glichst lang und kompliziert.
// Auf der Seite https://api.wordpress.org/secret-key/1.1/ kannst du dir alle KEYS generieren lassen.
// Bitte trage f�r jeden KEY eine eigene Phrase ein.
define('AUTH_KEY', 'put your unique phrase here'); // Trage hier eine beliebige, m�glichst zuf�llige Phrase ein.
define('SECURE_AUTH_KEY', 'put your unique phrase here'); // Trage hier eine beliebige, m�glichst zuf�llige Phrase ein.
define('LOGGED_IN_KEY', 'put your unique phrase here'); // Trage hier eine beliebige, m�glichst zuf�llige Phrase ein.
define('NONCE_KEY', 'put your unique phrase here'); // Trage hier eine beliebige, m�glichst zuf�llige Phrase ein.

// Wenn du verschiedene Pr�fixe benutzt, kannst du innerhalb einer Datenbank
// verschiedene WordPress-Installationen betreiben.
$table_prefix  = 'wp_';   // Nur Zahlen, Buchstaben und Unterstriche bitte!

// Hier kannst du einstellen, welche Sprachdatei benutzt werden soll. Die entsprechende
// Sprachdatei muss im Ordner wp-content/languages vorhanden sein, beispielsweise de_DE.mo
// Wenn du nichts eintr�gst, wird Englisch genommen.
define ('WPLANG', 'de_DE');


/* Das war`s schon, ab hier bitte nichts mehr editieren! Viel Spa� beim bloggen. */

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
?>