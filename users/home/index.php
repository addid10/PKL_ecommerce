<?php session_start();?>
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
	
	<!--slide
	<section id="slider">
		<?php //require_once('../layout/slider.php'); ?>
	</section>-->
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
											<h2>Rp. <?= number_format($data->harga, 0,',','.') ?></h2>
											<p><?= $data->nama_barang ?></p>         
											<form method="GET" action="../product-detail">
												<input type="hidden" name="id" value="<?= $data->id_barang ?>">
												<button type="submit" href="#" class="btn btn-default"><i class="glyphicon glyphicon-list-alt detail"></i> Detail Barang</button>
											</form>  
										</div>
									</div>
									<div class="choose">
										<?php if(isset($_SESSION['_username'])):?>
										<ul class="nav nav-pills nav-justified"> 
											<input type="hidden" id="hiddenQuantity" value="1">
											<li><button type="button" id="<?= $data->id_barang ?>" class="add_cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></li>
											<li><button type="submit" id="<?= $data->id_barang ?>" class="add_wishlist"><i class="fa fa-heart"></i>Add to wishlist</button></li>
										<?php else: ?>
										<ul class="nav nav-pills nav-justified">
											<li><button class="add_to_cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></li>
											<li><button class="add_to_wishlist"><i class="fa fa-plus-square"></i>Add to wishlist</button></li>   
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="home.js"></script>
<?php require_once('../layout/cs_javascript.php');?>
</body>
</html>