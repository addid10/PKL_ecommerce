$(document).on('submit', '#form-login', function (e) {
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