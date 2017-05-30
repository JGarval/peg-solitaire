var usersToEnable;

$(document).ready(function () {
    usersToEnable();
});

function usersToEnable() {
    $.getJSON(
        '/api/users',
        function(data) {
            $.each(data, function(i, field){
                var id = field.id;
                var username = field.username;
                var name = field.name;
                var second_name = field.second_name;
                var email = field.email;
                var phone = field.phone;
                var enabled = field.enabled;
                var isAdmin = field.isAdmin;
                var created_at = field.created_at;
                var updated_at = field.updated_at;

                if (enabled == 0) {
                    $('#peticiones').append('' +
                        '<div class="row">' +
                        '<div id="username" class="col-xs-2">' + username + '</div>' +
                        '<div id="email" class="col-xs-2">' + email + '</div>' +
                        '<div class="col-xs-1"><button id="ok" class="btn btn-success">' + 'Accept' + '</button></div>' +
                        '<div class="col-xs-1"><button id="ko" class="btn btn-danger">' + 'Cancel' + '</button></div>' +
                        '</div>' +
                        '<hr>');
                }
            });
        }
    );
}