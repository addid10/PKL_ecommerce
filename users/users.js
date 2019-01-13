$(document).ready(function () {

    //Validasi
    $(document).on('submit', '#login-users', function (e) {
        e.preventDefault();
        let username = $('#username').val();
        let pass = $('#password').val();
        if (username !== '' && pass !== '') {
            $.ajax({
                url: "login_users.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    window.location.href = data;
                }
            });
        } else {
            alert("Isi Kawan ae.");
        }
    });

    //Confirm Password
    $('#confirm-password').on('keyup', function () {
        if ($('#password').val() == $('#confirm-password').val()) {
            $('#message').html('<i class="fa fa-check-circle"></i>').css('color', 'green');
        } else
            $('#message').html('<i class="fa fa-times-circle"></i>').css('color', 'red');
    });

    //Daftar Akun
    $(document).on('submit', '#daftar-users', function (e) {
        e.preventDefault();
        let username = $('#username').val();
        let pass = $('#password').val();
        let email = $('#email').val();
        let acc = $('#checkbox').is(':checked');
        if (username == '' && pass == '' && email == '' && acc == '') {
            alert("Isi Kawan ae.");
        } else {
            $.ajax({
                url: "daftar_users.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    window.location.href = data;
                }
            });
        }
    });
});

$('#username').keyup(function () {
    let minLength = 6;
    let maxLength = 20;
    let username = $('#username').val();

    if (username.length < minLength) {
        $("#status").html("<div class='alert alert-warning'><i class='fa fa-exclamation-circle'></i> Username terlalu pendek</div>");
    } else if (username.length > maxLength) {
        $("#status").text("Terlalu panjang");
    } else {
        if (username != '') {
            $.ajax({
                url: "check_users.php",
                type: "POST",
                data: {
                    username: username
                },
                success: function (data) {
                    $('#status').html(data);
                }
            });
        } else {
            $('#status').html('');
        }
    }
});

$('#verifiction-form').submit(function (e) {
    e.preventDefault();
    let kode = $('#kode').val();
    if (kode !== '') {
        $.ajax({
            url: "verifikasi_users.php",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {
                window.location.href = data;
            }
        });
    } else {
        alert("Isi kawan ae");
    }
});


$('#forgot-password').submit(function (e) {
    e.preventDefault();
    let email = $('#email').val();
    if (email !== '') {
        $.ajax({
            url: "forgot_password_users.php",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {
                window.location.href = data;
            }
        });
    } else {
        alert("Isi kawan ae");
    }
});


$('#recovery-form').submit(function (e) {
    e.preventDefault();
    let password = $('#password').val();
    if (password !== '') {
        $.ajax({
            url: "recovery_users.php",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {
                window.location.href = data;
            }
        });
    } else {
        alert("Isi kawan ae");
    }
});