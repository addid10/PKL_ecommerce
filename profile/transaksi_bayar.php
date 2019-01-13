<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token']===$_SESSION['csrf_token']) {
    require_once('../database/db.php');
    require_once('function.php');
    if(isset($_SESSION['username_member'])){
        if(isset($_POST['id'])){
            $id     = $_POST['id'];
            $image  = '';

            if($_FILES["foto"]["name"] != '') {
                $image = upload_proff();
            }

            $statement = $connection->prepare(
                "UPDATE transaksi_pembelian SET
                bukti_pembayaran=:image
                WHERE id_transaksi_pembelian=:id"
            );

            $statement->bindParam("image", $image);
            $statement->bindParam("id", $id);
            $statement->execute();
        }
    }
}
?>