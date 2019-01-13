<?php session_start(); ?>
<?php if(isset($_SESSION['username_member'])):?>
<?php require_once('../profile/view-profile.php'); ?>
<?php
require_once('../database/db.php');
if(isset($_SESSION['user_id'])){
    $id  = $_SESSION['user_id'];
    $statement = $connection->prepare(
        "SELECT * FROM wishlist 
		JOIN barang USING(id_barang)  
		WHERE id_users=:id"
    );

    $statement->bindParam("id", $id);
    $statement->execute();
    $row = $statement->fetchAll(PDO::FETCH_OBJ);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>My Wishlist - LainLain</title>
	<?php require_once('../layout/head.php');?>
</head>

<body>
	<header id="header">
		<?php require_once('../layout/header.php'); ?>
	</header>
	<div class="space-header"></div>
	<section>
		<div class="container">
			<div class="row">
				<?php require_once('../profile/sidemenu.php'); ?>
				<div class="col-md-9">
					<h2 class="title text-center">WISHLIST</h2>
					<div class="left-sidebar">
						<div class="features_items">
							<?php foreach($row as $data): ?>
							<div class="col-sm-3">
								<a class="d-block" href="../product/<?= $data->id_barang ?>">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="delete-wishlist">
												<button id="<?= $data->id_wishlist ?>" class="btn btn-danger delete-wishlist" type="button"><i class="fa fa-trash-o"></i></button>
											</div>
											<div class="productinfo text-center">
												<img class="img-product-size-f2" src="../admin/home/table_barang/upload/<?php echo $data->foto ?>" alt="" />
												<h2 class="product-price mb-1">Rp.<?= number_format($data->harga,0,',','.') ?></h2>
												<p class="mt-0"><?php echo $data->nama_barang ?></p>
											</div>
										</div>
										<div class="choose">
											<ul class="nav nav-pills nav-justified">
												<li><button type="button" id="<?= $data->id_barang ?>" class="add-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart</button>
												</li>
											</ul>
										</div>
									</div>
								</a>
							</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="space-header"></div>
	<footer id="footer">
		<?php require_once('../layout/footer.php');?>
	</footer>
	<?php require_once('../layout/modal.php'); ?>
	<?php require_once('../layout/javascript.php');?>
	<script src="wishlist.js"></script>
</body>

</html>
<?php else: ?>
<?php header('location: ../users/login.php'); ?>
<?php endif ?>