
<div class="space-header"></div>
<?php 
session_start();
$product_ids = array();
session_destroy();

if(filter_input(INPUT_POST, 'add_to_cart')){
	if(isset($_SESSION['shopping_cart'])){
		$count = count($_SESSION['shopping_cart']);
		$product_ids = array_column($_SESSION['shopping_cart'], 'id');
		
		if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
			$_SESSION['shopping_cart'][$count] = array 
			(
				'id' => filter_input(INPUT_GET, 'id'),
				'name' => filter_input(INPUT_POST, 'name'),
				'price' => filter_input(INPUT_POST, 'price'),
				'quantity' => filter_input(INPUT_POST, 'quantity')
			);
		}
		else {
			for ($i = 0 ; $i < $product_ids ; $i++){
				if($product_ids[$i] == filter_input(INPUT_GET,'id')){
					$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
				}
			}
		}
	}
	else{
		$_SESSION['shopping_cart'][0] = array 
		(
			'id' => filter_input(INPUT_GET, 'id'),
			'name' => filter_input(INPUT_POST, 'name'),
			'price' => filter_input(INPUT_POST, 'price'),
			'quantity' => filter_input(INPUT_POST, 'quantity')
		);
	}
	pre_r($_SESSION);

	function pre_r($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<?php require_once('../layout/head.php');?>
</head>
<body>

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
										<form method="POST" action="belajar.php?action=add&id=<?= $data->id_barang ?>">
											<input type="hidden" name="quantity" value="1">
											<input type="hidden" name="name" value="<?= $data->nama_barang ?>">
											<input type="hidden" name="price" value="<?= $data->harga ?>">
											<li><button type="submit" name="add_to_cart" id="add-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></li>
										</form>
										<form id="wishlist" method="POST" action="../wishlist/add.php">
											<input type="hidden" id="add-id" name="id" value="<?= $data->id_barang ?>">
											<li><button type="submit" id="add-wishlist" href="#"><i class="fa fa-plus-square"></i>Add to wishlist</button></li>
										</form>       
										</ul>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div><!--features_items-->
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