<?php
session_start();
require_once('../database/db.php');

if(isset($_POST['id'])){

    $id = $_SESSION['_username'];
    $validation = $connection->prepare(
        "SELECT * FROM cart_item JOIN users ON id_users=id WHERE username=:_userName"
    );

    $validation->bindParam('_userName', $id);
    $validation->execute();
    $result = $validation->fetch();

    $id_cart = $result['id_cart'];

    $statement = $connection->prepare(
        "DELETE FROM cart_item WHERE id_cart=:_idCart"
    );

    $statement->bindParam('_idCart',$id_cart);
    $hasil = $statement->execute();

    if($hasil){
        header('location: ../cart');
    }
}
?>