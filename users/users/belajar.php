<?php
    require('../database/db.php');
    $statement = $connection->prepare(
        "SELECT * FROM barang");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php foreach ($result as $data): ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img class="img-product-size" src="../../admin/home/table_barang/upload/'<?= $data->foto?>" alt="" />
                            <h2>Rp. <?= $data->harga?>,-</h2>
                            <p><?= $data->nama_barang ?></p>         
                            <form method="GET" action="../product-detail">
                                <input type="hidden" name="id" value="<?= $data->id_barang ?>">
                                <button type="submit" href="#" class="btn btn-default"><i class="fa fa-check detail"></i> Detail Barang</button>
                            </form>  
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">      
                            <li><a href="#" id="add-cart"><i class="fa fa-shopping-cart"></i><?= $data->id_barang?></a></li>
                            <li><a href="#" id="add-wishlist" href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <form id="wishlist" method="POST" action="../wishlist/add.php">
                <input type="text" id="add-id" name="id" value="<?= $data->id_barang?>">
            </form>  
            <form id="cart" method="POST" action="../cart">
            </form>    
    <?php endforeach ?>

<script>
$('#add-wishlist').click(function() {
    $('#wishlist').submit();
});
</script>