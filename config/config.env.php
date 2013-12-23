<?php

/**
 * Environment Declaration
 *
 * This switch statement sets our environment based on the url at which the website is served.
 *
 * @package    On Edge Wordpress config
 * @version    1.0
 * @author     On Edge <dev@onedge.be>
 */

if (!defined('ENV')) {
    switch (strtolower($_SERVER['HTTP_HOST'])) {
        case 'website.tld' :
        case 'www.website.tld' :
            define('ENV', 'prod');
            define('ENV_FULL', 'Production');
            define('ENV_DEBUG', false);
            break;

        case 'project.dev.website.tld':
            define('ENV', 'dev');
            define('ENV_FULL', 'Development');
            define('ENV_DEBUG', true);
            break;

        default :
            define('ENV', 'local');
            define('ENV_FULL', 'Local');
            define('ENV_DEBUG', true);
            break;
    }
}

/* End of file config.env.php */
/* Location: ./config/config.env.php */