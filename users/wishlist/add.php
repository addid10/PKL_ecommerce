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

        $statement4 = $connection->prepare(
            "SELECT COUNT(*) FROM wishlist WHERE id_users=:_idUser"
        );
        $statement4->bindParam("_idUser", $id_user);
        $statement4->execute();
        $result4 = $statement4->fetchColumn();

        if($result4=="0"){
            $statement2 = $connection->prepare(
                "INSERT INTO wishlist (id_barang, id_users) VALUES (:_idBarang, :_idUser)"
            );
    
            $statement2->bindParam("_idUser", $id_user);
            $statement2->bindParam("_idBarang", $id);
            $result2 = $statement2->execute();
            if($result2){
                echo 'Telah ditambahkan ke Wishlist';
            }
        }
        else {
            $statement3 = $connection->prepare(
                "SELECT COUNT(*) FROM wishlist WHERE id_barang=:_idBarang AND id_users=:_idUser"
            );
            $statement3->bindParam("_idUser", $id_user);
            $statement3->bindParam("_idBarang", $id);
            $statement3->execute();
            $result3 = $statement3->fetchColumn();

            if($result3=="0"){
                $statement2 = $connection->prepare(
                    "INSERT INTO wishlist (id_barang, id_users) VALUES (:_idBarang, :_idUser)"
                );
        
                $statement2->bindParam("_idUser", $id_user);
                $statement2->bindParam("_idBarang", $id);
                $result2 = $statement2->execute();
                if($result2){
                    echo 'Telah ditambahkan ke Wishlist';
                }
            }
            else{
                    echo 'Sudah pernah ditambahkan ke Wishlist';
            }
        }


    }
}
else {
    header('location: ../users/login.php?_status=Silahkan login terlebih dahulu.');
}


?>