<?php
    if(isset($_SESSION['username_member'])) {
        require_once('../database/db.php');
        $id = $_SESSION['user_id'];

        $statement = $connection->prepare(
            "SELECT * FROM cart_item JOIN cart USING(id_cart) JOIN barang using(id_barang) WHERE id=:id"
        );
        $statement->bindParam('id', $id);
        $statement->execute();
        $result = $statement->fetchAll();
        $count = $statement->rowCount();

    }
?>