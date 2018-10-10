$(document).ready(function(){
    $(document).on('submit', '#profileForm', function(event){
        event.preventDefault();
        
        var name     = $('#nama').val();
        var foto     = $('#file-upload').val();
		var alamat   = $('#alamat').val();
		var telepon   = $('#telepon').val();

        swal({
			title: "Yakin ingin mengubah profil ini?",
			text: "Profile akan diperbaharui otomatis",
			icon: "info",
			buttons: ["Batal", "Yakin"],
            confirmButtonColor: '#8CD4F5'
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
                    });
                }
                else
				{
                    alert("Lengkapi data anda dengan benar!");
				}
				
            }
        });
    });

    $(document).ready(function(){
        
    });
});