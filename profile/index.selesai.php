<?php
    $selesai = $connection->prepare(
        "SELECT * FROM transaksi_pembelian JOIN users on id_users=id LEFT JOIN review USING (id_transaksi_pembelian)
        WHERE username=:username AND status_beli='Terbayar' AND status_barang='Selesai'"
    );
    $selesai->bindParam('username', $username);
    $selesai->execute();
    $resultSelesai = $selesai->fetchAll(PDO::FETCH_OBJ);
?>