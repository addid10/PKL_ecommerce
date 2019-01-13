<?php require_once('../layout/token.php'); ?>
<?php if(isset($_SESSION['username_member'])): ?>
<?php header('location: ../home'); ?>
<?php else: ?>
<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi - LainLain</title>
    <?php require_once('../layout/head.php');?>
</head>

<body>
    <header id="header">
        <?php require_once('../layout/header.php'); ?>
    </header>
    <div class="space-header"></div>

    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <h2>Verifikasi Akun</h2>
                    <div class="login-form">
                        <form id="verifiction-form" class="login-form row">
                            <div class="form-group col-md-12">
                                <?php if(isset($_GET['q'])): ?>
                                <div class="alert alert-danger"><strong>
                                        <?= $_GET['q'] ?></strong></div>
                                <?php elseif(isset($_GET['status'])): ?>
                                <div class="alert alert-success"><strong>
                                        <?= $_GET['status'] ?></strong></div>
                                <?php endif ?>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="kode" id="kode" class="form-control" placeholder="Kode Verifikasi"
                                    required pattern="[0-9A-Za-z]+">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" required>
                                <button type="submit" class="btn btn-primary verifikasi">Verifikasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/form-->

    <footer id="footer">
        <!--Footer-->
        <?php require_once('../layout/footer.php');?>
    </footer>
    <!--/Footer-->

    <?php require_once('../layout/javascript.php');?>
    <script src="users.js"></script>
</body>

</html>
<?php endif ?>