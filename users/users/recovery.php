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
						<form  method="POST" class="login-form row" action="recovery_users.php">
                        
				        <div class="form-group col-md-12">
                            <div class="form-group col-md-12"><h2>Recovery Password</h2></div>
                        </div>
				        <div class="form-group col-md-12">
                        <?php 
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            require_once('../database/db.php');
                            $recovery = $connection->prepare(
                                "SELECT * FROM users WHERE random_token=:_id"
                            );
                            $recovery->bindParam("_id", $id);
                            $recovery->execute();
                            $row = $recovery->fetch();
                            $idBaru = $row['id'];
                            $rtoken = $row['random_token'];
                            if($rtoken == $id){
                                echo '<input type="hidden" name="id" value="'.$idBaru.'" >';
                            }
                        }
                        else if(isset($_GET['_status']))
                        {
                            $status = $_GET['_status'];
                            echo '<div class="alert alert-danger">
                                        <strong>'.$status.'</strong>
                                  </div>';
                        }
                        ?>
                            <div class="form-group col-md-7">
                                 <input type="password" id="password" name="password" class="form-control" placeholder="Password Baru" minlength="8" maxlength="16" required>
                            </div>
                            <div class="form-group col-md-7">
                                <span id='message'></span>
                                <input type="password" id="password-2" class="form-control" placeholder="Confirm Password" minlength="8" maxlength="16" required>
                            </div>
                            <div class="form-group col-md-7">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="users.js"></script>
<?php require_once('../layout/cs_javascript.php');?>
</body>
</html>