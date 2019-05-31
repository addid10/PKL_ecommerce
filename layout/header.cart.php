<?php 
require_once('../database/db.php');

if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];

    $statement = $connection->prepare(
        "SELECT COUNT(*) FROM cart_item JOIN cart USING(id_cart) WHERE id=:id"
    );
    $statement->bindParam("id", $id);
    $statement->execute();
    $count = $statement->fetchColumn();
}
?>