<?php

use Timber\Site;

class Home extends Site
{
	public function __construct()
    {
		add_filter('timber/context', [ $this, 'home_context' ]);

		parent::__construct();
	}

	/**
	 * Génération du context de la home
	 *
	 * @param $context
	 *
	 * @return array
	 */
	public static function home_context($context): array
    {
		// Home context
		$context['contacts'] = Timber::get_posts([
			'post_type' => 'contact',
			'post_status' => 'publish',
			'posts_per_page' => 3,
			'order' => 'ASC',
			'orderby' => 'post_name',
		]);

		$context['documents'] = Timber::get_posts([
			'post_type' => 'base-documentaire',
			'post_status' => 'publish',
			'posts_per_page' => 2,
			'order' => 'DESC',
			'orderby' => 'date',
		]);

		return $context;
	}
}