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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress bd' );

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
define( 'AUTH_KEY',         'sTsbu%&Y2+0gB:7;9y9i0gN|Q _#f#|&b*IP^|~t9@CsxVy`G`=*)P/o{g;x<,m ' );
define( 'SECURE_AUTH_KEY',  '[)SelsSk@F)%hHETkBqO9d1IduC|JDXUp+G{rKLpk9h;%DplFp2Q.ZNdDhE+9[_V' );
define( 'LOGGED_IN_KEY',    'PLQ&S7k`iKyYS%>!R8myaszr@x!hdE<%x L2GxrCX&bb+9HXcW0 7I|@TK[@o6!`' );
define( 'NONCE_KEY',        'Q^ew^/T_Vb(Q1IDnw*0ELGchOpezN:%5 {}hUz,mXNKQFpkbz3n8Wa_36SHRE,.@' );
define( 'AUTH_SALT',        '4#mif5vO(>~{5&$RPZC3k23Px;f9d*VYNYu&lmWj;e+OR[Ye6VR;!,D$R$}!OjO4' );
define( 'SECURE_AUTH_SALT', 'ic3vpSKul/83n3dX&Fqvx~6(e)j23Q9;N$3LR}TNUW]k!3QX7t{Sn6/Az6x7$]B%' );
define( 'LOGGED_IN_SALT',   't1hYV rH3_RA#|NeXwQ/y&q:=C87hr[V~K.,,<~%x^^9=_>4xOL0VqCXzzBSftc)' );
define( 'NONCE_SALT',       'n[Gz-;1DC:X0^QaJiiZ @i>wp1ST>H@6>kP7h)<?d,o,p1`d$Oc7ZE|Vo,aY{lvL' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
