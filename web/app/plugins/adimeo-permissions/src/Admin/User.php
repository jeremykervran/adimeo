<?php

namespace Adimeo\Permissions\Admin;

use WpOrg\Requests\Exception\Http\Status500;

class User
{
    public function __construct()
    {
        add_action('edit_user_profile', [$this, 'add_permissions_section']);
    }

    /**
     * Ajout de la section des permissions
     *
     * @param \WP_User $user
     *
     * @return void
     * @throws Status500
     */
    public function add_permissions_section(\WP_User $user): void
    {
        // Vérification des doits nécessaires de l'utilisateur courant
        if (!current_user_can('administrator')) {
            return;
        }

        $template = ADIMEO_PERMISSIONS_TEMPLATES_PATH . 'admin/user-permissions.php';

        // Gestion du cas où le template est manquant
        if (!file_exists($template)) {
            throw new Status500('Le template des permissions utilisateur est manquant.');
        }

        // Récupérations des rôles WordPress et du rôle de l'utilisateur courant
        $roles = wp_roles()->get_names();
        $user_role = $user->roles[0] ?? '';

        // Ajout de query_vars pour le template
        set_query_var('roles', $roles);
        set_query_var('user_role', $user_role);

        include_once $template;
    }
}