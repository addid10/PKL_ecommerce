<?php
require_once('../database/db.php');
if(isset($_POST['offset']) && isset($_POST['limit'])){

    $limit  = $_POST['limit'];
    $offset = $_POST['offset'];

    $statement = $connection->prepare(
        "SELECT * FROM barang LIMIT :_limit OFFSET :_offset");
                
    $statement->bindValue('_offset', (int) $offset, PDO::PARAM_INT); 
    $statement->bindValue('_limit', (int) $limit, PDO::PARAM_INT); 
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_OBJ);

    foreach($result as $data){
        echo '
            <div class="col-sm-4">
		    	<div class="product-image-wrapper">
		    		<div class="single-products">
		    			<div class="productinfo text-center">
		    				<img class="img-product-size" src="../../admin/home/table_barang/upload/'.$data->foto.'" alt="" />
		    				<h2>Rp. '.number_format($data->harga, 0,',','.').'</h2>
		    				<p>'.$data->nama_barang.'</p>         
		    				<form method="GET" action="../product-detail">
		    					<input type="hidden" name="id" value="'.$data->id_barang.'">
		    					<button type="submit" href="#" class="btn btn-default"><i class="glyphicon glyphicon-list-alt detail"></i> Detail Barang</button>
		    				</form>  
		    			</div>
		    		</div>
		    		<div class="choose">
		    			<ul class="nav nav-pills nav-justified"> 
		    				<input type="hidden" id="hiddenQuantity" value="1">
		    				<li><button type="button" id="'.$data->id_barang.'" class="add_cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></li>
		    				<li><button type="submit" id="'.$data->id_barang.'" class="add_wishlist"><i class="fa fa-heart"></i>Add to wishlist</button></li> 
		    			</ul>
		    		</div>
		    	</div>
		    </div>
    ';
    }  
}
?>

