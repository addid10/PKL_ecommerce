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
					<h2 class="title text-center">WISHLIST</h2>
						<div class="features_items"><!--features_items-->
							<?php foreach($row as $data): ?>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<form method="POST" action="delete.php">
											<div class="delete-wishlist">
												<input type="hidden" name="id" value="<?php echo $data->id_wishlist ?>">
												<button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
											</div>
										</form>
										<div class="productinfo text-center">
											<img class="img-product-size-f2" src="../../admin/home/table_barang/upload/<?php echo $data->foto ?>" alt="" />
											<h2 class="product-price">Rp. <?= number_format($data->harga,0,',','.') ?></h2>
											<p><?php echo $data->nama_barang ?></p>         
											<form method="GET" action="../product-detail">
												<input type="hidden" name="id" value="<?php echo $data->id_barang ?>">
												<button type="submit" href="#" class="btn btn-default"><i class="fa fa-check detail"></i> Detail Barang</button>
											</form>        
										</div>
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified"> 
											<input type="hidden" id="hiddenQuantity" value="1">
											<li><button type="button" id="<?= $data->id_barang ?>" class="add_cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></li>
										</ul> 
									</div>
								</div>
							</div>
							<?php endforeach ?>
						</div><!--features_items-->
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
<script src="../home/home.js"></script>
</body>
</html>
<?php else: ?>
<?php header('location: ../users/login.php'); ?>
<?php endif ?>