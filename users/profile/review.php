<?php
session_start();
require_once('../database/db.php');

if(isset($_SESSION['_username'])){
    if(isset($_POST['id'])){

        $id     = $_POST['id'];
        $rating = $_POST['rating'];
        $isi    = $_POST['review'];

        $statement = $connection->prepare(
            "INSERT INTO review (id_transaksi_pembelian, rating, review)
            VALUES (:_id, :_rating, :_isi)"
        );

        $statement->bindParam("_isi", $isi);
        $statement->bindParam("_rating", $rating);
        $statement->bindParam("_id", $id);
        $result = $statement->execute();



    }
}
?>