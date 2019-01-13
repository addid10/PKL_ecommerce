<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token']===$_SESSION['csrf_token']) {
    if(isset($_POST['id']) && isset($_POST['quantity'])){
        require_once('../database/db.php');

        $id        = $_POST['id'];
        $quantity  = $_POST['quantity'];

        $statement = $connection->prepare(
            "UPDATE cart_item SET
            kuantitas       = :quantity
            WHERE id_cart_item   = :id"
        );

        $statement->bindParam("id", $id);
        $statement->bindParam("quantity", $quantity);
        $statement->execute();
    }
}

?>