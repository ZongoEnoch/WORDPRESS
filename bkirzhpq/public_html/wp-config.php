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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bkirzhpq_qgehi9r' );

/** Database username */
define( 'DB_USER', 'bkirzhpq_qgehi9r' );

/** Database password */
define( 'DB_PASSWORD', '68S.y-8pAt' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'kuyrtntsy3d7cyitndie6h9d4dwe7dzdjbwcs9vqkoxvatoplcsugnrcaauk1u3q' );
define( 'SECURE_AUTH_KEY',  'gicoqaxcifdbnfdf6doqb2fucssfpik2tohlvd3lwfst8ilfub6x5t6wz2cfw5wn' );
define( 'LOGGED_IN_KEY',    'xhojwhzzev2cgbizwnsnmmlnjjlied0skxygi4gtrujumyvnpqwkaoaju9s4uox2' );
define( 'NONCE_KEY',        'sma5muxxxu9bxjh7zvmt7zcauk7zb8wo0ytplwupxn5ueezqzjw6vqefgmlp0lwh' );
define( 'AUTH_SALT',        'shpu8eemvvg3sbduomzxshym21tmjyntpgrrq4qjh5i0v39oz57jrhuyvnl6qaqv' );
define( 'SECURE_AUTH_SALT', '9wsnkqlxxn6kl6sdeaelh2rdge4oaitwz0d4ldpdc5ybrx9wdrx5jyx3i0daasr2' );
define( 'LOGGED_IN_SALT',   'xuj4mlfnneksw0rf7ngpwrgufzxm4itkdfoo2bcjban6y3jo2nm8pko8u4bu3is0' );
define( 'NONCE_SALT',       'dztt85v7orqt3tgrd0mo9i6dbxc6zcaxbwt7qkwhepjjkzeflifrtcdsjiwaejd4' );

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
