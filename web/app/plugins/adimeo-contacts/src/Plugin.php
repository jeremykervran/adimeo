<?php

namespace Adimeo\Contacts;

use WpOrg\Requests\Exception\Http\Status500;

class Plugin {
	/**
	 * @throws Status500
	 */
	public static function activate(): Status500|bool {
		if (!is_plugin_active('advanced-custom-fields/acf.php')) {
			throw new Status500('The ACF plugin is not active. It is required to run this plugin.');
		}

		return true;
	}

	public static function deactivate(): bool {
		// Ajouter du code à exécuter à la désactivation si nécessaire
		return true;
	}
}