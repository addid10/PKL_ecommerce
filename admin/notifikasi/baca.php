<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
	require_once('function.php');
    if(isset($_POST["id"])) {
        $id    = $_POST["id"];
        $status = '0';

        $statement = $connection->prepare(
            "UPDATE transaksi_pembelian SET 
            status_baca                  = :status
            WHERE id_transaksi_pembelian = :id"
        );
        $statement->bindParam("id", $id);
        $statement->bindParam("status", $status);
        $statement->execute();
    }
}
?>