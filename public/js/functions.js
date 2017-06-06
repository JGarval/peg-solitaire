$(document).ready(function () {
    adminOptions();

    /**
     * TODO:
     * 1. ¿Es buena práctica: var users = getUsers()?
     * 2. ¿Cómo hacer 2 way binding en JS? Es decir, que se actualice sin necesidad de refrescar la página.
     * 3.
     */
});

function getUsers() {
    $.getJSON(
        '/api/users',
        function(data) {
            // $.each(data, function(i, field) {
            //     var id = field.id;
            //     var username = field.username;
            //     var name = field.name;
            //     var second_name = field.second_name;
            //     var email = field.email;
            //     var phone = field.phone;
            //     var enabled = field.enabled;
            //     var isAdmin = field.isAdmin;
            //     var created_at = field.created_at;
            //     var updated_at = field.updated_at;
            // });
            return data;
        }
    );
}

function usersToEnable() {
    users = getUsers();
    $.each(users, function (i, user) {
        if (user.enabled == 0) {
            $('#users_to_enable').append('' +
                '<div class="row">' +
                    '<div id="username" class="col-xs-3">' + user.username + '</div>' +
                    '<div id="email" class="col-xs-3">' + user.email + '</div>' +
                    '<div class="col-xs-1"><button id="ok" class="btn btn-success">' + 'Accept' + '</button></div>' +
                    '<div class="col-xs-1"><button id="ko" class="btn btn-danger">' + 'Cancel' + '</button></div>' +
                '</div>' +
                '<hr>');
        }
    });
}

function adminOptions() {
    $.getJSON(
        '/api/users',
        function(data) {
            $.each(data, function (i, user) {
                if (user.enabled == 0) {
                    $('#users_to_enable').append('' +
                        '<div class="row">' +
                        '<div id="username" class="col-xs-3">' + user.username + '</div>' +
                        '<div id="email" class="col-xs-3">' + user.email + '</div>' +
                        '<div class="col-xs-1"><button id="ok" class="btn btn-success" onclick="enableUser(' + user.id + ');">' + 'Enable' + '</button></div>' +
                        '<div class="col-xs-1"><button id="ko" class="btn btn-danger" onclick="deleteUser(' + user.id + ');">' + 'Delete' + '</button></div>' +
                        '</div>' +
                        '<hr>');
                } else {
                    $('#users_list').append('' +
                        '<div class="row">' +
                        '<div id="username" class="col-xs-3">' + user.username + '</div>' +
                        '<div id="email" class="col-xs-3">' + user.email + '</div>' +
                        '<div class="col-xs-1"><button id="show" class="btn btn-default" onclick="editUser(' + user.id + ');">' + 'Edit' + '</button></div>' +
                        '<div class="col-xs-1"><button id="edit" class="btn btn-primary" onclick="disableUser(' + user.id + ');">' + 'Disable' + '</button></div>' +
                        '<div class="col-xs-1"><button id="ko" class="btn btn-danger" onclick="deleteUser(' + user.id + ');">' + 'Delete' + '</button></div>' +
                        '</div>' +
                        '<hr>');
                }
            });
        }
    );
}

function enableUser(id) {
    $.ajax({
        url: '/api/users/' + id,
        type: 'PUT',
        data: {
            'enabled': 1
        },
        success: function () {
            $('#alert_success').show();
        },
        error: function () {
            $('#alert_danger').show();
        },
        complete: function () {
            window.location.reload(true);
        }
    });
}

function deleteUser(id) {
    $.ajax({
        url: '/api/users/' + id,
        type: 'DELETE',
        success: function () {
            $('#alert_success').show();
        },
        error: function () {
            $('#alert_danger').show();
        },
        complete: function () {
            window.location.reload(true);
        }
    });
}

function showUser(id) {
    $.ajax({
        url: '/api/users/' + id,
        type: 'GET',
        success: function () {
            $('#alert_success').show();
        },
        error: function () {
            $('#alert_danger').show();
        },
        complete: function () {
            window.location.replace('http://127.0.0.1:8000/api/users/' + id);
            $('#alert_danger').append()
        }
    });
}

function disableUser(id) {
    /**
     * TODO:
     * 1. Tiene que redireccionar a un formulario para editar el usuario.
     * 2. O tiene que cambiar el estado de enable a 0
     */

    $.ajax({
        url: '/api/users/' + id,
        type: 'PUT',
        data: {
            'enabled': 0
        },
        success: function () {
            $('#alert_success').show();
        },
        error: function () {
            $('#alert_danger').show();
        },
        complete: function () {
            window.location.reload(true);
        }
    });
}

function editUser($id) {
    window.location.replace('http://127.0.0.1:8000/edit/' + $id);
}