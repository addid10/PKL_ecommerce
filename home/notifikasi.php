<?php session_start(); ?>
<?php if (isset($_SESSION['__username'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('layout/header.php'); ?>
</head>
  <body>
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
           <nav class="navbar header-navbar pcoded-header">
               <?php require_once('layout/navigation.php'); ?>
           </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <?php require_once('layout/menu.php'); ?>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3><i class="ti-bell"></i> Notifikasi</h3>
                                                <span>Daftar notifikasi hasil dari proses pembelian.</span>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table" id="tabelNotifikasi">
                                                        <thead>
                                                            <tr>
                                                                <th>Dari</th>
                                                                <th>Foto</th>
                                                                <th>Waktu</th>
                                                                <th>Tentang</th>
                                                                <th width="15%">Telah dibaca</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php require_once('layout/modal.php'); ?>
<?php require_once('layout/javascript.php'); ?>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="table_notifikasi/notifikasi.js"></script>
<?php require_once('layout/custom_javascript.php'); ?>
<?php else: ?>
<?php header('location: ../users/login/login.php'); ?>
<?php endif; ?>