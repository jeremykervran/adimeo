<h2>Permissions</h2>
<table class="form-table">
    <tr>
        <th><label for="user_role">Rôle de l'utilisateur</label></th>
        <td>
            <select id="user_role" name="user_role">
                <?php foreach ($roles as $role => $name): ?>
                    <option value="<?php echo esc_attr($role); ?>" <?php selected($user_role, $role); ?>>
                        <?php echo esc_html($name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <th><label for="user_capabilities">Capacités</label></th>
        <td id="capabilities_list">

        </td>
    </tr>
</table>