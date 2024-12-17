<?php

namespace Adimeo\Permissions\Admin;

use WpOrg\Requests\Exception\Http\Status500;

class Menu {

	public function __construct() {
		add_action('admin_menu', [ $this, 'register_menu' ]);
	}

	/**
	 * Déclaration du menu des permissions
	 *
	 * @return void
	 */
	public function register_menu(): void {
		add_menu_page(
			ADIMEO_PERMISSIONS_TITLE,
			ADIMEO_PERMISSIONS_TITLE,
			'manage_options',
			ADIMEO_PERMISSIONS_SLUG,
			[ $this, 'render_page' ],
			'dashicons-admin-generic',
			30
		);
	}

	/**
	 * Chargement du template de la page de menu
	 *
	 * @throws Status500
	 * @return void
	 */
	public function render_page(): void {
		$template = ADIMEO_PERMISSIONS_TEMPLATES_PATH . 'admin/menu-page.php';

		// Gestion du cas où le template est manquant
		if (!file_exists($template)) {
			throw new Status500('Le template du menu ' . ADIMEO_PERMISSIONS_TITLE . ' est manquant.');
		}

		include $template;
	}

}
