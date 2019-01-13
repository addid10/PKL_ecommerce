<?php require_once('../layout/token.php'); ?>
<?php if(isset($_SESSION['username_member'])): ?>
<?php header('location: ../home'); ?>
<?php else: ?>
<!DOCTYPE html>
<html>

<head>
    <?php require_once('../layout/head.php');?>
</head>

<body>
    <header id="header">
        <?php require_once('../layout/header.php'); ?>
    </header>
    <div class="space-header"></div>
    <section id="form">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <div class="login-form">
                        <form method="POST" id="forgot-password">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <h2>Forgot Password</h2>
                                </div>
                                <div class="col-md-12">
                                    <?php if(isset($_GET['status'])): ?>
                                    <div class="alert alert-info"><strong>
                                        <?= $_GET['status'] ?></strong></div>
                                    <?php endif ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email anda"
                                        maxlength="30" required>
                                </div>
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" required>
                                <div class="form-group col-md-5">
                                    <button type="submit" class="btn btn-primary verifikasi">Submit</button>
                                </div>
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