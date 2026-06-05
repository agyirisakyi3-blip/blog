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

// ** Database settings - handled by environment detection below ** //

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
define( 'AUTH_KEY',         'p0a#ViMGjUMm>Z4AaOkf.c]Ip)n2)w*35ltAaJ,6 s2UnQ+1Kl)*cAv/e|:?H2!@' );
define( 'SECURE_AUTH_KEY',  'K~JiK=9)kKbK5zSn+-DrTdSEcr{k~Dfe8f#)2_E yJ?ebbjI/tlvGLm:Oo0Am;pc' );
define( 'LOGGED_IN_KEY',    'Tr*U|zZq-8b,umn^!~jGrqJG[I[%+_J/59+zy3#^>_(0H+.mF[T{o]NX#2%@I;dY' );
define( 'NONCE_KEY',        'MExNG_+NXGQI7Z%B_A+mLaTK792}|td@oK:Qt^[|@Na|}<~gomA?-mj(H{~85hfr' );
define( 'AUTH_SALT',        '~pcI;vZ ql>y]DHZ/+;5NoL*2&KM2XL0|<]PsK_$H|jPA6+K&{8Q+lDf1WzBzU f' );
define( 'SECURE_AUTH_SALT', 'QCpDjia+Q-ng8od|sgQ8{U.gumh`.C~zZdU<P%_{}KCE]-pU>^rstDHj|,UJSZ^+' );
define( 'LOGGED_IN_SALT',   '|Ze3uUyC7H|A`/W^4`Sw ,hnBg(l42hJ}3;@W[#O?%ji++8;|#:K{H@<==0w=e_Z' );
define( 'NONCE_SALT',       'E=(w7Az6?avAMG3eLk5ub-p<}CubGpYqvY-#LmwY-*}b|_<DW4G20i_VWsC{!$Aq' );








/**#@-*/

/**
 * Environment detection.
 * Set WP_ENVIRONMENT_TYPE=production in your server env for production.
 */
if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) ) {
	define( 'WP_ENVIRONMENT_TYPE', getenv( 'WP_ENVIRONMENT_TYPE' ) ?: 'local' );
}

/**
 * Database: Use MySQL env vars in production, fallback to SQLite for local.
 * Set these env vars on your production server:
 *   DB_NAME, DB_USER, DB_PASSWORD, DB_HOST
 */
$db_name     = getenv( 'DB_NAME' ) ?: 'wordpress_news';
$db_user     = getenv( 'DB_USER' ) ?: 'root';
$db_password = getenv( 'DB_PASSWORD' ) ?: '';
$db_host     = getenv( 'DB_HOST' ) ?: '127.0.0.1:3307';

if ( getenv( 'DB_NAME' ) ) {
	// Production: MySQL via environment variables
	define( 'DB_NAME',     $db_name );
	define( 'DB_USER',     $db_user );
	define( 'DB_PASSWORD', $db_password );
	define( 'DB_HOST',     $db_host );
	unset( $db_name, $db_user, $db_password, $db_host );
} else {
	// Local: SQLite fallback
	define( 'DB_NAME',     $db_name );
	define( 'DB_USER',     $db_user );
	define( 'DB_PASSWORD', $db_password );
	define( 'DB_HOST',     $db_host );
	define( 'DB_DIR',      __DIR__ . '/wp-content/database' );
	define( 'DB_FILE',     'wordpress_news.db' );
	define( 'DATABASE_TYPE', 'sqlite' );
	unset( $db_name, $db_user, $db_password, $db_host );
}

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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

/* Production hardening */
if ( WP_ENVIRONMENT_TYPE === 'production' ) {
	define( 'WP_DEBUG',          false );
	define( 'WP_DEBUG_DISPLAY',  false );
	define( 'WP_DEBUG_LOG',      false );
	define( 'DISALLOW_FILE_EDIT', true );
	define( 'DISALLOW_FILE_MODS', true );
	define( 'WP_AUTO_UPDATE_CORE', true );
	define( 'FORCE_SSL_ADMIN',    true );
	define( 'WP_POST_REVISIONS',  5 );
	define( 'MEDIA_TRASH',        true );
	define( 'EMPTY_TRASH_DAYS',   30 );
	define( 'WP_CRON_LOCK_TIMEOUT', 120 );
} else {
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
	define( 'WP_DEBUG',         true );
	define( 'WP_DEBUG_DISPLAY', true );
	define( 'WP_DEBUG_LOG',     false );
	define( 'WP_POST_REVISIONS', 10 );
}

define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


