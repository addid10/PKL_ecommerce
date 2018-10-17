<?php session_start(); ?>
<?php if(isset($_SESSION['_username'])):?>
<?php require_once('../profile/view-profile.php'); ?>
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
						<table class="table">
							<thead>
								<tr class="cart-menu-item">
									<th colspan="2">Item</th>
									<th>Harga</th>
									<th>Kuantitas</th>
									<th width="25%">Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php
							require_once('../database/db.php');
							$id = $_SESSION['_username'];
							$statement3 = $connection->prepare(
								"SELECT * FROM cart_item JOIN barang using(id_barang) JOIN users ON id=id_users WHERE username=:_id"
							);
							$statement3->bindParam('_id', $id);
							$statement3->execute();
							$result = $statement3->fetchAll();
							?>
							<?php $total = 0; ?>
							<?php $count = 1; ?>
							<?php foreach($result as $keys):?>
								<tr>
									<td>
										<a><img width="80px" src="../../admin/home/table_barang/upload/<?= $keys['foto'] ?>" alt=""></a>
									</td>
									<td class="cart-description">
										<h4><a href="../product-detail/index.php?id=<?=$keys['id_barang']?>"><?= $keys['nama_barang']; ?></a></h4>
										<p>ID: <?=$keys['id_barang']?></p>
									</td>
									<td class="cart-price">
										<p><?= $keys['harga']; ?></p>
										<input type="hidden" id="price<?=$count?>" value="<?= $keys['harga']; ?>">
										<input type="hidden" id="cartID<?=$count?>" value="<?= $keys['id_cart']; ?>">
									</td>
									<td>
										<div class="quantity buttons_added product-quantity">
											<input type="button" id="sub<?=$count?>" class="minus" value="-">
											<input id="quantity<?=$count?>" value="<?=$keys['kuantitas'];?>" step="1" min="1" max="" class="input-text qty text" type="number" name="quantity">
											<input type="button" id="add<?=$count?>" class="plus" value="+">
										</div>
									</td>
									<td class="cart-total">
										<p><div id="total<?=$count?>"></div></p>
										<input type="hidden" id="total_hidden<?=$count?>" val="">
									</td>
									<td class="cart-delete">
									<form method="POST" action="delete.php">
										<input type="hidden" name="id" value="<?= $keys['id_barang'];?>">
										<button class="btn btn-danger" type="submit"><i class="fa fa-times"></i></button>
									</form>
									</td>
								</tr>
							<?php $count++; ?>
							<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="6" ><button class="btn btn-primary cart-button pull-right" href="">Bayar Sekarang</button></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>	
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<?php require_once('../layout/footer.php');?>	
	</footer><!--/Footer-->
	
<?php require_once('../layout/javascript.php');?>

<script>

function numberWithCommas(number) {
	var parts = number.toString().split(",");
	parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	return parts.join(",");
}
<?php for($i=1;$i<4;$i++): ?>
    $('#sub<?=$i?>').click(function() {
        $('#quantity<?=$i?>').change();
    });

    $('#add<?=$i?>').click(function() {
        $('#quantity<?=$i?>').change();
    });
    $('#quantity<?=$i?>').ready(function(){
        $('#quantity<?=$i?>').change();
    });
    $('#quantity<?=$i?>').on('keyup change',function(){
		var total 	 = 0;
        var quantity = $('#quantity<?=$i?>').val();
		var price    = $('#price<?=$i?>').val();
		var cart     = $('#cartID<?=$i?>').val();
		
		if(quantity !=''){
			total = quantity * price;
			var total_num = numberWithCommas(total);
		}
		$('#total<?=$i?>').html(total_num);
		$('#total_hidden<?=$i?>').val(total_num);

		$.ajax({
			type: 'POST',
			url: 'update.php',
			data: {cart:cart, quantity:quantity},
		})
	});
<?php endfor ?>

</script>
<script src="cart.js"></script>
<?php require_once('../layout/cs_javascript.php');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
<?php else: ?>
<?php header('location: ../users/login.php'); ?>
<?php endif ?>