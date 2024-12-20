<?php
/**
 * Plugin Name:          Adimeo - Permissions
 * Plugin URI:           https://github.com/jeremykervran/adimeo/
 * Description:          Gestion des permissions utilisateurs
 * Author:               Jérémy Kervran
 * Author URI:           https://github.com/jeremykervran/
 * Text Domain:          adimeo-permissions
 * Domain Path:          /languages
 * Version:              1.0.0
 * Requires at least:    6.7
 * Requires PHP:         8.2
 * License:              GPLv3 or later
 * License URI:          https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Adimeo\Permissions;

use Adimeo\Permissions\Admin\User;
use Adimeo\Permissions\Admin\Scripts;
use Adimeo\Permissions\API\Routes;

defined('ABSPATH') || exit;

// Composer autoload
if (file_exists(plugin_dir_path(__FILE__) . '/vendor/autoload.php')) {
    require_once plugin_dir_path(__FILE__) . '/vendor/autoload.php';
}

// Constantes
define('ADIMEO_PERMISSIONS_VERSION', '1.0.0');
define('ADIMEO_PERMISSIONS_TITLE', 'User');
define('ADIMEO_PERMISSIONS_SLUG', 'adimeo-permissions');
define('ADIMEO_PERMISSIONS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ADIMEO_PERMISSIONS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ADIMEO_PERMISSIONS_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('ADIMEO_PERMISSIONS_TEMPLATES_PATH', ADIMEO_PERMISSIONS_PLUGIN_DIR . 'templates/');
define('ADIMEO_PERMISSIONS_ASSETS_PATH', ADIMEO_PERMISSIONS_PLUGIN_DIR . 'assets/');

// Chargement des classes
new User();
new Scripts();
new Routes();