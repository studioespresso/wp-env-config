#wp-env-config

A configuration setup that allows for WordPress multi-environment support by giving each envorinment of config file. Each environment is determined by the URL from which it serves the site.


##Setup
_Note:  You can use this configuration on a new WordPress install and on excisting websites._

1. Add the config/ files and its contents to the root of your WordPress install
    (if you've moved your wp-config file to a different location, add the config folder there)
2. Add `require_once('config/config.master.php');` to your `wp-config.php`, right above the `wp-settings.php` include.
    Example:
    ```php
    -- bottom of wp-config.php --

    /* That's all, stop editing! Happy blogging. */

    /** Custom config **/ 
    require_once('config/config.master.php');
    
    /** Absolute path to the WordPress directory. */
    if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');
    
    /** Sets up WordPress vars and included files. */
    require_once(ABSPATH . 'wp-settings.php');
    ```
3. Make sure you remove the database settings from `wp-config.php`, those are now in `config.master.php` (see example config in the repo).

##Usage

wp-env-config comes with 3 configs (local, dev, prod) and it selects the environment used __based on the url from which the website is served__ (those are defined in `config.env.php`, defaults to the local config).

1. Add the urls for the enviroments you want to use to `config.env.php`:

    ```php
    if (!defined('ENV')) {
        switch (strtolower($_SERVER['HTTP_HOST'])) {
        case 'website.tld' :
        case 'www.website.tld' :
            define('ENV', 'prod');
            define('ENV_FULL', 'Production');
            define('ENV_DEBUG', false);
            break;
    
    ```
    To add an environment with a different name you copy the switch above, change the `ENV` parameter and add a `config.newenv.php` to the `config/` folder.
    
2. In the environment file in question, add your database details:
    ```php
    $config_db = '';
    $config_user = '';
    $config_pw = '';
    $config_host = '';
    $config_charset = 'utf8';
    $config_tableprefix = 'wp_';
    define('DB_COLLATE', ''); 
    ```
3. You're done! You can now deploy your site to your various environments and, if the urls you entered match up, everything should just work :)

## Support

Support for this plugin will be provided in the form of Product Support. This means that we intend to fix any confirmed bugs and improve the user experience when enhancements are identified and can reasonably be accomodated. There is no User Support provided for this plugin. If you are having trouble with this plugin in your particular installation of WordPress, we will not be able to help you troubleshoot the problem.

##License
This plugin is provided under the terms of the GPL, including the following:

BECAUSE THE PROGRAM IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW. EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE PROGRAM "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU. SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.

##Credits
This configuration is mostly a fork of [FocusLab's Expression Engine config](https://github.com/focuslabllc/ee-master-config).