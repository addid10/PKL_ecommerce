$(document).ready(function () {
    $(document).on('submit', '#contact-form', function (event) {
        event.preventDefault();
        var name = $('#nama').val();
        var email = $('#email').val();
        var subjek = $('#subjek').val();
        var pesan = $('#message').val();

        if (name != '' && email != '' && subjek != '' && pesan != '') {
            $.ajax({
                url: "add.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    $('#contact-form')[0].reset();
                    swal({
                        type: 'success',
                        title: 'Telah dikirimkan ke Admin!'
                    });
                }
            });
        } else {
            alert("Both Fields are Required");
        }
    });
});