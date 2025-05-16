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
define( 'DB_NAME', "sonho_new" );

/** Database username */
define( 'DB_USER', "Solomiia" );

/** Database password */
define( 'DB_PASSWORD', "Password" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         'fyyio9fbxjvnxyzv8eb1r6agjhhz4vz1hrtvvbxbaimwjkb8cqdukt2i7uatmtnj' );
define( 'SECURE_AUTH_KEY',  'gswxdd44smymyoxhoyytmevtr5ie9eyotoagbrnv2hgsct1kgcsq45ebqlkmsnly' );
define( 'LOGGED_IN_KEY',    'ntduhbj5d8g2tlkvqorlvxi7aa5xoczx7cng2gzwuyfahasg61gvxi1fehtagzb5' );
define( 'NONCE_KEY',        'tqax3a8dtfzosly0mg2uos9atil2cqbaiox41wgpozad4g7beb2suylpus2zxixy' );
define( 'AUTH_SALT',        'cnpfj34a2z0l3dl1lyshgizaiho3yio1orbvxhmrnqq7hobp16knp8ezucz7fpjr' );
define( 'SECURE_AUTH_SALT', 'ohlz0depcnevpkcaknveyap45mkiounehmnzpanldn7ihtmoqjlwcnkcogatrioo' );
define( 'LOGGED_IN_SALT',   'jtp3llchsa3udfc3ksflicy2av9ydme9rthzguow2wag5tpwtbjs3jqnyvbdwrny' );
define( 'NONCE_SALT',       'eldahvdtao7cvibgmsbsurabnnnnejmesrcoeaudwfzpgcv3ktbo7uzcud6nv7u6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpkd_';

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

define( 'WP_AUTO_UPDATE_CORE', 'minor' );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
