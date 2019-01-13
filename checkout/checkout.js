$('#checkout-form').submit(function (e) {
    e.preventDefault();
    let totalBarang = $('#total-barang').val();
    let bank = $('#bank-list').val();

    if (totalBarang !== '' && bank !== '') {
        $.ajax({
            url: "add.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {
                window.location.href = '../profile';
            }
        })
    } else {
        alert("Isi kawan ae.")
    }
});


//List Bank
$('#bank-list').change(function () {
    let id = $(this).val();
    $.ajax({
        url: 'fetch_bank.php',
        type: 'POST',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (data) {
            $('#accountname').text(data.nama);
            $('#rekening').val(data.rekening);
            $('.list-bank').css('display', 'block');
        }
    })
});

//Tambah Biaya Jalan
$('.custom-control-input').change(function () {
    let id = $('.btn-next').attr("id");
    let status = $(this).attr("id");

    if (status == "pengiriman") {
        var antar = 20000;
        let biaya = parseInt($('#total-bayar').val(), 10);
        let total = biaya + antar;
        $('#biaya-pengiriman').val(20000);
        $('#total-bayar').val(total);
        $('#total').val(total);

    } else {
        var antar = 0;
        let antarNew = -20000;
        let biaya = parseInt($('#total-bayar').val(), 10);
        let total = biaya + antarNew;
        $('#biaya-pengiriman').val(0);
        $('#total-bayar').val(total);
        $('#total').val(total);
    }

    $.ajax({
        url: "biaya_kirim.php",
        type: "POST",
        data: {
            antar: antar,
            id: id
        },
        success: function (data) {
            console.log(data)
        }
    });
});

$('.copy-total').click(function () {
    let copyText = $('#total')
    copyText.select();
    document.execCommand("copy");
});
$('.copy-rekening').click(function () {
    let copyText = $('#rekening')
    copyText.select();
    document.execCommand("copy");
});

//Tambah Biaya
$('.btn-next').click(function () {
    let id = $(this).attr("id");

    $.ajax({
        url: "../cart/add_price.php",
        type: "POST",
        data: {
            id: id
        }
    })
});