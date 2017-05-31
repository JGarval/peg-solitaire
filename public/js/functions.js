$(document).ready(function () {
    adminOptions();
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
                        '<div class="col-xs-1"><button id="ok" class="btn btn-success" onclick="enableUser(' + user.id + ');">' + 'Accept' + '</button></div>' +
                        '<div class="col-xs-1"><button id="ko" class="btn btn-danger" onclick="deleteUser(' + user.id + ');">' + 'Cancel' + '</button></div>' +
                        '</div>' +
                        '<hr>');
                } else {
                    $('#users_list').append('' +
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
            alert('Está mal');
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
            alert('Está mal');
        },
        complete: function () {
            window.location.reload(true);
        }
    });
}