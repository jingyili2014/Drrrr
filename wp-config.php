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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'BP_e;|cDe$/5b*1es[^Z6!W2d1.%]Eog$Cw)Xn^[<h1QS#yx5/N{OVpU-F_a0dt4' );
define( 'SECURE_AUTH_KEY',  'J&~k/W&G8nx7A0kF6E}h4eJMHS M!,n0a~V_Gt9_;&|> Y)TeXra)dAzuwEP%2s~' );
define( 'LOGGED_IN_KEY',    'hL7pk.*7@Qw7K8=<3p_*lJQOBi}MFFVz2t1z~nr#S!3j.!d;$AB6$`Y1A<$!1^G>' );
define( 'NONCE_KEY',        'LuDRSzwa=gV#P/xlekXuYBcx08wxYyt`.e?=`4h.Lco5+1v:mpHP9@O^O%Cum/ (' );
define( 'AUTH_SALT',        '09GqkJg4 Seh`A`gSQl-FwI~OgUJ5:vQJ1H&gR9CFhAW#vAD=m_}=A|g2/6u+E)P' );
define( 'SECURE_AUTH_SALT', 'E8iuMOQ^llC#FC:l`mKE6^QF/d,CM4vnsGc5A4{9QR{z0g|<+?;3N9T0b|x$IlJ5' );
define( 'LOGGED_IN_SALT',   '>kG|XoKt7R@P$>O$Ar<Bx{v69=LX/d%%Wti@.$Rp5zJ<@kvx]+QxQj-Qx1)tLqo)' );
define( 'NONCE_SALT',       'Vtg[_$iJFP4/|gulrl;~OQL7wx]r!7q%Xd.cqCtoCJy~`)yt30QiFv9fw7J5aIWQ' );

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
