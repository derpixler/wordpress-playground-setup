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
define('DB_NAME', 'playbox');

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
define('AUTH_KEY',         'E;d~Wbh61<68 rh|vQu(ts%b*GS3hk~%d9:N/Z[V0*IGdbk3AxYfBPg*Ms2uEr)D');
define('SECURE_AUTH_KEY',  '^9RYll5@FmDxWQpWe wvqeI<n]W7pj=zux}9ZnFl$`[Hh6Rh(-a.b(Yzriy9ob# ');
define('LOGGED_IN_KEY',    'v_|7)#}TsgywI-8l^>E|VX*[}:=XHj-:l8q+P.+:oA*B7N3qYNm`DT+p+YB`Ws{0');
define('NONCE_KEY',        't#l$(@h} U<fuJ-65tb>.Cl7N29mPpE&pEaCuacW*4/#?-*`0AARuBGcgrINw/^S');
define('AUTH_SALT',        '$pV1k{}:Iste@Ab^=JAW[OBMuFU5QE=p U^|&m0Aw_wb9TAVb4MC [ZhZx{oH=}6');
define('SECURE_AUTH_SALT', 'X<+&FdZk+qO1nMte|igz0Lr+j,Izv+.hCj0Q#2nA$uL4QqkHPZepF&$$F$wIH-*.');
define('LOGGED_IN_SALT',   '-o&l*rYgpEB*PX +fH}?POV}}KLD?-?9,a*nRq Tuffqum.8Y3JgnK$b!!SA~.:O');
define('NONCE_SALT',       'g!.`p,+2U%@j9r/xeO3$:Gh#x<Bxl,pq;S{LIus.y@lU]aO_e,W6aO>ybOk1+@4#');


$table_prefix = 'foo_';
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