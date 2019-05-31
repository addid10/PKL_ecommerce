<?php 
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token']===$_SESSION['csrf_token']) {
    require_once('../database/db.php');

    if(isset($_SESSION['user_id'])) {
        require_once('function.php');

        if(isset($_POST['id'])) {
            $barangId   = $_POST['id'];
            $userId     = $_SESSION['user_id'];
            $digits     = 3;
            $random     = rand(pow(10, $digits-1), pow(10, $digits)-1);

            if(isset($_POST['quantity'])) {
                $quantity = $_POST['quantity'];
            } else {
                $quantity = 1;
            }

            $count = count_cart($userId);

            if ($count == 0) {
                $cart = $connection->prepare(
                    "INSERT INTO cart (id, random_digit) VALUES (:id, :random)"
                );
                $cart->bindParam("id", $userId);
                $cart->bindParam("random", $random);
                $cart->execute();
                $cartId = $connection->lastInsertId();

            } else {
                $cart = $connection->prepare(
                    "SELECT id_cart FROM cart WHERE id=:id"
                );
                $cart->bindParam("id", $userId);
                $cart->execute();
                $cartId = $cart->fetchColumn();
            }

            $statement = $connection->prepare(
                "SELECT COUNT(*) FROM cart_item WHERE id_cart=:id_cart AND id_barang=:id_barang"
            );
            $statement->bindParam("id_cart", $cartId);
            $statement->bindParam("id_barang", $barangId);
            $statement->execute();
            $result = $statement->fetchColumn();

            if($result == 0) {
                $add = $connection->prepare(
                    "INSERT INTO cart_item (id_barang, id_cart, kuantitas) 
                    VALUES (:id_barang, :id_cart, :quantity)"
                );

                $add->bindParam("id_cart", $cartId);
                $add->bindParam("id_barang", $barangId);
                $add->bindParam("quantity", $quantity);
                $add->execute();
                
                echo 1;
            } else {
                echo 0;
            }
        }
    }
}

?>