<?php

namespace Adimeo\Contacts\ACF;

use WpOrg\Requests\Exception\Http\Status500;

class Loader {

	public function __construct() {
		add_action( 'acf/init', [ $this, 'load_acf_files' ] );
	}

	/**
	 * @throws Status500
	 */
	public function load_acf_files(): void {
		if (!is_dir(ADIMEO_CONTACTS_ACF_PHP_DIR)) {
			throw new Status500('The directory containing ACF PHP files is missing.');
		}

		$acf_files = glob(ADIMEO_CONTACTS_ACF_PHP_DIR . '/*.php');

		foreach ($acf_files as $acf_file) {
			include_once $acf_file;
		}
	}

}