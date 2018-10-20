<?php
require_once('../database/db.php');


    $tanggal       = date('y-m-d');
    $statementBeli = $connection->prepare(
        "INSERT INTO transaksi_pembelian(tanggal_transaksi) 
             VALUES (:_tanggal)"
    ); 

    $statementBeli->bindParam("_tanggal",$tanggal);
    $result = $statementBeli->execute();



        $idTrans    = $connection->lastInsertId();

        echo $idTrans;



?>