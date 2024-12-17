<?php
/**
 * Plugin Name:          Adimeo - Base Documentaire
 * Plugin URI:           https://github.com/jeremykervran/adimeo/
 * Description:          Gestion des documents
 * Author:               Jérémy Kervran
 * Author URI:           https://github.com/jeremykervran/
 * Text Domain:          adimeo-base-documentaire
 * Domain Path:          /languages
 * Version:              1.0.0
 * Requires at least:    6.7
 * Requires PHP:         8.2
 * License:              GPLv3 or later
 * License URI:          https://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Adimeo\BaseDocumentaire;

use Adimeo\BaseDocumentaire\ACF\Fields;
use Adimeo\BaseDocumentaire\ACF\Loader;

defined('ABSPATH') || exit;

// Composer autoload
if (file_exists(plugin_dir_path(__FILE__) . '/vendor/autoload.php')) {
	require_once plugin_dir_path(__FILE__) . '/vendor/autoload.php';
}

define('ADIMEO_BASE_DOC_VERSION', '1.0.0');
define('ADIMEO_BASE_DOC_TITLE', 'Base Documentaire');
define('ADIMEO_BASE_DOC_SLUG', 'adimeo-base-documentaire');
define('ADIMEO_BASE_DOC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ADIMEO_BASE_DOC_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ADIMEO_BASE_DOC_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('ADIMEO_BASE_DOC_ACF_PHP_DIR', ADIMEO_BASE_DOC_PLUGIN_DIR . 'assets/acf/php');

// Activation & deactivation hooks
register_activation_hook( __FILE__, ['Adimeo\BaseDocumentaire\Plugin', 'activate'] );
register_deactivation_hook( __FILE__, ['Adimeo\BaseDocumentaire\Plugin', 'deactivate'] );

// Classes
new Loader();
new Fields();