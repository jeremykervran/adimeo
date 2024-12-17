<?php

/**
 * Plugin Name:          Adimeo - Contacts
 * Plugin URI:           https://github.com/jeremykervran/adimeo/
 * Description:          Gestion des contacts
 * Author:               Jérémy Kervran
 * Author URI:           https://github.com/jeremykervran/
 * Text Domain:          adimeo-contacts
 * Domain Path:          /languages
 * Version:              1.0.0
 * Requires at least:    6.7
 * Requires PHP:         8.2
 * License:              GPLv3 or later
 * License URI:          https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Adimeo\Contacts;

use Adimeo\Contacts\ACF\Loader;

defined('ABSPATH') || exit;

// Composer autoload
if (file_exists(plugin_dir_path(__FILE__) . '/vendor/autoload.php')) {
	require_once plugin_dir_path(__FILE__) . '/vendor/autoload.php';
}

// Constantes
define('ADIMEO_CONTACTS_VERSION', '1.0.0');
define('ADIMEO_CONTACTS_TITLE', 'Contacts');
define('ADIMEO_CONTACTS_SLUG', 'adimeo-contacts');
define('ADIMEO_CONTACTS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ADIMEO_CONTACTS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ADIMEO_CONTACTS_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('ADIMEO_CONTACTS_ACF_PHP_DIR', ADIMEO_CONTACTS_PLUGIN_DIR . 'assets/acf/php');

// Activation & deactivation hooks
register_activation_hook(__FILE__, ['Adimeo\Contacts\Plugin', 'activate']);
register_deactivation_hook(__FILE__, ['Adimeo\Contacts\Plugin', 'deactivate']);

new Loader();

