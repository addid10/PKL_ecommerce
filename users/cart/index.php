<?php session_start(); ?>
<?php if(isset($_SESSION['_username'])):?>
<?php require_once('../profile/view-profile.php'); ?>
<?php
require_once('../database/db.php');
	if (isset($_GET['action'])){
		if($_GET['action'] == "delete"){
			foreach($_SESSION['shopping_cart'] as $key => $values){
				if($values['item_id'] == $_GET['id']){
					unset($_SESSION['shopping_cart'][$key]);
					echo '<script>alert("Item telah dihapus!")</script>';
				}
			}
		}
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
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr class="cart-menu-item">
									<th colspan="2">Item</th>
									<th>Harga</th>
									<th>Kuantitas</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php if(!empty($_SESSION['shopping_cart'])): ?>
							<?php $total = 0; ?>
							<?php foreach($_SESSION['shopping_cart'] as $keys => $values):?>
								<tr>
									<td>
										<a><img width="80px" src="../../admin/home/table_barang/upload/<?= $values['item_foto']; ?>" alt=""></a>
									</td>
									<td class="cart-description">
										<h4><a href="../product-detail/index.php?id=<?=$values['item_id']?>"><?= $values['item_name']; ?></a></h4>
										<p>ID: <?=$values['item_id']?></p>
									</td>
									<td class="cart-price">
										<p><?= $values['item_price']; ?></p>
									</td>
									<td>
										<div class="quantity buttons_added product-quantity">
											<input type="button" value="-" class="minus">
											<input type="number" step="1" min="1" max="" name="quantity" value="<?= $values['item_quantity']; ?>" title="Qty" class="input-text qty text">
											<input type="button" value="+" class="plus">
										</div>
									</td>
									<td class="cart-total">
										<p><?= number_format($values['item_price'] * $values['item_quantity'], 2); ?></p>
									</td>
									<td class="cart-delete">
										<a class="btn btn-danger" href="index.php?action=delete&id=<?= $values['item_id'];?>"><i class="fa fa-times"></i></a>
									</td>
								</tr>
							<?php $total = $total + ($values['item_price'] * $values['item_quantity']); ?>
							<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="5" class="cart-text-total">Total Pembayaran (1 produk): <b>Rp. <?= number_format($total, 2); ?>,-<b></td>
									<td><button class="btn btn-primary cart-button" href="">Bayar Sekarang</button></td>
								</tr>
							</tfoot>
							<?php endif ?>
						</table>
					</div>
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