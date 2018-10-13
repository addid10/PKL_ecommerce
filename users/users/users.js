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
          $('#message').html('<i class="fa fa-check-circle"></i>').css('color','green');
        } else 
          $('#message').html('<i class="fa fa-times-circle"></i>').css('color','red');
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

$('#username').keyup(function(){
    var minLength = 6;
    var maxLength = 20;
    var username = $('#username').val();
    $('#status').html('<img width="40px" src="../assets/images/loading.gif">');

    if (username.length < minLength){
        $("#status").html("<div class='alert alert-warning'><i class='fa fa-exclamation-circle'></i> Username terlalu pendek</div>");
    }
    else if (username.length > maxLength){
        $("#status").text("Terlalu panjang");
    }
    else {
        if(username !=''){
            $.post('check_users.php', {username:username},
    
            function(data){
                $('#status').html(data);
            });
        }
        else{
            $('#status').html('');
        }
    }

    
    

    
});


