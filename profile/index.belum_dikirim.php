<?php
    $belumDikirim = $connection->prepare(
        "SELECT * FROM transaksi_pembelian JOIN users on id_users=id 
        WHERE username=:username AND status_beli='Terbayar' AND status_kirim='Pengiriman'"
    );
    $belumDikirim->bindParam('username', $username);
    $belumDikirim->execute();
    $resultKirim = $belumDikirim->fetchAll(PDO::FETCH_OBJ);
?>