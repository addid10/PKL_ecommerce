
<?php
if(isset($_SESSION['user_id'])) {
    require_once('../database/db.php');
    $id = $_SESSION['user_id'];
    $cartItem = $connection->prepare(
        "SELECT * FROM cart_item JOIN cart USING(id_cart)
        JOIN barang using(id_barang) 
        WHERE id=:id"
    );
    $cartItem->bindParam('id', $id);
    $cartItem->execute();
    $result = $cartItem->fetchAll();
    $total = 0;
    $countBarang = 0;
    $count = $cartItem->rowCount();
}

?>