$(document).on('click', '.checkout', function(){
    var total_harga  = $('#hidden_total_harga').val();
    var total_barang = $('#hidden_total_barang').val();
    var status_kirim = $('input[name=statusKirim]:checked').val();
    var bank         = $("#bankList option:selected").val();
    var id           = $(this).attr("id");

    $.ajax({
        url:"../checkout/add.php",
        type:"POST",
        data:{id:id, bank:bank, status_kirim:status_kirim, total_barang:total_barang, total_harga:total_harga},
        success:function(data){
            swal({title: data, text: "Klik OK untuk ke halaman selanjutnya!", icon: "success"}).then(function(){location.reload();});
        }
    });
});

$('#bankList').change(function() {
    if (this.value == 'BNI') {
        $('#BNI').css('display','block');
        $('#BRI').css('display','none');
        $('#mandiri').css('display','none');
        $('#BTN').css('display','none');
        $('#BCA').css('display','none');
    }
    else if (this.value == 'BRI') {
        $('#BNI').css('display','none');
        $('#BRI').css('display','block');
        $('#mandiri').css('display','none');
        $('#BTN').css('display','none');
        $('#BCA').css('display','none');
    }
    else if (this.value == 'Mandiri') {
        $('#BNI').css('display','none');
        $('#BRI').css('display','none');
        $('#mandiri').css('display','block');
        $('#BTN').css('display','none');
        $('#BCA').css('display','none');
    }
    else if (this.value == 'BTN') {
        $('#BNI').css('display','none');
        $('#BRI').css('display','none');
        $('#mandiri').css('display','none');
        $('#BTN').css('display','block');
        $('#BCA').css('display','none');
    }
    else if (this.value == 'BCA') {
        $('#BNI').css('display','none');
        $('#BRI').css('display','none');
        $('#mandiri').css('display','none');
        $('#BTN').css('display','none');
        $('#BCA').css('display','block');
    }
    else {
        $('.list-bank').css('display','none !important');
    }
});

document.getElementById("copy_mandiri").onclick = function(){
    var copyText = document.getElementById("rekening_mandiri");
    copyText.select();
    document.execCommand("copy");
}

document.getElementById("copy_bni").onclick = function(){
    var copyText = document.getElementById("rekening_bni");
    copyText.select();
    document.execCommand("copy");
}
document.getElementById("copy_bri").onclick = function(){
    var copyText = document.getElementById("rekening_bri");
    copyText.select();
    document.execCommand("copy");
}
document.getElementById("copy_btn").onclick = function(){
    var copyText = document.getElementById("rekening_btn");
    copyText.select();
    document.execCommand("copy");
}
document.getElementById("copy_bca").onclick = function(){
    var copyText = document.getElementById("rekening_bca");
    copyText.select();
    document.execCommand("copy");
}

document.getElementById("copys").onclick = function(){
    var copyText = document.getElementById("totalbayar");
    copyText.select();
    document.execCommand("copy");
}