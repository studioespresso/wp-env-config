<?php 
/** 
* This config setup is a combination of inspiration from Matt Weinberg and Leevi Graham
* @link       http://eeinsider.com/articles/multi-server-setup-for-ee-2/
* @link       http://ee-garage.com/nsm-config-bootstrap
* 
* @package    Focus Lab Master Config
* @version    1.1.1
* @author     Focus Lab, LLC <dev@focuslabllc.com>
* @see        https://github.com/focuslabllc/ee-master-config
*/


// Require the environment declaration file if it has not already been loaded by wp-config.php
if (!defined('ENV')) 
{
    require 'config.env.php';
}
/**
 * Load our environment-specific config file
 * which contains our database credentials
 * 
 * @see config/config.local.php
 * @see config/config.dev.php
 * @see config/config.prod.php
 */
require 'config.' . ENV . '.php';

/** MySQL database name */
define('DB_NAME', $config_db);
/** MySQL database username */
define('DB_USER', $config_user);
/** MySQL database password */
define('DB_PASSWORD', $config_pw);
/** MySQL hostname */
define('DB_HOST', $config_host);
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', $config_charset);
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

$table_prefix  = $config_tableprefix;

// /**
//  * For developers: WordPress debugging mode.
//  *
//  * Change this to true to enable the display of notices during development.
//  * It is strongly recommended that plugin and theme developers use WP_DEBUG
//  * in their development environments.
//  */
// define('WP_DEBUG', false);

// // Tells WordPress to log everything to the /wp-content/debug.log file
// define('WP_DEBUG_LOG', false);

// // Doesn't force the PHP 'display_errors' variable to be on
// define('WP_DEBUG_DISPLAY', false);

// // Hides errors from being displayed on-screen
// @ini_set('display_errors', 0);

if ($config_debug_mode = 'yes') {define('WP_DEBUG', true);} else {define('WP_DEBUG', false);};

?>