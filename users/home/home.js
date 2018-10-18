$(document).on('submit', '#wishlist', function(){
    var id     = $('#add-id').val();
    console.log('#add-wishlist');

    if(id ==''){
        alert("APA LU HAPUS-HAPUS!?!");
    }
});

$('#add_cart').click(function() {
    window.location.href = '../users/login.php';
});

$('#add_wishlist').click(function() {
    window.location.href = '../users/login.php';
});

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

$(document).on('click', '.add_wishlist', function(){
    var id       = $(this).attr("id");

    $.ajax({
        url:"../wishlist/add.php",
        type:"POST",
        data:{id:id},
        success:function(data){
            swal({title: "Good job", text: data, icon: "success"});
        }
    });
});
   
   