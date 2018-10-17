<?php
require('../database/db.php');

if(isset($_POST['id']))
{

    $_id       = $_POST['id'];
    $_price    = $_POST['price'];
    $_quantity = $_POST['quantity'];

    $statement = $connection->prepare("SELECT COUNT(*) from cart_item WHERE id_cart=:_cart");
    $statement->bindParam("_cart", $_id);
    $statement->execute();
    $count = $statement->fetchColumn();

    if($count == 1){
        $total    = $_price * $quantity;
        $totalnum = number_format($total, 2,',','.');
        echo $totalnum;
    }
}

