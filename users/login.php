
<?php require_once('../layout/token.php'); ?>
<?php if(isset($_SESSION['username_member'])): ?>
<?php header('location: ../home'); ?>
<?php else: ?>
<!DOCTYPE html>
<html>

<head>
	<title>Login - LainLain</title>
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
				<div class="col-sm-5 mx-auto">

					<h2 class="mb-4">Login</h2>
					<div class="login-form">
						<form id="login-users">
							<?php 
                        if(isset($_GET['status'])){
							$status = $_GET['status'];
                            echo '<div class="alert alert-danger">
                                        <strong>'.$status.'</strong>
                                  </div>';
						}
						else if(isset($_GET['s'])){
                            $status = $_GET['s'];
                            echo '<div class="alert alert-success">
                                        <strong>'.$status.'</strong>
                                  </div>';
						}
                        ?>
							<div class="form-group">
								<input type="text" class="form-control" name="username" id="username" placeholder="Username" maxlength="20" required
								value="<?php if(isset($_COOKIE['user_login'])){ echo $_COOKIE['user_login'];} ?>" pattern="[0-9A-Za-z]+">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" id="password" placeholder="Password" maxlength="16" required
								value="<?php if(isset($_COOKIE['user_pwd'])){ echo $_COOKIE['user_pwd'];} ?>">
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="rememberme" name="remember" value="1"
								<?php if(isset($_COOKIE['user_login'])){ echo "checked" ; } ?>>
								<label class="custom-control-label" for="rememberme">Remember Me</label>
							</div>
                        	<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" required>
							<h5 class="text-right"><a href="forgot_password">Lupa Password?</a></h5>
							<button type="submit" class="btn btn-primary">Login</button>
						</form>
						<br />
						<h5>Tidak punya akun? <a href="daftar">Daftar Sekarang!</a></h5>
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