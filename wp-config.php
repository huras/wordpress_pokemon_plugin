<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'plugin_wordpress2' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '123457' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');
/*
MVhOk@aJ1^I0In)Zb^
*/

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
define( 'AUTH_KEY',         'ZQAg]]XPo()`GaEBxl|:W:=mc6 00d|[v?AzA<cDJ95DQWc$.VEVTj$x,[wt:X_/' );
define( 'SECURE_AUTH_KEY',  'Y:08TKl)@Sz1tTJ-#IX;}CU_;|+/wCh/(d`kj$Sn{NWBaYr-]Wguep^5I@<W`r!s' );
define( 'LOGGED_IN_KEY',    '?X2Yb/r|^hu5jW#xrR]H;g|mr]8(&Wo?-#qe{`N:-j<E<,b 7.yq:.F-5*q34r6]' );
define( 'NONCE_KEY',        'GQI`W!`nU6Xr~@BhHj6MQ|VVH;Q)N?11O0oKyN;asbZCD!VTFhu$-jmgJ)igq^if' );
define( 'AUTH_SALT',        '5Xo5lm68-KdGDleQ_A}:~%Fr1.$PL&Q87`fT-~v|qgp^n^UvPolDs!zU>:nBqyQr' );
define( 'SECURE_AUTH_SALT', 'SWmb5h:^wglY[|CUvLWy2wbLG!D&>Cnk)3f))l);BH46;.{rFH3*U4i8Sg(,N16s' );
define( 'LOGGED_IN_SALT',   'p_5eF AYA%?zP_^IZ4:*BFTw?8WvlQhvf+U <Mst9}[Zlg?eTY jfh*G/*tdu+C?' );
define( 'NONCE_SALT',       'H:9NzH.N8Y)i@FHX*?Vf[g92&QYLY6c7J=k1If8WW~]`3_75guIjlXB>ZI@rD(};' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
