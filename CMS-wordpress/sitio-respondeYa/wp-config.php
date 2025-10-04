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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_bd' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'E;Xj3Eq:4gKHv6ADCTKZZ ,cfzb6TPP/md{@xyCfFVNr#/(ygkZx>-xvSDX7PPik' );
define( 'SECURE_AUTH_KEY',  'eiYD.z?>R^KlSc;t#8L-p`JO;Vqh?7fZTD>R3Bm+k{zfa(9fSCrCR]*-wv*MB.%s' );
define( 'LOGGED_IN_KEY',    'p/Ue@L0RPRaWsKbDp0g/NLTN5S!sxlBhn(jjs ,=1uK7 #1OPy8kvK`:IR>F.&*i' );
define( 'NONCE_KEY',        '6@;5`xW&FeH#2x{fxi;{LnVYQ)r@)&|Olas:E#kX,@BCYh{s3Y7N&Spfm:+,!QTi' );
define( 'AUTH_SALT',        'wxi~GKADX^HM2N/wQ_C-;I39%*xmo|i|wB.LU23+lw8F=zA0lZ`}9~9}=mx&?r8C' );
define( 'SECURE_AUTH_SALT', 'A<VK]Dl{8>!oKc1hYWMG%1!tzf*]{xREL ;nV(lfg|Y+9ztUwOdx &^p]`=lYo:Q' );
define( 'LOGGED_IN_SALT',   'WG|y1jJ3mzM&_/XdWQc2n:|+oi+; oH7LgzpaDf&9wkY-A_a1~,CD]fq({vknzbI' );
define( 'NONCE_SALT',       'v4r|ew0)7s9rPX=q~&q|re1H4/nJJGjx,EQ8fbXB47lqf[PD.@:q7kaQmE8s-vIB' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
