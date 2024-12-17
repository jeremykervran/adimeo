<?php
/**
 * Template Name: Plan du site
 */

use Timber\Timber;

// Préparer les données nécessaires pour le contexte
$context = Timber::context();

// Récupérer les articles par type de contenu et triés
$context['posts'] = Timber::get_posts([
	'post_type'      => 'post',
	'posts_per_page' => -1,
	'orderby'        => 'date',
	'order'          => 'DESC',
]);

$context['pages'] = Timber::get_posts([
	'post_type'      => 'page',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
]);

// Si vous avez des types de contenu personnalisés, ajoutez-les ici
$context['custom_posts'] = Timber::get_posts([
	'post_type'      => 'custom_post_type',
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC',
]);

// Afficher le template Twig
Timber::render('page-sitemap.twig', $context);
