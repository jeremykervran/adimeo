<?php
/**
 * Template Name: Plan du site
 */

use Timber\Timber;

// Préparer les données nécessaires pour le contexte
$context = Timber::context();

$context = Home::home_context($context);

$context['posts'] = Timber::get_posts([
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
]);

$context['pages'] = Timber::get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'posts_per_page' => -1,
]);

// Afficher le template Twig
Timber::render('page-sitemap.twig', $context);
