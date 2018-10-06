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
                            <a href="#" id="'.$data->id_barang.'" class="btn btn-default add-to-cart"><i class="fa fa-check detail"></i>Detail Barang</a>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#" id="'.$data->id_barang.'"><i class="fa fa-shopping-cart cart"></i>Add to cart</a></li>
                            <li><a href="#" id="'.$data->id_barang.'"><i class="fa fa-plus-square wishlist"></i>Add to wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>    
        ';
    }
}
?>

