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
define( 'DB_NAME', 'datacorekr' );

/** MySQL database username */
define( 'DB_USER', 'datacorekr' );

/** MySQL database password */
define( 'DB_PASSWORD', 'w3m69p21!@' );

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
define( 'AUTH_KEY',         'F<I4!27y*,;Jj~_9y8sXR4cN4!}!~@b33|d LXZHYV/)`dV-4>8a!rqX6jUD,P`+' );
define( 'SECURE_AUTH_KEY',  'J2L3CL^SjRzu?U5l2Nk+#N?d=l,GsjBY{cSyYTASJoJplQGZ=b7o:QB_-?%E|>=y' );
define( 'LOGGED_IN_KEY',    'eZNbGT2k*BsGU?$nD=V=,Ye*YYsdj[i4^%KtkwrxxJDqa9gjptF&66_>4zTq@HJZ' );
define( 'NONCE_KEY',        '~CO_j-1bIr]10hV:8O-/z:$k5u0FB/vM*L[v@EhBMi]u74Orcp2TZS[{=BR~C)k]' );
define( 'AUTH_SALT',        'pYKx|<AxJZS9[Th#]<|WY3Ri4sez}Q&CJP]JPj~R4k~gtKWf?<@Ye?E#bUOtN)x|' );
define( 'SECURE_AUTH_SALT', 'dQGy^yD2n&}1B^*$*U_^V!_k%Lw4^7{Qr7tl7(tjrYQG>;_9hA}/94=au8r#D!O*' );
define( 'LOGGED_IN_SALT',   '5UO1h2~859A#e/GGZomLgAP~vu(=E4;]M:%6m9X43NCQ8V+ynV]0AXK) i[K]CR(' );
define( 'NONCE_SALT',       '.{AH!&vdOH:eu0T*i>c~{1M[X*:FizbaqZw9&-@7DJv~o-v^k26bt!bKSa(U=3bz' );

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
