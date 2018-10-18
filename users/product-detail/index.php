<?php session_start(); ?>
<?php if(isset($_GET['id'])): ?>
<!DOCTYPE html>
<html>
<head>
<?php require_once('../layout/head.php');?>
</head>
<?php 
require_once('../database/db.php');
$id = $_GET['id'];
$statement = $connection->prepare("SELECT * FROM barang WHERE id_barang=:_idBarang");

$statement->bindParam("_idBarang", $id);
$statement->execute();
$detail = $statement->fetch();
?>

<body>
	<header id="header"><!--header-->
		<?php require_once('../layout/header.php'); ?>
	</header><!--/header-->
	<div class="space-header"></div>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="product-details"><!--product-details-->
						<div class="col-md-4">
							<div class="view-product">
								<img id="zoom" src="../../admin/home/table_barang/upload/<?php echo $detail['foto']; ?>" data-zoom-image="../../admin/home/table_barang/upload/<?php echo $detail['foto']; ?>" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="product-information"><!--/product-information-->
								<img src="../assets/images/product-details/new.jpg" class="newarrival" alt="" />
								<br><br>
								<div class="col-md-12">
									<div class="product-name"><?php echo $detail['nama_barang']; ?></div>
								</div>
								<div class="col-md-12">
									<div class="col-md-2 product-padding">
										<div class="product-rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
										</div>
									</div>
									<div class="col-md-4 no-padding">
										<div class="product-review-text">5 penilaian dalam pembelian</div>
									</div>
								</div>
								<div class="col-md-12 product-padding-top">
									<div><b>124</b> Telah Terjual</div>
								</div>
								<div class="col-md-12 product-bg">
									<div class="product-price">Rp <?php echo $detail['harga']; ?></div>
								</div>
								<div class="col-md-2 product-padding-top">
									<label class="product-quantity">Kuantitas</label>
								</div>
								<div class="col-md-10 product-padding-top">
									<div class="quantity buttons_added product-quantity">
										<input type="button" value="-" class="minus">
										<input type="number" step="1" min="1" max="" id="hiddenQuantity" value="1" title="Qty" class="input-text qty text">
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
									<p><?php echo $detail['merk_barang']; ?></p>
								</div>
								<div class="col-md-6 product-padding-top">
								<?php if(isset($_SESSION['_username'])):?>
									<button type="submit" id="<?= $detail['id_barang']?>" class="btn btn-default cart-now add_cart"><i class="fa fa-shopping-cart"></i> Buat ke Keranjang</button>
								<?php else: ?>
									<button type="submit" class="btn btn-default cart-now" id="add_cart"><i class="fa fa-shopping-cart"></i> Buat ke Keranjang</button>
								<?php endif ?>
								</div>
								<div class="col-md-6 product-padding-top">
									<button type="button" class="btn btn-default order-now">Beli sekarang</button>
								</div>
							</div><!--/product-information-->
						</div>
						
						<div class="col-md-12 product-padding-top">
							<div class="product-information">
								<div class="product-keterangan">Deskripsi Produk </div>
								<p><?php echo $detail['keterangan']; ?></p>
							</div>
						</div>
					</div><!--/product-details-->
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
                                    <ul class="media-list">
                                        <li class="media second-media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="../assets/images/blog/man-three.jpg" alt="">
                                            </a>
                                            <div class="media-body">
                                                <ul class="sinlge-post-meta">
                                                    <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="../assets/images/blog/man-four.jpg" alt="">
                                            </a>
                                            <div class="media-body">
                                                <ul class="sinlge-post-meta">
                                                    <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                        </li>
                                    </ul>		
									
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->


				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<?php require_once('../layout/footer.php');?>	
	</footer><!--/Footer-->
	


<?php require_once('../layout/javascript.php');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../home/home.js"></script>
<?php require_once('../layout/cs_javascript.php');?>
</body>
</html>
<?php endif ?>