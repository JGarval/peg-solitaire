$(document).ready(function () {
    adminOptions();
    printScores();
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
    var users = getUsers();
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
                        '<div class="col-xs-1"><button id="edit" class="btn btn-default" onclick="editUser(' + user.id + ');">' + 'Edit' + '</button></div>' +
                        '<div class="col-xs-1"><button id="edit" class="btn btn-primary" onclick="disableUser(' + user.id + ');">' + 'Disable' + '</button></div>' +
                        '<div class="col-xs-1"><button id="ko" class="btn btn-danger" onclick="deleteUser(' + user.id + ');">' + 'Delete' + '</button></div>' +
                        '</div>' +
                        '<hr>');
                }
            });
        }
    );

    $.getJSON(
        '/api/games',
        function(data) {
            $.each(data, function (i, game) {
                if (user.enabled == 0) {
                    $('#users_score').append('' +
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
                        '<div class="col-xs-1"><button id="edit" class="btn btn-default" onclick="editUser(' + user.id + ');">' + 'Edit' + '</button></div>' +
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
        error: function () {
            //$('#alert_danger').show();
        },
        success: function () {
            //$('#alert_success').show();
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
            //$('#alert_success').show();
        },
        error: function () {
            //$('#alert_danger').show();
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
            //$('#alert_success').show();
        },
        error: function () {
            //$('#alert_danger').show();
        },
        complete: function () {
            window.location.replace('http://127.0.0.1:8000/api/users/' + id);
            $('#alert_danger').append()
        }
    });
}

function disableUser(id) {
    $.ajax({
        url: '/api/users/' + id,
        type: 'PUT',
        data: {
            'enabled': 0
        },
        success: function () {
            //$('#alert_success').show();
        },
        error: function () {
            //$('#alert_danger').show();
        },
        complete: function () {
            window.location.reload(true);
        }
    });
}

function editUser($id) {
    window.location.replace('/edit/' + $id);
}

function updateUser($id) {
    var username = $('#inputUsername').val();
    var email = $('#inputEmail').val();
    var name = $('#inputName').val();
    var second_name = $('#inputSecondName').val();
    var phone = $('#inputPhone').val();
    var enabled = $('#inputEnabled').val();
    var isAdmin = $('#inputIsAdmin').val();

    $.ajax({
        url: '/api/users/' + id,
        type: 'PUT',
        data: {
            'username': username,
            'email' : email,
            'name' : name,
            'second_name' : second_name,
            'phone' : phone,
            'enabled' : enabled,
            'isAdmin' : isAdmin
        },
        success: function () {
            $('#alert_success').show();
            window.location.replace('/admin');
        },
        error: function () {
            $('#alert_danger').show();
        },
        complete: function () {
            window.location.replace('/admin');
        }
    });
}

function refreshPage() {
    window.location.replace('/admin');
}

function saveGame() {

    var user_id = $('#user_id').attr('value');
    var time = $('#display-time-place').val();
    var score = $('#display-score-place').val();
    if ($('#board').html() == undefined) {
        var boardArray = $('#empty-board').html()
    } else {
        var boardArray = $('#board').html();
    }

    $.ajax({
        url: '/api/games',
        type: 'POST',
        data: {
            'user_id': user_id,
            'time' : 1,
            'score' : 1,
            'isFinished' : 1,
            'board' : boardArray
        },
        success: function () {
            alert('success');
        },
        error: function () {
            alert('error');
        },
        complete: function () {
            alert('complete');
        }
    });
}

function printScores(top) {
    var count = 0;
    $('#users_score').empty();
    $.getJSON(
        '/api/top_games',
        function (data) {
            $.each(data.games, function (i, game) {
                do {
                    $('#users_score').append('' +
                        '<div class="row">' +
                        '<div class="col-xs-3">' + game.user_id + '</div>' +
                        '<div class="col-xs-3">' + game.score + '</div>' +
                        '<div class="col-xs-3">' + game.time + '</div>' +
                        '<div class="col-xs-1"><button id="ko" class="btn btn-danger" onclick="deleteUser(' + game.score + ');">' + 'Delete' + '</button></div>' +
                        '</div>' +
                        '<hr>');
                    count++;
                } while (count > top)
            });
        }
    );

}