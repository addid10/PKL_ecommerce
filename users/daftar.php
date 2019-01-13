<?php require_once('../layout/token.php'); ?>
<?php if(isset($_SESSION['username_member'])): ?>
<?php header('location: ../home'); ?>
<?php else: ?>
<!DOCTYPE html>
<html>

<head>
	<title>Registrasi - LainLain</title>
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
				<div class="col-sm-7 mx-auto">
					<h2>Daftar Akun</h2>
					<div class="login-form">
						<!--login form-->
						<form id="daftar-users" class="row">
							<?php if(isset($_GET['status'])): ?>
							<div class="from-group col-md-10">
								<div class="alert alert-danger">
									<strong><?= $_GET['status'] ?></strong>
								</div>
							</div>
							<?php endif ?>

							<div class="from-group col-md-10">
								<div id="status"></div>
							</div>
							<div class="form-group col-md-10">
								<input type="text" id="username" name="username" class="form-control" placeholder="Username" maxlength="20"
								 required pattern="[0-9A-Za-z]+">
							</div>
							<div class="form-group col-md-10">
								<input type="email" id="email" name="email" class="form-control" placeholder="E-mail" maxlength="50" required>
							</div>
							<div class="form-group col-md-5">
								<input type="password" id="password" name="password" class="form-control" placeholder="Password" minlength="8"
								 maxlength="16" required>
							</div>
							<div class="form-group col-md-5">
								<input type="password" id="confirm-password" class="form-control" placeholder="Confirm Password"
								 minlength="8" maxlength="16" required>
							</div>
							<div class="form-group col-md-2">
								<div class="message-daftar"><span id='message'></span></div>
							</div>
							<div class="form-group col-md-12">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="checkbox" name="checkbox" value="1" required>
									<label class="custom-control-label" for="checkbox">Setuju dengan peraturan & persyaratan</label>
								</div>
							</div>
                        	<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" required>
							<div class="form-group col-md-10">
								<button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
							</div>
						</form>
						<h6>Sudah punya akun? <a href="login">Masuk Sekarang!</a></h6>
					</div>
					<!--/login form-->
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