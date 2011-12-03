<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'photo.wojtekzajac');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '-*R+QfYlQ,7+g_DG._]lk1iOA[WOh3lRP5Tp0ez>9xp)}2Ey_HYhi118m6tv;.Sa');
define('SECURE_AUTH_KEY',  'r8d|CBI_dHn4.|k<3&w6SNzUh0eIiUS$xvy*`8oYW:@!gjLnM*|n^~t XYNd^#;L');
define('LOGGED_IN_KEY',    '8I~;Bj2FV#VE{bf{$AwJ_IDhlq^9r;[(a(zkf_T]$RB^mxg5PHe$!BMe6;,FF.ZO');
define('NONCE_KEY',        ',Lr=#UV1<U095%f+3tdAy>[HH$r-j:=VK{tL[S#<|STsI[PZU#v{}uqs&V:n>*E5');
define('AUTH_SALT',        ' WZw]o Kv0?;z u99Rfgmvj&bVnJQE9xEhp>E8OMok5S{`iAqp A=!2lv*ry.9PG');
define('SECURE_AUTH_SALT', 'Of)M]b|25Ug5gD>4C2TJ(j?xv9*j#X!Vi4K(zDNzhKn>a~[E>:bsu!An8#6)X%{#');
define('LOGGED_IN_SALT',   '4.Qh@7{e}=4_KN0/*}O8W{_SC:]o ~,uiT}pO*esEfrT%oCf&^2 BIaNsrQ7sk(a');
define('NONCE_SALT',       '2Z(;9i^*TFZcg/C$CX32G2)3F7cFSNu|?R&nf:;f4oQ_hk$iX?!&mvc;U0-bM?YB');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
