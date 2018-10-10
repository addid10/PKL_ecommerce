<?php session_start(); ?>
<?php if(isset($_SESSION['_username'])):?>
<?php require_once('view-profile.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('../layout/head.php');?>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<?php require_once('../layout/header.php'); ?>
	</header><!--/header-->
	<div class="space-header"></div>
	<section>
        <div class="container">
		    <?php require_once('sidemenu.php'); ?>
			<!-- Detail Profile -->
			<div class="col-md-9">
				<div class="left-sidebar">
					<form method="POST" class="contact-form row" enctype="multipart/form-data" action="change_password_users.php">
						<h2 class="title text-center">GANTI PASSWORD</h2>
						<?php
						if(isset($_GET['status'])){
                            $status = $_GET['status'];
                            echo '<div class="alert alert-success">
                                        <strong>'.$status.'</strong>
                                  </div>';
						}
						?>
						<div class="col-md-12 panel-group category-products">
							<div class="panel panel-default">
								<div class="col-sm-12">
									<div class="contact-form">
										<div class="form-group col-md-3">
											<label class="pull-left">Password Lama</label>
										</div>
										<div class="form-group col-md-9">
											<input type="password" id="password_lama" name="password_lama" class="form-control" required="required" placeholder="Isi password lama.." maxlength="30">
                                        </div>
									</div>
                                </div>
								<div class="col-sm-12">
									<div class="contact-form">
                                        <hr>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="contact-form">
										<div class="form-group col-md-3">
											<label class="pull-left">Password Baru</label>
										</div>
										<div class="form-group col-md-9">
											<input type="password" id="password_baru" name="password_baru" class="form-control" required="required" placeholder="Isi password baru.." minLength="8" maxlength="16">
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="contact-form">
										<div class="form-group col-md-3">
											<label class="pull-left">Konfirmasi Password Baru</label>
										</div>
										<div class="form-group col-md-9">
                                            <div id="message"></div>
											<input type="password" id="confirm_password" class="form-control" required="required" placeholder="Konfirmasi password baru.." minLength="8" maxlength="16">
										</div>
									</div>
								</div>                  
								<div class="form-group col-md-12">
									<input type="submit" class="btn btn-primary pull-right btn-length" value="Ganti Password"> 
								</div>
							</div>
						</div>
					</form>
				</div>	
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<?php require_once('../layout/footer.php');?>	
	</footer><!--/Footer-->
	
<?php require_once('../layout/modal.php'); ?>
<?php require_once('../layout/javascript.php');?>
<script src="profile.js"></script>
<?php require_once('../layout/cs_javascript.php');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
<?php else: ?>
<?php header('location: ../users/login.php'); ?>
<?php endif ?>