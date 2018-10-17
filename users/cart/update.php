<?php
require('../database/db.php');

if(isset($_POST['cart'])){

    $id        = $_POST['cart'];
    $quantity  = $_POST['quantity'];

    $statement = $connection->prepare(
        "UPDATE cart_item SET
        kuantitas       = :_quantity
        WHERE id_cart   = :_id"
    );

    $statement->bindParam("_id", $id);
    $statement->bindParam("_quantity", $quantity);
    $statement->execute();
    $result = $statement->fetch();

}

?>