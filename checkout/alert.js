$(document).ready(function () {
    swal({
        type: 'info',
        title: 'Lengkapi Profile Anda!',
        confirmButtonColor: '#FE980F',
    }).then(function () {
        window.location.href = '../profile/akun';
    })
})