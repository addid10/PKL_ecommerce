<?php
    $belumDiterima = $connection->prepare(
        "SELECT * FROM transaksi_pembelian JOIN users on id_users=id
        WHERE username=:username AND status_beli='Terbayar' AND status_barang='Proses'"
    );
    $belumDiterima->bindParam('username', $username);
    $belumDiterima->execute();
    $resultTerima = $belumDiterima->fetchAll(PDO::FETCH_OBJ);
?>