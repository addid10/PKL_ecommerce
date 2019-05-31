<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {

    if(isset($_POST['id'])) {
        require_once('../database/db.php');
        $id = $_POST['id'];

        $cartItem = $connection->prepare(
            "SELECT SUM((kuantitas*harga)) as total FROM cart_item JOIN barang using(id_barang) WHERE id_cart=:id"
        );
        $cartItem->bindParam("id", $id);
        $cartItem->execute();
        $total = $cartItem->fetchColumn();

        if(!empty($total)) {
            $statement = $connection->prepare(
                "UPDATE cart SET total=:total WHERE id_cart=:id"
            );
            $statement->bindParam("total", $total);
            $statement->bindParam("id", $id);
            $statement->execute();
        }
    }
}
?>