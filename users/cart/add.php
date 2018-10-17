<?php
session_start();
require('../database/db.php');

if(isset($_SESSION['_username']))
{
    if(isset($_POST['hidden_id']))
    {
        $id_barang = $_POST['hidden_id'];
        $quantity  = $_POST['hidden_quantity'];
        $username  = $_SESSION['_username'];
        $date      = date("y-m-d");

        $statement = $connection->prepare(
            "SELECT * FROM users WHERE username=:_userName"
        );
        $statement->bindParam("_userName", $username);
        $statement->execute();
        $result = $statement->fetch();

        $id_user = $result['id'];

        $statement3 = $connection->prepare(
            "SELECT COUNT(*) FROM cart_item WHERE id_barang=:_idBarang"
        );
        $statement3->bindParam("_idBarang", $id_barang);
        $statement3->execute();
        $result = $statement3->fetchColumn();

        if($result=="0"){
            $statement2 = $connection->prepare(
                "INSERT INTO cart_item (id_barang, id_users, kuantitas, tgl_dibuat) 
                VALUES (:_idBarang, :_idUser, :_kuantitas, :_tanggal)"
            );
    
            $statement2->bindParam("_idUser", $id_user);
            $statement2->bindParam("_idBarang", $id_barang);
            $statement2->bindParam("_kuantitas", $quantity);
            $statement2->bindParam("_tanggal", $date);
            $result2 = $statement2->execute();
            if($result2){
                header('location: ../home');
            }
        }
        else{
                echo '<script>alert("Data sudah pernah ditambahkan ke dalam cart!")</script>';
        }


        
    }
}
else {
    header('location: ../users/login.php?_status=Silahkan login terlebih dahulu.');
}


?>