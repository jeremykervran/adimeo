<?php

namespace Adimeo\Permissions\Admin;

class Scripts
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_permissions_script']);
    }

    /**
     * Ajout des scripts JS de permissions
     *
     * @param string $hook_suffix
     * @return void
     */
    public function enqueue_permissions_script(string $hook_suffix): void
    {
        if ('user-edit.php' !== $hook_suffix) {
            return;
        }

        wp_enqueue_script('user-permissions', plugins_url(ADIMEO_PERMISSIONS_SLUG . '/assets/js/user-permissions.js'), ['jquery'], null, true);
        wp_localize_script('user-permissions', 'userPermissions', [
            'apiUrl' => esc_url(rest_url('adimeo/v1/capabilities/')),
            'nonce'  => wp_create_nonce('wp_rest'),
            'userId' => $_GET['user_id'] ?? '',
        ]);
    }
}