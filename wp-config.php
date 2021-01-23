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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'indian_festival' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '=Jgt-=1]_{4|Mdm:`;n(a9$`${qEOW83M!g&2u[y]HI3v}<+aDCji-_Tmx]3-IkJ' );
define( 'SECURE_AUTH_KEY',  '{ihq Se2&~Gw^og3zRFBsLl6)AFT-1!Ff4nt60/5=T[}1q*,d!}tO%/Lnd}ifaUS' );
define( 'LOGGED_IN_KEY',    'bT$S5}k#mf;sAY6<V[tVJHRPRiH?%*^U/SoFQ$+Q[fS]O0Reyo0oPWlGY$?6MKO|' );
define( 'NONCE_KEY',        'w3zgjq<sk5pcBQ4KxPZ%/ Wd9!0[avhtpUt8h,<r=2i% I4kjx9_[`^/&j(jL~W4' );
define( 'AUTH_SALT',        ']w~^V/c|O!1E[y>[~+!X0oE.sC5RpY$lu}ctpRjC4h/iE32NZ72<vnjAAwo,hCjj' );
define( 'SECURE_AUTH_SALT', '.+,s~[!`jnUBqnINGi1U*Hh!MbLc=07Pn %fjfQsD[:~Ur|KXQy8>d:xnt9XS;yk' );
define( 'LOGGED_IN_SALT',   'p0MKq:hWC+~.Ax*eY&=n!E?D(@eWo5QUxuH!1z(]}4HG/R4HeU=B#rFo@*FB.A&,' );
define( 'NONCE_SALT',       '*#Z}S. ;#?@j.[p^J;lor;A)9zy`U]ns!gjt50cT44&IG)mDNc]P=,$,MtjjY0K7' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
