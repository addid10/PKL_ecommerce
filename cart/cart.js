$('.delete-cart').click(function () {
    let id = $(this).attr("id");

    if (id !== '') {
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
                id: id
            },
            success: function (data) {
                window.location.reload();
            }
        })
    }
});

function format_harga(harga) {
    let parts = harga.toString().split(",");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
}

function total_harga(id) {
    $.ajax({
        url: "total_price.php",
        type: "POST",
        data: {
            id: id
        },
        dataType: "json",
        success: function (result) {
            let price = format_harga(result);
            $('#total-' + id).text('Rp. ' + price);
        }
    });
};

$('.kuantitas').change(function () {
    let id = $(this).attr("id");
    let quantity = $(this).val();

    if (quantity !== '' && id !== '') {
        $.ajax({
            url: "update.php",
            type: "POST",
            data: {
                quantity: quantity,
                id: id
            },
            success: function () {
                total_harga(id)
            }
        })
    }
});

$('.btn-random').click(function () {
    let id = $(this).attr("id");

    $.ajax({
        url: "add_price.php",
        type: "POST",
        data: {
            id: id
        },
        success: function () {
            window.location.href = '../checkout';
        }
    })
})