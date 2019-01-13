<?php session_start(); ?>
<?php if(isset($_SESSION['username_member'])):?>
<?php require_once('../profile/view-profile.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
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
					<h2 class="title text-center">CART</h2>
					<div class="left-sidebar">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th width="25%" colspan="2">Item</th>
										<th width="25%">Harga</th>
										<th width="20%">Kuantitas</th>
										<th width="25%">Total</th>
										<th></th>
									</tr>
								</thead>
								<?php require_once('index.cart.php'); ?>
								<tbody>
									<?php foreach($result as $data):?>
									<tr>
										<td><img width="80px" src="../admin/home/table_barang/upload/<?= $data['foto'] ?>"></td>
										<td><a href="../product/<?= $data['id_barang'] ?>"><?= $data['nama_barang']; ?></a></td>
										<td>Rp. <?= number_format($data['harga'],0,',','.'); ?></td>
										<td>
											<div class="quantity buttons_added">
												<input type="button" id="sub" class="minus" value="-">
												<input id="<?= $data['id_cart_item'];?>" value="<?= $data['kuantitas']; ?>" step="1" min="1" max="" class="input-text qty kuantitas"
												type="number" name="quantity">
												<input type="button" id="add" class="plus" value="+">
											</div>
										</td>
										<td class="cart-total text-left">
											<?php $total = $data['harga']*$data['kuantitas'] ?>
											<span id="total-<?= $data['id_cart_item'];?>">Rp. <?= number_format($total,0,',','.') ?></span>
										</td>
										<td class="cart-delete">
											<button id="<?= $data['id_cart_item'];?>" class="btn btn-danger delete-cart" type="button"><i class="fa fa-times"></i></button>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
								<?php if(!empty($count)): ?>
								<tfoot>
									<tr><td colspan="6"><a id=<?= $data['id_cart'] ?> href="#" class="btn btn-primary w-100 btn-random">Beli Sekarang</a></td></tr>
								</tfoot>
								<?php endif ?>
							</table>
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
	<script src="cart.js"></script>
</body>
</html>
<?php else: ?>
<?php header('location: ../users/login.php'); ?>
<?php endif ?>