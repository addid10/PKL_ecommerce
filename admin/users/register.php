<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../layout/heading.php'); ?>
</head>

<body class="fix-menu">
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" method="POST" action="register_users.php">
                            <div class="text-center">
                                <img src="../../assets/images/logo.png" alt="logo.png">
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <div class="label-main">
                                            <?php 
                                                if(isset($_GET['__status'])){
                                                        $status = $_GET['__status'];
                                                        echo '<label class="label label-danger">';
                                                        }
                                                    else{
                                                        $status = "";
                                                        }
                                                    
                                                    echo "$status</label>";     
                                            ?>
                                         </div>
                                        <h3 class="text-center txt-primary">Sign up.</h3>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input name="__username" type="text" class="form-control" placeholder="Choose Username" maxlength="10" required>
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input name="__email" type="text" class="form-control" placeholder="Your Email Address" maxlength="20" required>
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input name="__password" type="password" class="form-control" placeholder="Choose Password" maxlength="16" required>
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">I read and accept <a href="#">Terms &amp; Conditions.</a></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now.</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                                        <p class="text-inverse text-left"><b>Your Authentication Team</b></p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="../../assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
<?php require('../layout/javascript.php'); ?>
</body>

</html>
