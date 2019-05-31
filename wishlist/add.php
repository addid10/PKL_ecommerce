<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    require_once('../database/db.php');
    if(isset($_SESSION['user_id'])) {
        if(isset($_POST['id'])) {
            
            $id     = $_POST['id'];
            $userId = $_SESSION['user_id'];

            $statement = $connection->prepare(
                "SELECT COUNT(*) FROM wishlist WHERE id_users=:id_user AND id_barang=:id_barang"
            );
            $statement->bindParam("id_user", $userId);
            $statement->bindParam("id_barang", $id);
            $statement->execute();
            $result = $statement->fetchColumn();

            if($result=="0"){
                $add = $connection->prepare(
                    "INSERT INTO wishlist (id_barang, id_users) VALUES (:id_barang, :id_user)"
                );
        
                $add->bindParam("id_user", $userId);
                $add->bindParam("id_barang", $id);
                $add->execute();
                echo 1;
            }
            else {
                echo 0;
            }
        }
    }
}
?>