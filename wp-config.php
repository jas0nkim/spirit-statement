<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'spiriui1_wrd1');

/** MySQL database username */
define('DB_USER', 'spiriui1_wrd1');

/** MySQL database password */
define('DB_PASSWORD', 'rHjcy9C1LT');

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
define('AUTH_KEY',         'BCY8pTu6lNQa2otWSlpxLC1FPFJI4jyPFENnT1Ki4PbKDOer01OXeNSC8l85ThhP');
define('SECURE_AUTH_KEY',  'owbLzek1d4bhcDdC7dVxc7hsCt7mBivLyVITKJRR27sgx0fn0do4BQrBg0PjAMtz');
define('LOGGED_IN_KEY',    'nVzNKG31fJcHLGG38rAsKgiWzU1HPzGqzoNfPWNwLcSqwbXPdqrHzctjvrJHag6f');
define('NONCE_KEY',        'u4PJQXsWobb1fP4OY0vu6pH43oZZS5iE5g3Erel20mP09vlMbwvAnXbkDXjD1mGV');
define('AUTH_SALT',        's1y483h7wN7m6KkD7csngqjb8sKvBxkEPOAE6WnE5ZmkzoOUaTp1mKBEE4L6zojk');
define('SECURE_AUTH_SALT', 'vXOOOlmBKpBfmhXgg9EdtCmXeR91deAjvx4DWU1hQUzlKzQHGPLF9vluJLUJUtKT');
define('LOGGED_IN_SALT',   '1INAEv9fPXukVoz0q70JjLpBbYvrfVqn73Hlq3EOqw8sGZSQN1sfgc7VvmuxLGNv');
define('NONCE_SALT',       'EecCEXRmqesbwimSna8loXxrF4N15BgaXh20BFldp2rVPA1sgwLXr97Viq4sn9KH');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
