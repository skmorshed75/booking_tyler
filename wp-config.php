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
define( 'DB_NAME', 'bookingtyler' );

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
define( 'AUTH_KEY',         'QeUYJ8.;1nzAHU?oU5MR^~IkofAMcWci24bg)K^4b8rON-Jg6|LWsU.Pb/se)(12' );
define( 'SECURE_AUTH_KEY',  '/)_KSh2,)Qnh@Ab_*{^+qaxlUQEIElB.hE<|r&.;@p%G .f=/eksIr.1~X`2ZrUX' );
define( 'LOGGED_IN_KEY',    '3dgJARgpx-unN.<y/}_}h$Y+0@DsZuTOVX5&i.xJoZ4OWgddm7F#)V78k9vKE=~B' );
define( 'NONCE_KEY',        'Hv )rJtOLF6R/XaKvyL~aL#%1JKq6!)+1Yu<Itr|EA~u-|<9vgvNuLHaBC6G[mTY' );
define( 'AUTH_SALT',        'nrU=Rh,#zWPbq/y[]{>Qp`JoSH*bPN5OmS6zk{1IJ9 v$rfw{q}>C?P#m^[Sp$aX' );
define( 'SECURE_AUTH_SALT', 'WXx25oLM}_pgz^;p.oYo]5_9PI|cS`40_J~6x1=fB>vS$tZ{kvw~ #-aVL01 xR2' );
define( 'LOGGED_IN_SALT',   '*7[I{2%{7fp^l)(c|ZOGdT; P! N[4NK(crU|P_@eR/tt]~6w:<l:)BmQ.d) tF2' );
define( 'NONCE_SALT',       'T$*<nuV`k4Jl[N=_;,Ke_w~CbG:R/#l*x9JTzngdxa#JDZuOD1 p6;TlX`,7A#8?' );

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
