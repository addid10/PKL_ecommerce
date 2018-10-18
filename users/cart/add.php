<?php
session_start();
require('../database/db.php');

if(isset($_SESSION['_username']))
{
    if(isset($_POST['id']) && isset($_POST['quantity']))
    {
        $id_barang = $_POST['id'];
        $quantity  = $_POST['quantity'];
        $username  = $_SESSION['_username'];
        $date      = date("y-m-d"); 

        $statement = $connection->prepare(
            "SELECT * FROM users WHERE username=:_userName"
        );
        $statement->bindParam("_userName", $username);
        $statement->execute();
        $result = $statement->fetch();

        $id_user = $result['id'];

        $statement4 = $connection->prepare(
            "SELECT COUNT(*) FROM cart_item WHERE id_users=:_idUser"
        );
        $statement4->bindParam("_idUser", $id_user);
        $statement4->execute();
        $result4 = $statement4->fetchColumn();

        if($result4=="0"){
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
                echo 'Data berhasil ditambahkan';
            }
        }
        else{
            $statement3 = $connection->prepare(
                "SELECT COUNT(*) FROM cart_item WHERE id_barang=:_idBarang AND id_users=:_idUser"
            );
            $statement3->bindParam("_idUser", $id_user);
            $statement3->bindParam("_idBarang", $id_barang);
            $statement3->execute();
            $result3 = $statement3->fetchColumn();
    
            if($result3=="0"){
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
                    echo 'Data berhasil ditambahkan';
                }
            }
            else{
                    echo 'Data sudah pernah ditambahkan ke dalam cart!';
            }

        }



        
    }
}
else {
    header('location: ../users/login.php?_status=Silahkan login terlebih dahulu.');
}


?>