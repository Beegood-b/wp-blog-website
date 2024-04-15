<?php

define( 'WP_CACHE', true );

define( 'ITSEC_ENCRYPTION_KEY', 'bTsgZ2UwNFQ1TiArdzBaTU9mQUpNOV1VOX13fXJ+diB9RnBEcVAoaGVPQF5Cb2ZWYj9qYltsNCQmSVZeRm0vQQ==' );

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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '[*)>Btlaq<w>8%%9:f5%38^LI+pl{A{6]@X0k)Bd!..9hMcE#(F;;]=UJCTw{.;Y' );
define( 'SECURE_AUTH_KEY',  '-6Scn-,wX%Tyf}fs<*nQNxWH7//ZzRuWRSw5WsC=kb&ejm1qCw` VSCS%SSfzM~)' );
define( 'LOGGED_IN_KEY',    '8<C<0:h3]*s@l/+uf]N/Ijzb~VMW{{:r?GAwReG+AQR_Fg|47DE5A53//RQ=AiNQ' );
define( 'NONCE_KEY',        '!e?ay%|KY(zrcASiJN3oSl90`wWs2ukwPX5xnKS-~%hul2`~a t!`@H%z,I|tKn6' );
define( 'AUTH_SALT',        'waMhf33Tt0OLYendUY4vCyrny)v)yI9@ZzXNDk9%KH:{HHYo/B8%@oU{#J&vp91J' );
define( 'SECURE_AUTH_SALT', '|/a+b{i*9Lsu$sYh/*vIw(eEyrQonSeDasdHUTbJ66`LXWd<M;m*KT(= X}y.e/1' );
define( 'LOGGED_IN_SALT',   '!{-uV`nUJGtW:4P_YSzS%7hcv2@qS0q@Gng_q0tZ3g.08v$s~(C<pOz8qx!chl=:' );
define( 'NONCE_SALT',       'y,|@3v=Oj5*`q4Z)&0)TvS!D6yv6HP%.rC>bmpnSgK^VafV/zHj5e_?_KjSCiRds' );

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
