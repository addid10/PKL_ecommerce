<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.scrollUp.min.js"></script>
<script src="../assets/js/price-range.js"></script>
<script src="../assets/js/jquery.prettyPhoto.js"></script>
<script src="../assets/js/jquery.elevatezoom.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/logout.js"></script>
<script src="../assets/js/sweetalert2.all.min.js"></script>
<script>
(function($){
    window.csrf = { csrf_token: '<?= $_SESSION['csrf_token']; ?>' };
    $.ajaxSetup({data:window.csrf});
}(jQuery));

$(document).ready(function () {
    $.ajax({
        url: "../home/validasi.php",
        type: "POST",
        success: function (data) {
            $('#alert-top').css('display', data);
        }
    });
});
</script>