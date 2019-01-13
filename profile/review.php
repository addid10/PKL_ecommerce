<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token']===$_SESSION['csrf_token']) {
    require_once('../database/db.php');
    if(isset($_SESSION['username_member'])){
        if(isset($_POST['id'])){

            $id     = $_POST['id'];
            $rating = $_POST['rating'];
            $isi    = $_POST['review'];

            $statement = $connection->prepare(
                "INSERT INTO review (id_transaksi_pembelian, rating, review)
                VALUES (:id, :rating, :isi)"
            );

            $statement->bindParam("isi", $isi);
            $statement->bindParam("rating", $rating);
            $statement->bindParam("id", $id);
            $result = $statement->execute();



        }
    }
}
?>