<?php
    $batal = $connection->prepare(
        "SELECT * FROM transaksi_pembelian JOIN users on id_users=id 
        WHERE username=:username AND status_barang='Dibatalkan'"
    );
    $batal->bindParam('username', $username);
    $batal->execute();
    $resultBatal = $batal->fetchAll(PDO::FETCH_OBJ);
?>