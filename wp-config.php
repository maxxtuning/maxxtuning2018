<?php
/**
 * Baskonfiguration för WordPress.
 *
 * Denna fil används av wp-config.php-genereringsskript under installationen.
 * Du behöver inte använda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i värdena.
 *
 * Denna fil innehåller följande konfigurationer:
 *
 * * Inställningar för MySQL
 * * Säkerhetsnycklar
 * * Tabellprefix för databas
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL-inställningar - MySQL-uppgifter får du från ditt webbhotell ** //
/** Namnet på databasen du vill använda för WordPress */
define('DB_NAME', 'maxxtuning2018');

/** MySQL-databasens användarnamn */
define('DB_USER', 'root');

/** MySQL-databasens lösenord */
define('DB_PASSWORD', 'root');

/** MySQL-server */
define('DB_HOST', 'localhost');

/** Teckenkodning för tabellerna i databasen. */
define('DB_CHARSET', 'utf8mb4');

/** Kollationeringstyp för databasen. Ändra inte om du är osäker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|>Pk[9:ei9Bxbk*Q|c.WD;3OnoFGME1PI1D0J)umK]O321!oNBBB}a$:Pi^,8e$!');
define('SECURE_AUTH_KEY',  'V;HNgpHW03&0hg1Vn=XQ3 6^0[;a/4La3]LjRP6E2rs/5Qw?zj<B4)*^ew)8>}:o');
define('LOGGED_IN_KEY',    'oPwkr7@GXI8jd9D;{3-e|K=`oqE&C{5T,t.}0lR&Uh HBa1}D`B~~d/-7@l#Iv35');
define('NONCE_KEY',        '+g#c2Nc1ByGuLpu+R~9Azw)Noi9d{({nfQL7,O=22;EgjZ;`H`K[F9:`F~4fN>#n');
define('AUTH_SALT',        '3.v{R0Mx=GS5fb^CGhoXd_LHGPyZbW0AaP[R;XoDD-As]M(q+RK<)|+<a}es)w4L');
define('SECURE_AUTH_SALT', '#3&Flda1%jSms[OPJ~BROE/W&)2?XP@xZ@}dj~l29{:a18z>n+;aR~0`? x-*=:W');
define('LOGGED_IN_SALT',   'x!pca}?^-6~FZ#EHXu|:]-/lT(,V-Y*Nu1:Ci#&N;+h&,ISIO<k0FT|@*vF>I@Ns');
define('NONCE_SALT',       '=()!$l-7rcVt8--#zc/Vh([GfY=*n#IW:ThdsV1a)IJdkXb)k74HIF1ffbn1+c82');

/**#@-*/

/**
 * Tabellprefix för WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokstäver och understreck!
 */
$table_prefix  = 'wp_';

/** 
 * För utvecklare: WordPress felsökningsläge. 
 * 
 * Ändra detta till true för att aktivera meddelanden under utveckling. 
 * Det är rekommderat att man som tilläggsskapare och temaskapare använder WP_DEBUG 
 * i sin utvecklingsmiljö. 
 *
 * För information om andra konstanter som kan användas för felsökning, 
 * se dokumentationen. 
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */ 
define('WP_DEBUG', false);

/* Det var allt, sluta redigera här! Blogga på. */

/** Absoluta sökväg till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');