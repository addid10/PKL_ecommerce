<?php session_start(); ?>
<?php require_once('../profile/view-profile.php'); ?>

<?php if(isset($_GET['q'])): ?>
<?php require_once('index.search.php'); ?>
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
	<!-- 	
    <section id="advertisement">
		<div class="container">
			<img src="../assets/images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	 -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<?php require_once('../layout/category.php'); ?>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="features_items">
						<!--features_items-->
						<h2 class="title text-center">HASIL PENCARIAN</h2>
						<div class="row">
							<?php foreach ($result as $data): ?>
							<div class="col-sm-3 col-6">
								<div class="product-image-wrapper">
									<a class="d-block" href="../product/<?= $data->id_barang ?>">
										<div class="single-products">
											<div class="productinfo text-center">
												<img class="img-product-size" src="../assets/images/product/<?= $data->foto ?>">
												<h4>Rp.
													<?= number_format($data->harga, 0,',','.') ?>
												</h4>
												<p>
													<?= $data->nama_barang ?>
												</p>
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
					</div>
					<!--features_items-->
				</div>
			</div>
		</div>
	</section>
	<div class="space-header"></div>
	<footer id="footer">
		<?php require_once('../layout/footer.php');?>
	</footer>

	<?php require_once('../layout/javascript.php');?>
	<script src="../home/home.js"></script>
</body>
</html>

<?php endif ?>