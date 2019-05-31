<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
    if(isset($_POST["id"])) {
        $id = $_POST["id"];


        $statement = $connection->prepare(
            "UPDATE barang SET status_barang=0 WHERE id_barang=:id"
        );
        $statement->bindParam("id", $id);
        $result = $statement->execute();
    }
}
?>