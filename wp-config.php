<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'delve17');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Bp,rigYt k[6A6CO^?+_Z3l)D*>AP9Qt.:;<2IS<L1J1}u U-*(70zij72,(MB#A');
define('SECURE_AUTH_KEY',  '=|[+dz,+0uVsdkU{WnP[fUYuFrLi<Vw35rHWo~g)~&1vYbuTFMep.m$AGE$IXanj');
define('LOGGED_IN_KEY',    '4+NFSlZG3!&q8>.qrN/|dphL^pLxo(iW|Ji6S7g4++ .0R7<wLN&w;S}EJMgFa1R');
define('NONCE_KEY',        'hUuVx|o,,3 ZVQ$uvrm1N**j-ovXOVX#2> ))OKPP}&K|UhS4QU7]k6a;B6g+9zO');
define('AUTH_SALT',        '2.LaXmD}]J9C:g5!P/=qC)D>hB|F09a+]oh9B#QCz,6:xS>~c$%!ro,NogF+|uJK');
define('SECURE_AUTH_SALT', '|OYa3tAqw6L/ZOX93:}l8rt0N8sUfGlZ/Pv~|cLN;WF-5o=($9}x;27Y9l#[<PEG');
define('LOGGED_IN_SALT',   '-f}njbfb5}4OEc^vD)Sn^COTg39t3AS_nEG(iPBVP%4a#a-Wk-yOz7wOlkG,_(|*');
define('NONCE_SALT',       'LYQ+&EkrMO[0:dUYGjsRfgR`z*k$XYj?oC}z!`}Q%+#+Wt(|T{0)vKS|w;x Y$Fh');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
