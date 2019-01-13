<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {

    if(isset($_POST['id'])) {
        require_once('../database/db.php');
        $id = $_POST['id'];

        $statement = $connection->prepare("SELECT kuantitas, harga FROM cart_item JOIN cart USING(id_cart) JOIN barang USING(id_barang) WHERE id_cart_item=:id");
        $statement->bindParam("id", $id);
        $statement->execute();
        $row = $statement->fetch();

        $quantity = $row['kuantitas'];
        $price    = $row['harga'];

        $total    = $quantity * $price;

        echo json_encode($total);
    }
}
?>