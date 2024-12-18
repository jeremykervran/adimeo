<?php

namespace Adimeo\Permissions\API;

class Routes
{
    private string $routes_namespace = 'adimeo/v1';

    private string $get_user_caps_route = '/capabilities/(?P<role>[a-zA-Z0-9_-]+)';

    private string $update_user_caps_route = '/capabilities/(?P<userId>[0-9_-]+)';

    public function __construct()
    {
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    /**
     * Enregistrement des routes API REST
     *
     * @return void
     */
    public function register_routes(): void
    {
        // Route pour récupérer les capabilities par role
        register_rest_route(
            $this->routes_namespace,
            $this->get_user_caps_route,
            [
                'methods'  => 'GET',
                'callback' => [$this, 'get_role_capabilities'],
                'permission_callback' => function () {
                    return current_user_can('administrator');
                },
            ]
        );

        // Route pour mettre à jour les capabilities du WP_User
        register_rest_route(
            $this->routes_namespace,
            $this->update_user_caps_route,
            [
                'methods'  => 'POST',
                'callback' => [$this, 'update_user_capabilities'],
                'permission_callback' => function () {
                    return current_user_can('administrator');
                },
            ]
        );
    }

    /**
     * Récupération des capabilities d'un rôle au GET
     *
     * @param \WP_REST_Request $request
     *
     * @return \WP_Error|\WP_REST_Response|\WP_HTTP_Response
     */
    public function get_role_capabilities(\WP_REST_Request $request): \WP_Error|\WP_REST_Response|\WP_HTTP_Response
    {
        // Récupération du WP_User
        $user_id = sanitize_text_field($request->get_param('userId'));
        $edited_user = get_user_by('id', $user_id);

        // Récupération du rôle ciblé
        $role_name = sanitize_text_field($request->get_param('role'));
        $role_object = get_role($role_name);

        // Si le rôle n'existe pas, on renvoie une erreur
        if (!$role_object) {
            return new \WP_Error('invalid_role','The specified role does not exist.', ['status' => 404]);
        }

        // On retourne une réponse REST avec le rôle et les capabilities liées
        return rest_ensure_response([
            'role'         => $role_name,
            'capabilities' => array_keys($role_object->capabilities),
            'user_capabilities' => array_keys($edited_user->caps)
        ]);
    }

    /**
     * Modification des capabilities du WP_User au POST
     *
     * @param \WP_REST_Request $request
     *
     * @return \WP_Error|\WP_HTTP_Response
     */
    public function update_user_capabilities(\WP_REST_Request $request): \WP_Error|\WP_HTTP_Response
    {
        // Récupération du WP_User
        $user_id = sanitize_text_field($request['userId']);
        $edited_user = get_user_by('id', $user_id);

        // Vérification de l'existence du WP_User
        if (!$edited_user) {
            return new \WP_Error('invalid_user', 'The specified user does not exist.', ['status' => 404]);
        }

        // Récupération du role sélectionné
        $selected_role = sanitize_text_field($request['selectedRole']);

        // Suppression des rôles existants et mise à jour du nouveau role
        foreach ($edited_user->roles as $role) {
            $edited_user->remove_role($role);
        }

        $edited_user->set_role($selected_role);

        // Récupération des valeurs des checkboxes des capabilities
        $checked_caps = json_decode(sanitize_text_field($request['checkedCapabilities']));
        $unchecked_caps = json_decode(sanitize_text_field($request['uncheckedCapabilities']));

        // Pour chaque capability cochée, on l'ajoute au WP_User
        if ($checked_caps) {
            foreach ($checked_caps as $cap) {
                $edited_user->add_cap($cap);
            }
        }

        // Pour chaque capability décochée, on la retire au WP_User
        if ($unchecked_caps) {
            foreach ($unchecked_caps as $cap) {
                $edited_user->remove_cap($cap);
            }
        }

        return rest_ensure_response([
            'success' => true,
            'user' => $edited_user,
            'capabilities' => $edited_user->get_role_caps(),
        ]);
    }
}