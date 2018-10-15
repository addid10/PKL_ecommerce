<?php 
session_start();
if(isset($_POST['add_to_cart'])){
	if(isset($_SESSION['shopping_cart'])){
		$item_array_id = array_column($_SESSION['shopping_cart'], 'item_id');
		if(!in_array($_GET['id'], $item_array_id)){
			$count = count($_SESSION['shopping_cart']);
			$item_array = array(
				'item_id'		=> $_GET['id'],
				'item_name'		=> $_POST['hidden_name'],
				'item_price'	=> $_POST['hidden_price'],
				'item_foto'		=> $_POST['hidden_foto'],
				'item_quantity'	=> $_POST['hidden_quantity']
			);
			$_SESSION['shopping_cart'][$count] = $item_array;
			
			echo '<script>alert("Item telah ditambahkan")</script>';
		}
		else{
			echo '<script>alert("Item sudah pernah ditambahkan)</script>';
		}
	}
	else{
		$item_array = array(
			'item_id'		=> $_GET['id'],
			'item_name'		=> $_POST['hidden_name'],
			'item_price'	=> $_POST['hidden_price'],
			'item_foto'		=> $_POST['hidden_foto'],
			'item_quantity'	=> $_POST['hidden_quantity']
		);
		$_SESSION['shopping_cart'][0] = $item_array;
		
		echo '<script>alert("Item telah ditambahkan")</script>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once('../layout/head.php');?>
</head>

<body>
	<header id="header"><!--header-->
		<?php require_once('../layout/header.php'); ?>
	</header><!--/header-->
	<div class="space-header"></div>
	
	<section id="slider"><!--slider-->
		<?php require_once('../layout/slider.php'); ?>
	</section><!--/slider-->
	<?php 
		require('../database/db.php');
		$statement = $connection->prepare(
			"SELECT * FROM barang");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_OBJ);
	?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<?php require_once('../layout/category.php'); ?>
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php foreach ($result as $data): ?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img class="img-product-size" src="../../admin/home/table_barang/upload/<?= $data->foto ?>" alt="" />
											<h2>Rp. <?= $data->harga ?>,-</h2>
											<p><?= $data->nama_barang ?></p>         
											<form method="GET" action="../product-detail">
												<input type="hidden" name="id" value="<?= $data->id_barang ?>">
												<button type="submit" href="#" class="btn btn-default"><i class="glyphicon glyphicon-list-alt detail"></i> Detail Barang</button>
											</form>  
										</div>
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified"> 
										<?php if(isset($_SESSION['_username'])):?>
										<form method="POST" action="index.php?action=add&id=<?= $data->id_barang ?>">
											<input type="hidden" name="hidden_quantity" value="1">
											<input type="hidden" name="hidden_foto" value="<?= $data->foto ?>">
											<input type="hidden" name="hidden_name" value="<?= $data->nama_barang ?>">
											<input type="hidden" name="hidden_price" value="<?= $data->harga ?>">
											<li><button type="submit" name="add_to_cart" id="add-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></li>
										</form>
										<form id="wishlist" method="POST" action="../wishlist/add.php">
											<input type="hidden" id="add-id" name="id" value="<?= $data->id_barang ?>">
											<li><button type="submit" id="add-wishlist" href="#"><i class="fa fa-plus-square"></i>Add to wishlist</button></li>
										</form>  
										<?php else: ?>
											<li><button name="add_to_cart" id="add_cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></li>
											<li><button type="submit" id="add_wishlist" href="#"><i class="fa fa-plus-square"></i>Add to wishlist</button></li>  
										<?php endif ?>     
										</ul>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div><!--features_items-->

					<!--recommended_items
					
					<div class="recommended_items">
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="../assets/images/home/paper.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div>
					-->
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<?php require_once('../layout/footer.php');?>	
	</footer><!--/Footer-->
	

  
<?php require_once('../layout/javascript.php');?>
<?php require_once('../layout/cs_javascript.php');?>
<script src="home.js"></script>
</body>
</html>