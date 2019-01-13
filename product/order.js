//Add to Cart
$('.btn-cart-on').click(function () {
    let id = $(this).attr("id");
    let quantity = $('#quantity').val();
    $.ajax({
        url: "../cart/add.php",
        type: "POST",
        data: {
            id: id,
            quantity: quantity
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

//Beli Sekarang say
$('.btn-order-on').click(function () {
    alert("Woe");
    let id = $(this).attr("id");
    let quantity = $('#quantity').val();

    $.ajax({
        url: "../cart/add.php",
        type: "POST",
        data: {
            id: id,
            quantity: quantity
        },
        success: function (data) {
            if (data == 0) {
                window.location.href = '../checkout';
            } else {
                window.location.href = '../checkout';
            }
        }
    })
});

$(document).on('click', '.order-now.yes', function () {
    var quantity = $('#quantity').val();
    var id = $(this).attr("id");

    $.ajax({
        url: "../cart/add.php",
        type: "POST",
        data: {
            id: id,
            quantity: quantity
        },
        success: function (data) {
            swal({
                title: "Terimakasih",
                text: "Segera lakukan pembayaran",
                icon: "success"
            }).then(function () {
                window.location = "../checkout";
            });
        }
    });
});

$('.btn-order-off').click(function () {
    window.location = "../users/login.php";
});

$('.btn-cart-off').click(function () {
    window.location = "../users/login.php";
})