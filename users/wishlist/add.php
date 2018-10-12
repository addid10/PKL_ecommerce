<?php
session_start();
require('../database/db.php');

$id = $_POST['id'];

if(isset($_SESSION['_username']))
{
    if(isset($_POST['id']))
    {
        $id       = $_POST['id'];
        $username = $_SESSION['_username'];

        $statement = $connection->prepare(
            "SELECT * FROM users WHERE username=:_userName"
        );
        $statement->bindParam("_userName", $username);
        $statement->execute();
        $result = $statement->fetch();

        $id_user = $result['id'];

        $statement2 = $connection->prepare(
            "INSERT INTO wishlist (id_barang, id_users) VALUES (:_idBarang, :_idUser)"
        );

        $statement2->bindParam("_idUser", $id_user);
        $statement2->bindParam("_idBarang", $id);
        $result2 = $statement2->execute();
        if($result2){
            header('location: ../wishlist');
        }
    }
}
else {
    header('location: ../users/login.php?_status=Silahkan login terlebih dahulu.');
}


?>