<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u505426395_makarav_india' );

/** Database username */
define( 'DB_USER', 'u505426395_makarav_india' );

/** Database password */
define( 'DB_PASSWORD', 'x6~E6sa?]kE;' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'sxKQ-xx[Vt]vQl{OFz$TT%w%k#]5F+kHY=+~HP!u&G<|9>t%[^G;f<9Lz,E*-PXS' );
define( 'SECURE_AUTH_KEY',  '$~}dX~Q:0 5EzRJ*UML,1 D>^IZ>[Ux=Ndn):EgV`GiMu^G8Yv.@5$8|#8los%$I' );
define( 'LOGGED_IN_KEY',    '|mxP8nw*Gz$Lf9pyW:i^J.FGq H-A&Lwa<U(<e%>l+sJ7ZXl U39-6YFW0;pV{aE' );
define( 'NONCE_KEY',        'xd6%!/n+jr27v?l]L6(_kl$Sr|q+XQ#EB)4k(wq!o.N x=>O$y,Z)c+tcgqna1WH' );
define( 'AUTH_SALT',        'yrEDi`c5L5~cRM<h*ORb@yrlO1FD)m/]@:7l+:p,Fd>Dnpet@6kKX~n:wodJDDBd' );
define( 'SECURE_AUTH_SALT', '$95toH;`gX:;vqM6pjD6}iKk7}O@3}C^L2L%cF 7i9sBpJT_L7[;wWvnswzFIw],' );
define( 'LOGGED_IN_SALT',   'ylHD4Q}T>Q~IOe+5=IjyZro:uh*Z+8oMS0J@S4Zlkhb0NG.@671|%tCEL{YfT3rL' );
define( 'NONCE_SALT',       'A D/@H7&#ubgK_A98jX-x=&Ph|o&7#RC/+;nn5r 6U/tP2*QhI_?7{u 4$;,sd-T' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
