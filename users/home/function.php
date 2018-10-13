<?php
function get_features_items(){
    require('../database/db.php');
    $statement = $connection->prepare(
        "SELECT * FROM barang");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    
    foreach ($result as $data){
        echo '
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img class="img-product-size" src="../../admin/home/table_barang/upload/'.$data->foto.'" alt="" />
                            <h2>Rp. '.$data->harga.',-</h2>
                            <p>'.$data->nama_barang.'</p>         
                            <form method="GET" action="../product-detail">
                                <input type="hidden" name="id" value="'.$data->id_barang.'">
                                <button type="submit" href="#" class="btn btn-default"><i class="fa fa-check detail"></i> Detail Barang</button>
                            </form>  
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified"> 
                        <form id="cart" method="POST" action="../cart/add.php">
                            <input type="hidden" id="add" name="id" value="'.$data->id_barang.'">
                            <li><button type="submit" id="add-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></li>
                        </form>
                        <form id="wishlist" method="POST" action="../wishlist/add.php">
                            <input type="hidden" id="add-id" name="id" value="'.$data->id_barang.'">
                            <li><button type="submit" id="add-wishlist" href="#"><i class="fa fa-plus-square"></i>Add to wishlist</button></li>
                        </form>       
                        </ul>
                    </div>
                </div>
            </div>
            <form id="cart" method="POST" action="../cart">
            </form>    
        ';
    }
}
?>

