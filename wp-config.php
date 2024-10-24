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
define( 'DB_NAME', 'Nike-Copia' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'LMuTiY0hRR6nqDk4sW6vxZCkTTA1V4SQrN6CaVREVM0afKWTEBOzJ9LBzCO2tmxF' );
define( 'SECURE_AUTH_KEY',  '3INX4oMnx9Dxtp3QAhKsQKlwgcIOABmR2SOPfNsNpfkqAIbRauwA6EutE6I5LWPj' );
define( 'LOGGED_IN_KEY',    'avoGNybpX8eHG6AwsBDzp99rOPVIZ9vgyyxtmY7lTVTOQR3e18ZdSmLyvpw0CVaP' );
define( 'NONCE_KEY',        'tg4OWCEHH3bsv6xX3mPSQMsulgQ78SF2y8ucPMTCnJADBA0jtQlI9faMQj4YAfQ8' );
define( 'AUTH_SALT',        'Ul4eGgtQEAHAqXqRpKfGSU9XyfSN4ruGdEfZTlsnSZmK3nLSGYh74Akp0X4Yjr4U' );
define( 'SECURE_AUTH_SALT', 'sKrW2uGPPLN7pHehALSXvxaRrM2OOOYew7PQxFOCoFe98dSVEvPnBmfsrkx8MxOe' );
define( 'LOGGED_IN_SALT',   'gNycyTDuqb2oybVGn2Wci0UCEpqtbONB9s2PkvGPVcf7yb1V7Pyts4FlG0YAJqFz' );
define( 'NONCE_SALT',       'miK7F8b4vwN3EEIHdXYLoDW5mgQkDCDtsa5tHNj8tWYcJ3311M8Pw1iq0SZbROZy' );

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
