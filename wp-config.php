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
define( 'DB_NAME', 'olshop' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'Y-vF^*/HlJ|D8svWi%4@L[=78)tj{+#wZkyr#Az1Y4>k<7G=mZe&t(?F$SrKSu*$' );
define( 'SECURE_AUTH_KEY',  'cvSzL[`EY&{`Tum:MY-Lgf38;M3/+xR2@{^M3r(pjZoAn;1Cp>ST%*o05Nm5>/i_' );
define( 'LOGGED_IN_KEY',    'm fTosFy75m}lPhTm6.oBz]0~OXZoo^Al2ljmd{dO_iI-=.9Rh~Bs5tqMbU<:C1t' );
define( 'NONCE_KEY',        't&x#.z:rdBgWx]q3cJ+9@:L+9TbtH5r6>sik1yP{b|=l=H7}3v.CI0B%KMJQBX:F' );
define( 'AUTH_SALT',        '8*XFFC?Q;M-/TSgnx@be7=aTjNrr`3jt4$>D>`d:pL(16`5w@@g=R;uxv/.b`f~#' );
define( 'SECURE_AUTH_SALT', ']PFkTZa|qKcKDqC_29(BXeHUwe9afNfaH~9.JV+vWaxv#SNHEY8%Lt;[iPyMdF,U' );
define( 'LOGGED_IN_SALT',   'z@T&S c3_r|4zpC^B5M}0[X 4<uq76G8/$a:5]<_K4RNtHfT.oAdMiVdq=U6i^<L' );
define( 'NONCE_SALT',       '$_2WK:MaBfo&{!4)8wd]nUKyK=b %W|tqz@tcYZ-+{yhc{*ZnTg{NYT`u]UGy$n[' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
