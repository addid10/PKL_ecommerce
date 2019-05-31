$(document).ready(function () {
    $(document).on('submit', '#profile-form', function (event) {
        event.preventDefault();
        var name = $('#nama').val();
        var alamat = $('#alamat').val();
        var telepon = $('#telepon').val();
        var kodepos = $('#kodepos').val();
        var foto = $('#foto').val().split('.').pop().toLowerCase();

        if (foto != '') {
            if (jQuery.inArray(foto, ['png', 'jpg', 'jpeg']) == -1) {
                swal({
                    position: 'top-end',
                    type: 'error',
                    width: 400,
                    html: 'Masukkan File yang benar!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }
        }
        if (name !== '' && alamat !== '' && telepon !== '' && kodepos !== '') {
            $.ajax({
                url: "update_profil.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data == 1) {
                        swal({
                            type: 'error',
                            width: 400,
                            title: 'Ukuran foto melebihi batas!'
                        })

                    } else if (data == 2) {
                        swal({
                                type: 'success',
                                width: 400,
                                title: 'Profile berhasil diperbaharui!'
                            })
                            .then(function () {
                                window.location.reload();
                            })
                    } else {
                        swal({
                            type: 'error',
                            width: 400,
                            title: 'Profile gagal diperbaharui!'
                        })
                    }
                }
            })
        } else {
            swal({
                type: 'error',
                width: 400,
                title: 'Lengkapi data anda dengan benar!'
            });
        }

    });
    //Confirm Password
    $('#confirm_password').on('keyup', function () {
        if ($('#password_baru').val() == $('#confirm_password').val()) {
            $('#message').html('Password cocok!').css('color', 'green');
        } else {
            $('#message').html('Password tidak cocok!').css('color', 'red');
        }

    });

    //Ganti Password 
    $('#change-password').submit(function (e) {
        e.preventDefault();
        let oldPass = $('#password_lama').val();
        let newPass = $('#password_baru').val();

        if (oldPass !== '' && newPass !== '') {
            $.ajax({
                url: "change_password_users.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data == 1) {
                        swal({
                                type: 'success',
                                width: 400,
                                title: 'Password berhasil diperbaharui!'
                            })
                            .then(function () {
                                window.location.reload();
                            })
                    } else {
                        $('#change-password')[0].reset();
                        swal({
                            type: 'error',
                            width: 400,
                            title: 'Password Lama salah!'
                        })
                    }
                }

            })
        }
    })

    //Dibatalkan //PHP
    $('.delete-beli').click(function () {
        let id = $(this).attr("id");
        swal({
            title: "Anda yakin ingin membatalkan transaksi?",
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "transaksi_batal.php",
                    type: "POST",
                    data: {
                        id: id
                    }
                });
                Swal(
                        'Telah dibatalkan!',
                        'Data telah ditambahkan ke history.',
                        'success'
                    )
                    .then(function () {
                        window.location.reload();
                    })
            }
        })
    });

    //Upload Bukti
    $('.upload-bukti').click(function () {
        let id = $(this).attr("id");
        $('#upload-bukti').modal('show');
        $('#hidden-id').val(id);
    });

    //Lampirkan Bukti
    $('#upload').submit(function (e) {
        e.preventDefault();
        let foto = $('#foto').val().split('.').pop().toLowerCase();

        if (foto != '') {
            if (jQuery.inArray(foto, ['png', 'jpg', 'jpeg']) == -1) {
                swal({
                    position: 'top-end',
                    type: 'error',
                    width: 400,
                    title: 'Format File salah!<br> File harus berupa PNG, JPG, atau JPEG',
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#foto').val('');
                return false;
            }

            $.ajax({
                url: "transaksi_bayar.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Berhasil!',
                    }).then(function () {
                        location.reload();
                    })
                }
            });
        }
    })

    //Lihat Detail
    $('.detail-beli').click(function () {
        let id = $(this).attr("id");
        $.ajax({
            url: "transaksi_detail.php",
            method: "POST",
            data: {
                id: id
            },
            success: function (data) {
                $('#detailModal').modal('show');
                $('#detailData').html(data);
            }
        });
    });


    //Review
    $('.review').click(function () {
        var id = $(this).attr("id");
        $('#reviewModal').modal('show');
        $('#hiddenReview').val(id);
    });

    $('#reviewForm').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "review.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil!',
                }).then(function () {
                    location.reload();
                })
            }
        });
    });


});