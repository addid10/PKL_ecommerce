<?php session_start(); ?>
<?php if(isset($_SESSION['_username'])): ?>
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

    <section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="login-form"><!--login form-->
                        <div class="form-group col-md-12"><h2>Daftar Akun</h2></div>
						<form id="daftarUsers" class="login-form row" method="POST" action="daftar_users.php">
                            <div class="form-group col-md-8">
				                <input type="text" id="username" name="username" class="form-control" placeholder="Username" maxlength="20" required>
                            </div>
                            <div class="from-group col-md-4">
                                <div id="status"></div>
                            </div>
                            <div class="form-group col-md-10">
				                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" maxlength="30" required>
                            </div>
				            <div class="form-group col-md-5">
				                <input type="password" id="password" name="password" class="form-control" placeholder="Password" minlength="8" maxlength="16" required>
                            </div>
				            <div class="form-group col-md-5">
				                <input type="password" id="password-2" name="password-2" class="form-control" placeholder="Confirm Password" minlength="8" maxlength="16" required>
				            </div>
				            <div class="form-group col-md-2">
                                <div class="message-daftar"><span id='message'></span></div>
				            </div>
                            <div class="form-group col-md-12">  
                                <span><input id="checkbox" type="checkbox" class="checkbox" required>Setuju dengan peraturan & persyaratan kami. </span>
                            </div>
                            <div class="form-group col-md-10">  
                                <button type="submit" class="btn btn-primary pull-right">Daftar Sekarang</button>
                            </div>
                        </form>
                        <h5>Sudah punya akun? <a href="login.php">Masuk Sekarang!</a></h5>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
    
    <footer id="footer"><!--Footer-->
		<?php require_once('../layout/footer.php');?>	
	</footer><!--/Footer-->
<?php require_once('../layout/javascript.php');?>
<script src="users.js"></script>
<?php require_once('../layout/cs_javascript.php');?>
</body>
</html>
<?php endif ?>