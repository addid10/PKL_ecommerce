$(document).on('click', '.order-now', function(){
    var quantity = $('#hiddenQuantity').val();
    var id       = $(this).attr("id");

    $.ajax({
        url:"../cart/add.php",
        type:"POST",
        data:{id:id, quantity:quantity},
        success:function(data){
            swal({title: "Terimakasih", text: "Segera lakukan pembayaran", icon: "success"}).then(function(){window.location = "../checkout";});
        }
    });
});