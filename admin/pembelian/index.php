<?php require_once('../layout/token.php'); ?>
<?php if (isset($_SESSION['username_admin'])): ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../layout/header.php'); ?>
</head>

<body>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <?php require_once('../layout/navigation.php'); ?>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <?php require_once('../layout/menu.php'); ?>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Tabel Pembelian</h3>
                                                <span>Ini adalah tabel untuk daftar pembelian di mana admin mungkin
                                                    akan mengatur <code data-toggle="tooltip" data-placement="top"
                                                        data-trigger="hover" title="status barang untuk user">status
                                                        barang</code> dan <code data-toggle="tooltip" data-placement="top"
                                                        data-trigger="hover" title="status pembayaran terhadap barang">status
                                                        pembayaran</code> secara manual.</span>
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#infoModal"><i class="icofont icofont-info-square"></i>Info</button>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table" id="pembelian">
                                                        <thead>
                                                            <tr>
                                                                <th>Pembeli</th>
                                                                <th>Tanggal</th>
                                                                <th>Status</th>
                                                                <th>Kiriman</th>
                                                                <th>Total</th>
                                                                <th>Pembayaran</th>
                                                                <th>Update</th>
                                                                <th>Detail</th>
                                                                <th>Bukti</th>
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
<?php require_once('../layout/modal.php'); ?>
<?php require_once('../layout/javascript.php'); ?>
<script src="pembelian.js"></script>
<?php else: ?>
<?php header('location: ../users/login'); ?>
<?php endif; ?>