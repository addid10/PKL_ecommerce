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