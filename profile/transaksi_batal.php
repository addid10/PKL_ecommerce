<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token']===$_SESSION['csrf_token']) {
    require_once('../database/db.php');
    if(isset($_SESSION['username_member'])){
        if(isset($_POST['id'])){

            $id    = $_POST['id'];
            $batal = "Dibatalkan";

            $statement = $connection->prepare(
                "UPDATE transaksi_pembelian SET
                status_barang=:batal
                WHERE id_transaksi_pembelian=:id"
            );

            $statement->bindParam("batal", $batal);
            $statement->bindParam("id", $id);
            $result = $statement->execute();



        }
    }
}
?>