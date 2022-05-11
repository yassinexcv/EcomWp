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
define( 'AUTH_KEY',         'ZXQ-o@Jh+`xfKrYHXLP0-bt!ofwBmEWV:?36&NNjd5DOU7wSS~4)<vkb9mrj@Fl*' );
define( 'SECURE_AUTH_KEY',  '@`!k!W7#GOv!w{[4=PfMb)]1xg 6QisG]Oa;5,$(a@qYQYf9 XmZl*-x+*Mhcw:`' );
define( 'LOGGED_IN_KEY',    'zfz1b5.wrvB`oYy5LXQ^XG-jN4(pueU@D( x+DNY50wRoh 2]Dp7W,O/`8VIF3v!' );
define( 'NONCE_KEY',        'oq0B|,;uSOAm%m]o08$# A}LI+_J0^34Y`d=vU&8r f?Iv%yjE|0Ld[w:_BlCqSu' );
define( 'AUTH_SALT',        '&VnX`s)@nc8^<!JI?nD}Nt9]9ncPF6vu(kKHZ<t=;9+1snx:.d,Y&k99HiU.`&Ko' );
define( 'SECURE_AUTH_SALT', 'sqB4<e7DZno*66oOvW`V7B ?GB8?1FdVP{W+6)kpwD5M-?RO| 8i~TS3GTYB$x}A' );
define( 'LOGGED_IN_SALT',   'if`DR:noaMv3r^]~6%/8K_A~[_CF@/{>5C,l^1@1cx)wWapgzg%kW)+`8K4[LTOH' );
define( 'NONCE_SALT',       'y.#3;N59[n-}(_CGl.wiW~h}W}Kz-S03RN&l=Tk:^0az?27bdeJK!>j/+5rH-*9l' );

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
