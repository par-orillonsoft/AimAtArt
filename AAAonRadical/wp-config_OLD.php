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
define('DB_NAME', 'aimatart');

/** MySQL database username */
define('DB_USER', 'gh0021');

/** MySQL database password */
define('DB_PASSWORD', 'radical');

/** MySQL hostname */
define('DB_HOST', 'radicalgraphics.com');

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
define('AUTH_KEY',         'F-RVv<:z`5/%{R@$E=+?XZ1K)`~:8~(^ H5Y&~W0mfIS5Xli#8-}myxk%w~n@:`t');
define('SECURE_AUTH_KEY',  't|8TPf=^ryPHVEw|+ZrQrc]DL-e@=Mke)A>nV;k;6DYNH4YdtxlA+o_dMMA$%gA2');
define('LOGGED_IN_KEY',    'BYN4EvXIN8`4PkU=/B5c#A!O{)vBQVaL:(8d:z<*V b{1PL5h[3FV|mo#2N@:-nK');
define('NONCE_KEY',        'AU.H6b*:,DKo!^a1FOG~Vkh&?5WIW|=.0h]^JR.P9g][R;z&~H-0V2QC?G# @q#`');
define('AUTH_SALT',        'O9[rgY#Y_Igj0]AKi]*.3wfZ;ZS<P,on6k}Qvgx0snXHF]m*mtM+>,tA-cA-$S-}');
define('SECURE_AUTH_SALT', 'e7tE%b9lKGEtMlfm,*^48Z6xb,$L+fYN-H-YK-!08t0N.VjW<ah9z/.->3TixgqA');
define('LOGGED_IN_SALT',   'Ate8RM|x@aLbm|ngh%|<].^hx@/Jc%C%3&!H.sw%l3_h:}r_3(O/^TP?[}exomKc');
define('NONCE_SALT',       '~pYABSzZC$%ED4e$KeQ6S`}l3d$T:/-,y:YBM)x<Mr@=*`<<FMMybF--ztkiM}3L');

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
define('WPLANG', 'en_EN');

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
