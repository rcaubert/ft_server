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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'uwordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         '@yv2mvm}q~# W?a=R}5_TVJ`cG{6eQ1YF,%,y]<m-[m}r4y:[sKJ}h@*j1+YHfo ' );
define( 'SECURE_AUTH_KEY',  'mCrqy2d>SKH;qJ_[#^Z#U,rEaB3OABv@<Tqb/UtM5r?91>|HC+ctw,f+3fC1.`@L' );
define( 'LOGGED_IN_KEY',    'mH(QN0~sy|2~s2f*`fj[#^F(s];>?T_/hN/>kQTcD8t7$oK`I+Nmg0bRk+!2<U]y' );
define( 'NONCE_KEY',        '[%~`#uU;TF{v-BY5X,M5<KmhU8M[i=8uKm$`^*?M:8ut]nxM-VN5Ik`]}Lvo&G?Q' );
define( 'AUTH_SALT',        '|39#~:rxN/A5soa3`yc+,q,6$Y!f?PehJSS?Kz?V@2P:]CWG7`|B$jIoE!5Z8;9B' );
define( 'SECURE_AUTH_SALT', '! s`4O,7bhATbp<k~Tvz8&ZkajinS2nXTy9P5c-}]/G,pyNQ]#=RO&EfV[6mT9Xt' );
define( 'LOGGED_IN_SALT',   'm$zf|76j- ]--~FJI#ejbTu!&A(NfeT+MK[.2 `{Keh~aD[ =2rpLcO%fsXHi7}O' );
define( 'NONCE_SALT',       'YE@BYsNNV_(!iWg;Yt?1O04#h~7wfZFHd}!&v=iy5i:),vCoD00<5T]brN_QbB;n' );

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
