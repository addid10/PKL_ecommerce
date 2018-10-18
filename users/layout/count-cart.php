<?php 
require_once('../database/db.php');

if(isset($_SESSION['_username'])){
    $_username = $_SESSION['_username'];

    $statement = $connection->prepare(
        "SELECT COUNT(*) FROM cart_item JOIN users ON id=id_users WHERE username=:_id"
    );
    $statement->bindParam("_id", $_username);
    $statement->execute();
    $count = $statement->fetchColumn();
}
?>