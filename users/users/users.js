$(document).ready(function(){

    //Validasi
    $(document).on('submit', '#loginUsers', function(){
        var username     = $('#username').val();
        var pass         = $('#password').val();
        if(username =='' && pass =='')
        {
       /*   $.ajax({
                url:"login_users.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
				{
                    $('#loginUsers')[0].reset();
                }
            });
        }
        else
		{
        */
			alert("Isi Kawan ae.");
		}
    });

    //Confirm Password
    $('#password-2').on('keyup', function () {
        if ($('#password').val() == $('#password-2').val()) {
          $('#message').html('Matching').css('color', 'green');
        } else 
          $('#message').html('Not Matching').css('color', 'red');
      });

    //Daftar Akun
    $(document).on('submit', '#daftarUsers', function(){
        var username     = $('#username').val();
        var pass         = $('#password').val();
        var email        = $('#email').val();
        var acc          = $('#checkbox').val();
        if(username =='' && pass =='' && email =='' && acc ==''){
			alert("Isi Kawan ae.");
		}
    });
});