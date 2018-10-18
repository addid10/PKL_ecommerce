<?php
session_start();
require_once('../database/db.php');

if(isset($_POST['id'])){

    $id = $_POST['id'];

    $statement = $connection->prepare(
        "DELETE FROM cart_item WHERE id_cart=:_idCart"
    );

    $statement->bindParam('_idCart',$id);
    $hasil = $statement->execute();

    if($hasil){
        header('location: ../cart');
    }
}
?>