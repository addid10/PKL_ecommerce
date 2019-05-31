<?php
    require_once('../database/db.php');
    $username = $_SESSION['username_member'];
    $belumBayar = $connection->prepare(
        "SELECT * FROM transaksi_pembelian JOIN users on id_users=id
        WHERE username=:username AND status_beli='Menunggu' AND status_barang='Proses'"
    );
    $belumBayar->bindParam('username', $username);
    $belumBayar->execute();
    $result = $belumBayar->fetchAll(PDO::FETCH_OBJ);
?>