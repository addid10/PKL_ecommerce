$(document).ready(function () {
    //Validasi non session
    $('.add_to_cart').click(function () {
        window.location.href = '../users/login.php';
    });

    $('.add_to_wishlist').click(function () {
        window.location.href = '../users/login.php';
    });

    //Add to Cart
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

    //Add to Wishlist
    $('.add-wishlist').click(function () {
        let id = $(this).attr("id");
        $.ajax({
            url: "../wishlist/add.php",
            type: "POST",
            data: {
                id: id
            },
            success: function (data) {
                if (data == 1) {
                    swal({
                        type: 'success',
                        title: 'Telah ditambahkan ke Wishlist'
                    });
                } else if (data == 0) {
                    swal({
                        type: 'error',
                        title: 'Sudah pernah ditambahkan ke Wishlist'
                    });
                }
            }
        });
    });


    //Lazy Load
    /*     var flag = 0;
        $.ajax({
            type:"POST",
            url: "function.php",
            data: {
                'offset':0,
                'limit':9
            },
            success: function(data){
                $('#tampilData').append(data);
                flag += 9;
            }
        });

        $(window).scroll(function(){
            if($(window).scrollTop() >= $(document).height() - $(window).height() - 25){
                $.ajax({
                    type: "POST",
                    url: "function.php",
                    data: {
                        'offset' : flag,
                        'limit'  : 9
                    },
                    success: function(data){
                        $('#tampilData').append(data);
                        flag += 9;
                    }
                });
            };
        }); */
});