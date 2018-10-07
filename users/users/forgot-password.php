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
						<form  method="POST" class="login-form row" action="fp_users.php">
                        
				        <div class="form-group col-md-12">
                            <div class="form-group col-md-12"><h2>Forgot Password</h2></div>
                        </div>
				        <div class="form-group col-md-12">
                        <?php 
                        if(isset($_GET['_status'])){
                            $status = $_GET['_status'];
                            echo $status;
                        }
                        ?>
                            <div class="form-group col-md-7">
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email anda" maxlength="30" required>
                            </div>
                            <div class="form-group col-md-5">
                                <button type="submit" class="btn btn-primary verifikasi">Submit</button>
                            </div>
                        </div>
                        </form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
    
    <footer id="footer"><!--Footer-->
		<?php require_once('../layout/footer.php');?>	
	</footer><!--/Footer-->
	

  
<?php require_once('../layout/javascript.php');?>
<?php require_once('../layout/cs_javascript.php');?>
</body>
</html>