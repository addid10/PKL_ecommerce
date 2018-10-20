<?php
session_start();
require_once('../database/db.php');

if(isset($_SESSION['_username'])){
    if(isset($_POST['id'])){

        $id    = $_POST['id'];
        $batal = "Dibatalkan";

        $statement = $connection->prepare(
            "UPDATE transaksi_pembelian SET
            status_barang=:_batal
            WHERE id_transaksi_pembelian=:_id"
        );

        $statement->bindParam("_batal", $batal);
        $statement->bindParam("_id", $id);
        $result = $statement->execute();



    }
}
?>