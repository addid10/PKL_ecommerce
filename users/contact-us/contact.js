$(document).ready(function(){
    $(document).on('submit', '#contactForm', function(event){
        event.preventDefault();
        
        var name     = $('#nama').val();
        var email    = $('#email').val();
		var subjek   = $('#subjek').val();
        var pesan    = $('#message').val(); 

        swal({
			title: "Anda yakin akan mengirimkan pesan kepada kami?",
			text: "Pemberitahuan akan secara langsung di kirim ke admin",
			icon: "info",
			buttons: ["Belum", "Kirim"],
			dangerMode: false,
        })
        .then((willDelete) => {
            if (willDelete) {
                if(name !='' && email !='' && subjek !='' && pesan !='')
                {
                    $.ajax({
			        	url:"add.php",
			        	method:'POST',
		            	data:new FormData(this),
		            	contentType:false,
                        processData:false,
                    });
                }
                else
				{
					alert("Both Fields are Required");
				}
				swal("Pesan sudah dikirim!", {
					icon: "success",
				});
            }
        });
    });

    $(document).ready(function(){
        
    });
});