<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
	<?php require_once('../layout/head.php');?>
</head>

<body>
	<header id="header">
		<!--header-->
		<?php require_once('../layout/header.php'); ?>
	</header>
	<!--/header-->
	<div class="space-header"></div>

	<?php require_once('index.barang.php'); ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<?php require_once('../layout/category.php'); ?>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="features_items row">
						<!--features_items-->
						<h2 class="col-sm-12 title text-center">Features Items</h2>
						<?php foreach ($result as $data): ?>
						<div class="col-sm-3 col-6">
							<div class="product-image-wrapper">
								<a class="d-block" href="../product/<?= $data->id_barang ?>">
									<div class="single-products">
										<div class="productinfo text-center">
											<img class="img-product-size" src="../admin/home/table_barang/upload/<?= $data->foto ?>">
											<h4>Rp.<?= number_format($data->harga, 0,',','.') ?></h4>
											<p><?= $data->nama_barang ?></p>
										</div>
									</div>
								</a>
								<div class="choose">
									<div class="d-flex bd-highlight">
										<?php if(isset($_SESSION['username_member'])):?>
										<input type="hidden" id="hiddenQuantity" value="1">
										<div class="mr-auto p-2 bd-highlight">
											<button type="button" id="<?= $data->id_barang ?>" class="add-cart"><i class="fa fa-shopping-cart"></i>Add
												to cart</button>
										</div>
										<div class="p-2 bd-highlight">
											<button type="submit" id="<?= $data->id_barang ?>" class="add-wishlist"><i class="fa fa-heart"></i>Add to
												wishlist</button></li>
										</div>
										<?php else: ?>
										<div class="mr-auto p-2 bd-highlight">
											<button class="add_to_cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
										<div class="p-2 bd-highlight">
											<button class="add_to_wishlist"><i class="fa fa-plus-square"></i>Add to wishlist</button></li>
										</div>
										<?php endif ?>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
					<!--features_items-->
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
					<!-- 
					<div class="pagination-area">
						<ul class="pagination">
							<li><a href="" class="active">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
						</ul>
					</div> -->
				</div>
			</div>
		</div>
	</section>

	<footer id="footer">
		<!--Footer-->
		<?php require_once('../layout/footer.php');?>
	</footer>
	<!--/Footer-->



	<?php require_once('../layout/javascript.php');?>
	<script src="home.js"></script>
</body>

</html>