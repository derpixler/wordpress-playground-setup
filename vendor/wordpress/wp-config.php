<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'playground');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '7|W[t`2J?eE@kRoU#WL0CSn*p3TNMk~)a%gO,.3ST+]0v- -^+?2U:j_|L[K?7-|');
define('SECURE_AUTH_KEY',  'qw+fXv[KJ#^:iE]L<o@zL}mH?Zh*4D;ay@u_|l-X~S;R1tF[<:qR#m+b8]{HrTCR');
define('LOGGED_IN_KEY',    '()NcTI|&ko3-+E Wk^BUd,L$#-YFKsg%1?Z(~P7EP(sWXSKH?&dvg82I1!2nN.6z');
define('NONCE_KEY',        'G_PGSY-yX6t5-$R{l/zdR`&*D(&qX;I&-@`]$.!xrZAkt.RHRmTAPHdYI`_VEMq7');
define('AUTH_SALT',        'c|*FAh8Fej|^ob]t-Pgi6S|_k`,kjNn4/_1/l{N+{MeBl3:Xw1J5VfLp/]eOlu]:');
define('SECURE_AUTH_SALT', 'VDd^h8}@Qrq]E-JP +AMg6eyFK(1~UKM-,Xa3+ak,[0u%u*08;hDW^BL@|mX<:K1');
define('LOGGED_IN_SALT',   'u_y=8jN|F,|0?[dVQqv]<sy_I-Fb=oH6_gwrV5nXVVwDB:#BIAs-Bj!jy(/-E65>');
define('NONCE_SALT',       '67/]3 ^%*X>1f/xCE]^3|e(mSoy8o#w4m7}U4NhgtA?X&w*KJ4q@-KM./y#ismsb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'play_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
