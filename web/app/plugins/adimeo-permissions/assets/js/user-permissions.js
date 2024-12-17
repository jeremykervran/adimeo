jQuery(document).ready(function ($) {
    const $roleSelect = $('#user_role');
    const $capabilitiesList = $('#capabilities_list');

    function refreshCapabilitiesList(role) {
        const url = `${userPermissions.apiUrl}${role}`;
        const nonce = `${userPermissions.nonce}`;

        // Requête GET pour récupérer les capabilities du rôle
        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            },
            success: function (data) {
                $capabilitiesList.empty();

                if (data.capabilities.length) {
                    data.capabilities.forEach(cap => {
                        const checkbox = `<label>
                            <input type="checkbox" name="user_capabilities[]" value="${cap}" checked />
                            ${cap}
                        </label><br>`;
                        $capabilitiesList.append(checkbox);
                    });
                } else {
                    $capabilitiesList.append('<p>Aucune capacité disponible.</p>');
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
            data: {
                userId: userId,
                checkedCapabilities: checkedCapabilities,
                uncheckedCapabilities: uncheckedCapabilities
            },
            type: 'POST',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            },
            success: function (data) {

            },
            error: function () {
                // $capabilitiesList.html('<p>Erreur lors de la récupération des capacités.</p>');
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
