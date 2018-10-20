
$(document).ready(function(){
    //Validasi non session
    $('.add_to_cart').click(function() {
        window.location.href = '../users/login.php';
    });

    $('.add_to_wishlist').click(function() {
        window.location.href = '../users/login.php';
    });

    //Add to Cart
    $(document).on('click', '.add_cart', function(){
        var quantity = $('#hiddenQuantity').val();
        var id       = $(this).attr("id");

        $.ajax({
            url:"../cart/add.php",
            type:"POST",
            data:{id:id, quantity:quantity},
            success:function(data){
                swal({title: "Good job", text: data, icon: "success"}).then(function(){location.reload();});
            }
        });
    });

    //Add to Wishlist
    $(document).on('click', '.add_wishlist', function(){
        var id       = $(this).attr("id");

        $.ajax({
            url:"../wishlist/add.php",
            type:"POST",
            data:{id:id},
            success:function(data){
                swal({title: "Good job", text: data, icon: "success"}).then(function(){location.reload();});
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
    $(document).ready(function(){
        var id = $('#hiddenUser').val();

        $.ajax({
            url:"../home/validasi.php",
            type:"POST",
            data:{id:id},
            success:function(data){
                $('#alertTop').css('display',data);
            }
        });
        if (this.value == 'BNI') {
            $('#alertTop').css('display','block');
        }
    });
});

