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
                                                <h3><i class="ti-comment"></i> Review</h3>
                                                <span>Barang, kecepatan, respon, dan lainnya akan dinilai oleh pembeli.</span>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table" id="tabelReview">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Dari</th>
                                                                <th>Tanggal</th>
                                                                <th width="30%">Rating</th>
                                                                <th width="40%">Detail Review</th>
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
<script type="text/javascript" src="table_review/review.js"></script>
<?php require_once('layout/custom_javascript.php'); ?>
<?php else: ?>
<?php header('location: ../users/login/login.php'); ?>
<?php endif; ?>