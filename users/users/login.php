<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<?php require_once('../layout/head.php');?>
</head>

<body>
	<header id="header">
		<?php require_once('../layout/header.php'); ?>
    </header>

    <section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="login-form"><!--login form-->
                        <h2>Login</h2>
						<form id="loginUsers" method="POST" action="login_users.php">
                        <?php 
                        if(isset($_GET['_status'])){
                            $status = $_GET['_status'];
                            echo '<center><h4><i class="fa fa-times"></i> ';
                        }
                        else{
                            $status = '';
                        }  
                        echo $status.'</h4></center>';
                        ?>
							<input id="username" name="username" type="text" placeholder="Username" maxlength="20" required/>
							<input id="password" name="password" type="password" placeholder="Password" maxlength="16" required/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Remember me
							</span>
							<button type="submit" class="btn btn-primary">Login</button>
						</form>
						<br />
                        <h4>Tidak punya akun? <a href="daftar.php">Daftar Sekarang!</a></h4>
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