<?php
session_start();
require_once('../database/db.php');
if(isset($_GET['q'])){

    $search    = $_GET['q'];

    $searching = $connection->prepare(
        "SELECT * FROM barang WHERE nama_barang RLIKE :_search OR keterangan RLIKE :_search"
    );

    $searching->bindParam("_search", $search);
    $searching->execute();
    $row = $searching->fetchAll(PDO::FETCH_OBJ);
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
	
    <section id="advertisement">
		<div class="container">
			<img src="../assets/images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
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
                        <h2 class="title text-center">HASIL PENCARIAN</h2>
                        <?php foreach($row as $data): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img class="img-product-size" src="../../admin/home/table_barang/upload/<?php echo $data->foto ?>" alt="" />
                                        <h2>Rp. <?= number_format($data->harga,0,',','.') ?></h2>
                                        <p><?php echo $data->nama_barang ?></p>         
                                        <form method="GET" action="../product-detail">
                                            <input type="hidden" name="id" value="<?php echo $data->id_barang ?>">
                                            <button type="submit" href="#" class="btn btn-default"><i class="fa fa-check detail"></i> Detail Barang</button>
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