$('.delete-wishlist').click(function () {
    let id = $(this).attr("id");

    $.ajax({
        url: "delete.php",
        type: "POST",
        data: {
            id: id
        },
        success: function () {
            window.location.reload();
        }
    })
});


$('.add-cart').click(function () {
    let id = $(this).attr("id");

    $.ajax({
        url: "../cart/add.php",
        type: "POST",
        data: {
            id: id
        },
        success: function (data) {
            if (data == 1) {
                swal({
                    type: 'success',
                    title: 'Telah ditambahkan ke dalam Cart!'
                }).then(function () {
                    window.location.reload();
                });
            } else if (data == 0) {
                swal({
                    type: 'error',
                    title: 'Sudah pernah ditambahkan ke Cart!'
                });
            }
        }
    });
});