<?php session_start(); ?>
<?php if(isset($_GET['id'])): ?>
<?php require_once('index.detail.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title><?= $detail['nama_barang'] ?> - LainLain</title>
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
				<div class="col-md-12">
					<div class="product-details row">
						<div class="col-md-4">
							<div class="view-product">
								<img id="zoom" src="../../admin/home/table_barang/upload/<?= $detail['foto']; ?>" data-zoom-image="../../admin/home/table_barang/upload/<?php echo $detail['foto']; ?>" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="product-information row">
								<img src="../assets/images/product-details/new.jpg" class="newarrival" alt="" />
								<br><br>
								<div class="col-md-12">
									<div class="product-name">
										<?= $detail['nama_barang']; ?>
									</div>
								</div>
								<div class="col-md-12 mb-2">
									<div class="row">
										<div class="col-md-2">
											<div class="product-rating">
												<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												 class="fa fa-star"></i>
											</div>
										</div>
										<div class="col-md-4 p-0">
											<div class="product-review-text">5 penilaian dalam pembelian</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 product-bg">
									<div class="product-price">Rp. <?= number_format($detail['harga'],0,',','.'); ?></div>
								</div>
								<div class="col-md-2 product-padding-top">
									<label class="product-quantity">Kuantitas</label>
								</div>
								<div class="col-md-10 product-padding-top">
									<div class="quantity buttons_added product-quantity">
										<input type="button" value="-" class="minus">
										<input type="number" step="1" min="1" max="" id="quantity" value="1" title="Qty" class="input-text qty text">
										<input type="button" value="+" class="plus">
									</div>
								</div>
								<div class="col-md-2">
									<label>Availability</label>
								</div>
								<div class="col-md-10">
									<p>In Stock</p>
								</div>
								<div class="col-md-2">
									<label>Condition</label>
								</div>
								<div class="col-md-10">
									<p>New</p>
								</div>
								<div class="col-md-2">
									<label>Brand</label>
								</div>
								<div class="col-md-10">
									<p>
										<?= $detail['merk_barang']; ?>
									</p>
								</div>
								<?php if(isset($_SESSION['username_member'])):?>
								<div class="col-md-6 product-padding-top">
									<button id="<?= $detail['id_barang']?>" type="button" class="btn btn-cart btn-cart-on">
									<i class="fa fa-shopping-cart"></i> Buat ke Keranjang</button>
								</div>
								<div class="col-md-6 product-padding-top">
									<button id="<?= $detail['id_barang']?>" type="button" class="btn btn-order btn-order-on">Beli sekarang</button>
								</div>
								<?php else: ?>
								<div class="col-md-6 product-padding-top">
									<button class="btn btn-cart btn-cart-off"><i class="fa fa-shopping-cart"></i> Buat ke Keranjang</button>
								</div>
								<div class="col-md-6 product-padding-top">
									<button type="button" class="btn btn-order btn-order-off">Beli sekarang</button>
								</div>
								<?php endif ?>
							</div>
						</div>
						<div class="col-md-12 product-padding-top">
							<div class="product-information">
								<div class="product-keterangan">Deskripsi Produk </div>
								<p>
									<?= $detail['keterangan']; ?>
								</p>
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
	<?php require_once('../layout/javascript.php');?>
	<script src="order.js"></script>
</body>

</html>
<?php endif ?>