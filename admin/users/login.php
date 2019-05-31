<?php require_once('../layout/token.php'); ?>
<?php if (isset($_SESSION['username_admin'])): ?>
<?php header('location: ../home');?>
<?php else: ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("../layout/header.php");?>
</head>

<body class="fix-menu">
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" method="POST" id="form-login">
                            <div class="text-center">
                                <img src="../../assets/images/lain.png" width="30%">
                            </div> 
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <div class="label-main">
                                            <?php 
                                                if(isset($_GET['status'])){
                                                    $status = $_GET['status'];
                                                    echo '<label class="label label-danger">';
                                                }   
                                            ?>
                                         </div>
                                        <h3 class="text-left txt-primary">Login</h3>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input name="username" id="username" type="text" class="form-control" placeholder="Username" maxlength="20" required
                                    value="<?php if(isset($_COOKIE['admin_login'])){ echo $_COOKIE['admin_login'];} ?>" pattern="[0-9A-Za-z]+">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input name="password" id="password" type="password" class="form-control" placeholder="Password" maxlength="16" required
                                    value="<?php if(isset($_COOKIE['admin_pwd'])){ echo $_COOKIE['admin_pwd'];} ?>">
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="1" name="rememberme" 
                                                <?php if(isset($_COOKIE['user_login'])){ echo "checked" ; } ?>>
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" required>
                                        <button type="submit" name="login" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php require('../layout/javascript.php'); ?>
<script src="users.js"></script>
</body>

</html>
<?php endif ?>