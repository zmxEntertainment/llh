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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'llh' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ';]Jo,%J>vR<>9.-xJ;?T6Xn`vn0RJfbIeUeFl_l$,mBW>*KCn<v>XK#<jmanA=3P' );
define( 'SECURE_AUTH_KEY',  '-UN~<+5/y+x)0<+kuNc2$v(h|At5KW*eGDTetu-u*/KS}<aw,@ltmoiD#MO=oFp|' );
define( 'LOGGED_IN_KEY',    'kBnE2qOD$tTf!dp-S.4Ts9t9~U;9CM( ~Io9b!b.r7ymmKKnDFvJrGe4wmz&ikS?' );
define( 'NONCE_KEY',        '$tb_$&IPu9s^M~?uawKM0mw4m/<=1z1GyL[b!MGs~+Gz^x$|1U~ pjHE^}BansB;' );
define( 'AUTH_SALT',        'Y$(Te6UKy9Y?>+ &;Rkvck)&IH=N8N.Mu Y$f}QO^~6J30nmt<GIudsK {k:Y^1|' );
define( 'SECURE_AUTH_SALT', 'S3ayFY8^b&OJbQWNMw97K>+7nKa<4d9oX_,z*I+ k8dx%To/[6Y/xK49-SL;F)Xj' );
define( 'LOGGED_IN_SALT',   'E(3[EaT[q<B_o*_|WHn-dzY D z9s745{BGTP(B%$%XBFsq]4%?f1zDeWgbdBa,L' );
define( 'NONCE_SALT',       'JW!(7;;_V7yg5ya5EwJ kz;SF;j{eSrgT!{-H0||FA?C*3Ne37j+Dzmso-O9F1>k' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
