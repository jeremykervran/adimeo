jQuery(document).ready(function ($) {
    const $roleSelect = $('#user_role');
    const $capabilitiesList = $('#capabilities_list');

    function refreshCapabilitiesList(role) {
        const url = `${userPermissions.apiUrl}${role}`;
        const nonce = `${userPermissions.nonce}`;
        const userId = new URLSearchParams(window.location.search).get('user_id');

        // Requête GET pour récupérer les capabilities du rôle
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            data: {
                userId: userId,
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            },
            success: function (data) {
                $capabilitiesList.empty();

                if (data.capabilities.length) {
                    data.capabilities.forEach(cap => {
                        let checked = data.user_capabilities.includes(cap) ? 'checked' : '';
                        const checkbox = `<label>
                            <input type="checkbox" name="user_capabilities[]" value="${cap}" ${checked} />
                            ${cap}
                        </label><br>`;
                        $capabilitiesList.append(checkbox);
                    });
                } else {
                    $capabilitiesList.append('<p>Aucune capacité trouvée.</p>');
                }
            },
            error: function () {
                $capabilitiesList.html('<p>Erreur lors de la récupération des capacités.</p>');
            },

        })
    }

    function updateUserCapabilities() {
        const userId = `${userPermissions.userId}`;
        const url = `${userPermissions.apiUrl}${userId}`;
        const nonce = `${userPermissions.nonce}`;

        const selectedRole = $('#user_role option:selected').val();

        // Récupération de toutes les checkboxes des capabilities cochées
        const checkedCapabilities = $('#capabilities_list input[type="checkbox"]:checked')
            .map(function () {
                return $(this).val();
            })
            .get();

        // Récupération de toutes les checkboxes des capabilities décochées
        const uncheckedCapabilities = $('#capabilities_list input[type="checkbox"]:not(:checked)')
            .map(function () {
                return $(this).val();
            })
            .get();

        // Requête POST pour modifier les capabilities du WP_User
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: {
                userId: userId,
                selectedRole: selectedRole,
                checkedCapabilities: JSON.stringify(checkedCapabilities),
                uncheckedCapabilities: JSON.stringify(uncheckedCapabilities),
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            },
            success: function (data) {
                $(".capabilities-update-success").empty()
                $capabilitiesList.append('<p style="color:green;" class="capabilities-update-success">Capacités modifiées !</p>');
            },
            error: function () {
                $(".capabilities-update-error").empty()
                $capabilitiesList.append('<p style="color:red;" class="capabilities-update-error">Erreur lors de la modification des capacités.</p>');
            },

        })
    }

    // Mise à jour initiale
    refreshCapabilitiesList($roleSelect.val());

    // Mise à jour de la liste des capabilities au changement du select de rôle
    $roleSelect.on('change', function () {
        refreshCapabilitiesList($(this).val());
    });

    // Mise à jour des capabilities de l'utilisateur au change des checkboxes
    $capabilitiesList.on('change', function () {
        updateUserCapabilities()
    });
});
