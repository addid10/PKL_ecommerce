//Perbaharui lagi nanti!
$(document).ready(function(){
    $(document).on('submit', '#profileForm', function(event){
        event.preventDefault();
        
        var name     = $('#nama').val();
        var foto     = $('#foto').val().split('.').pop().toLowerCase();
		var alamat   = $('#alamat').val();
		var telepon  = $('#telepon').val();

        swal({
			title: "Yakin ingin mengubah profil ini?",
			text: "Profile akan diperbaharui otomatis",
			icon: "info",
			buttons: ["Batal", "Yakin"]
        })
        .then((willDelete) => {
            if (willDelete) {
                if(foto != '')
                {
                    if(jQuery.inArray(foto, ['png','jpg','jpeg']) == -1)
                    {
                        alert("Invalid Image File");
                        $('#foto').val('');
                        return false;
                    }
                }
                if(name !='' && alamat !='' && telepon !='')
                {
                    swal("Data telah diubah!", {
                        icon: "success",
                    });

                    $.ajax({
			        	url:"update-profile.php",
			        	method:'POST',
		            	data:new FormData(this),
		            	contentType:false,
                        processData:false,
                        success:function(data){
                            window.location.reload();
                        }
                    });
                }
                else
				{
                    alert("Lengkapi data anda dengan benar!");
				}
				
            }
        });
    });
    //Confirm Password
    $('#confirm_password').on('keyup', function () {
        if ($('#password_baru').val() == $('#confirm_password').val()) {
            $('#message').html('Password cocok!').css('color', 'green');
        } 
        else {
            $('#message').html('Password tidak cocok!').css('color', 'red');
        }
          
    });
    $(document).ready(function(){
        
    });
});

function alertDelete(){
    swal({title: "Good job", text: "You clicked the button!", type: "success"},
        function(){ 
            location.reload();
        }
    );
}

//Dibatalkan //PHP
$('.delete_beli').click(function(){
    var id = $(this).attr("id");
    swal({
        title: "Anda yakin ingin membatalkan transaksi?",
        icon: "error",
        buttons: ["Belum", "Yakin"],
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "transBatal.php",
                type: "POST",
                data: {id:id}
            });
            swal("Transaksi dibatalkan!", {
                icon: "success",
            })
            .then(function(){
                location.reload();
            })
        }
        
    });

});


$('.uplod_bukti').click(function(){
    var id = $(this).attr("id");
    $('#uploadBukti').modal('show');
    $('#hiddenID').val(id);
});


//Update
$('#addForm').submit(function(event){
    event.preventDefault();
    var extension = $('#foto').val().split('.').pop().toLowerCase();
    if(extension != '')
    {
        if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
        {
            alert("Invalid Image File");
            $('#foto').val('');
            return false;
        }
        $.ajax({
            url:"transBayar.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(){
                swal("Telah dilampirkan!", {
                    icon: "success",
                })
                .then(function(){
                    location.reload();
                })
            }
        });
    }	
})
    
$('.detail_beli').click(function(){
    var id = $(this).attr("id");
    $.ajax({
        url:"transDetail.php",
        method:"POST",
        data:{
            id:id
        },
        success:function(data){
            $('#detailModal').modal('show');
            $('#detailData').html(data);
        }
    });
});


//Review
$('.review').click(function(){
    var id      = $(this).attr("id");
    $('#reviewModal').modal('show');
    $('#hiddenReview').val(id);
});

$('#reviewForm').submit(function(event){
    event.preventDefault();
    
    $.ajax({
        url:"review.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(){
            swal("Berhasil!", {
                icon: "success",
            })
            .then(function(){
                location.reload();
            })
        }
    });
});

