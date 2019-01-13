<?php session_start(); ?>
<?php if(isset($_SESSION['username_member'])):?>
<?php require_once('view-profile.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once('../layout/head.php');?>
</head>
<!--/head-->

<body>
	<header id="header">
		<!--header-->
		<?php require_once('../layout/header.php'); ?>
	</header>
	<!--/header-->
	<div class="space-header"></div>
	<section>
		<div class="container">
			<div class="row">
				<?php require_once('sidemenu.php'); ?>
				<!-- Detail Profile -->
				<div class="col-md-9">
					<div class="left-sidebar">
						<h2 class="title text-center">GANTI PASSWORD</h2>
						<form class="contact-form" enctype="multipart/form-data" id="change-password">
							<div class="panel-group category-products">
								<div class="row panel panel-default">
									<div class="col-sm-12">
										<div class="row">
											<div class="form-group col-md-3">
												<label class="pull-left">Password Lama</label>
											</div>
											<div class="form-group col-md-9">
												<input type="password" id="password_lama" name="password_lama" class="form-control" required="required"
												 placeholder="Isi password lama.." maxlength="30">
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="contact-form">
											<hr>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="contact-form row">
											<div class="form-group col-md-3">
												<label class="pull-left">Password Baru</label>
											</div>
											<div class="form-group col-md-9">
												<input type="password" id="password_baru" name="password_baru" class="form-control" required="required"
												 placeholder="Isi password baru.." minLength="8" maxlength="16">
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="contact-form row">
											<div class="form-group col-md-3">
												<label class="pull-left">Konfirmasi Password</label>
											</div>
											<div class="form-group col-md-9">
												<div id="message"></div>
												<input type="password" id="confirm_password" class="form-control" required="required" placeholder="Konfirmasi password baru.."
												 minLength="8" maxlength="16">
											</div>
										</div>
									</div>
									<div class="form-group col-md-12">
										<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" required>
										<input type="submit" class="btn btn-primary pull-right btn-length" value="Ganti Password">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="space-header"></div>

	<footer id="footer">
		<!--Footer-->
		<?php require_once('../layout/footer.php');?>
	</footer>
	<!--/Footer-->

	<?php require_once('../layout/modal.php'); ?>
	<?php require_once('../layout/javascript.php');?>
	<script src="profile.js"></script>
</body>

</html>
<?php else: ?>
<?php header('location: ../users/login.php'); ?>
<?php endif ?>