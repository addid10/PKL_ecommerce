<script type="text/javascript" src="../assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js"></script>			
<script type="text/javascript" src="../assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>	

<script>
(function($){
    window.csrf = { csrf_token: '<?= $_SESSION['csrf_token']; ?>' };
    $.ajaxSetup({data:window.csrf});
}(jQuery));
</script>

<script type="text/javascript" src="../assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<script type="text/javascript" src="../assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="../assets/pages/widget/amchart/amcharts.min.js"></script>
<script type="text/javascript" src="../assets/pages/widget/amchart/serial.min.js"></script>
<script type="text/javascript" src="../assets/js/chart.js/Chart.js"></script>
<script type="text/javascript" src="../assets/pages/todo/todo.js "></script>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script type="text/javascript" src="../assets/js/SmoothScroll.js"></script>
<script type="text/javascript" src="../assets/js/pcoded.min.js"></script>
<script type="text/javascript" src="../assets/js/vartical-demo.js"></script>
<script type="text/javascript" src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="../assets/js/sweetalert2.all.min.js"></script>