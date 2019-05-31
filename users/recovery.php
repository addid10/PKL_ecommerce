<?php require_once('../layout/token.php'); ?>
<?php if(isset($_SESSION['username_member']) && !isset($_GET['q']) && isset($_GET['token'])): ?>
<?php header('location: ../home'); ?>
<?php else: ?>
<!DOCTYPE html>
<html>

<head>
    <title>Recovery Password - LainLain</title>
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
                <div class="col-sm-6 mx-auto">
                    <div class="login-form">
                        <form id="recovery-form" class="row">
                            <div class="form-group col-md-12">
                                <div class="col-md-12">
                                    <h2>Recovery Password</h2>
                                </div>
                                <?php require_once('recovery.token.php'); ?>
                                <div class="form-group col-md-10">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Password Baru" minlength="8" maxlength="16" required>
                                </div>
                                <div class="col-md-2">
                                    <span id='message'></span>
                                </div>
                                <div class="form-group col-md-10">
                                    <input type="password" id="confirm-password" class="form-control" placeholder="Confirm Password"
                                        minlength="8" maxlength="16" required>
                                </div>
                                <div class="form-group col-md-11">
                        	        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" required>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <?php require_once('../layout/footer.php');?>
    </footer>

    <?php require_once('../layout/javascript.php');?>
    <script src="users.js"></script>
</body>

</html>
<?php endif ?>