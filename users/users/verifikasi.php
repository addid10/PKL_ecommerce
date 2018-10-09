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
    <div class="space-header"></div>

    <section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="login-form"><!--login form-->
						<form  method="POST" class="login-form row" action="verifikasi_users.php">
                        
				        <div class="form-group col-md-12">
                            <div class="form-group col-md-12"><h2>Verifikasi Akun</h2></div>
                        </div>
				        <div class="form-group col-md-12">
                        <?php 
                        if(isset($_GET['_kode'])){
                            $kode = $_GET['_kode'];
                            echo '<div class="alert alert-danger">
                                        <strong>'.$kode.'</strong>.
                                  </div>';
                        }
                        else{
                            $status = '';
                        }
                        ?>
                            <div class="form-group col-md-7">
                                <input type="text" name="kode" class="form-control" placeholder="Kode Verifikasi" maxlength="6" required>
                            </div>
                            <div class="form-group col-md-5">
                                <button type="submit" class="btn btn-primary verifikasi">Verifikasi</button>
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