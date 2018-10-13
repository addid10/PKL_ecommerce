<?php session_start(); ?>
<?php if(isset($_SESSION['_username'])):?>
<?php require_once('../profile/view-profile.php'); ?>
<?php
require_once('../database/db.php');
if(isset($_SESSION['_username'])){

    $username  = $_SESSION['_username'];

    $statement = $connection->prepare(
        "SELECT * FROM wishlist 
		JOIN barang USING(id_barang) 
		JOIN users ON id=id_users 
		WHERE username=:_userName"
    );

    $statement->bindParam("_userName", $username);
    $statement->execute();
    $row = $statement->fetchAll(PDO::FETCH_OBJ);
}
?>
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
			<?php require_once('../profile/sidemenu.php'); ?>
			<!-- Detail Profile -->
			<div class="col-md-9">
				<div class="left-sidebar">
                    <h2 class="title text-center">CART</h2>
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