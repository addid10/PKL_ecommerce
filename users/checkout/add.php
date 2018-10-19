<?php
session_start();
require_once('../database/db.php');

if(isset($_SESSION['_username'])){

    $tanggal       = date('y-m-d');
    $id_user       = $_POST['id'];
    $totalBarang   = $_POST['total_barang'];
    $totalHarga    = $_POST['total_harga'];
    $statusBarang  = "Proses";
    $statusBayar   = "Menunggu";
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $waktu         = date('H:i:s');
    $statusKirim   = $_POST['status_kirim'];
    $statusBaca    = 1;
    $bank          = $_POST['bank'];

    $statementBeli = $connection->prepare(
        "INSERT INTO transaksi_pembelian(tanggal_transaksi, id_users, total_barang, total_harga, status_barang, 
                     status_beli, waktu_transaksi, status_baca, status_kirim, bank) 
             VALUES (:_tanggal, :_idUser, :_totalBarang, :_totalHarga, :_statusBarang, :_statusBayar, 
                     :_waktuTransaksi, :_statusBaca, :_statusKirim, :_bank)"
    ); 

    $statementBeli->bindParam("_tanggal",$tanggal);
    $statementBeli->bindParam("_idUser",$id_user);
    $statementBeli->bindParam("_totalBarang",$totalBarang);
    $statementBeli->bindParam("_totalHarga",$totalHarga);
    $statementBeli->bindParam("_statusBarang",$statusBarang);
    $statementBeli->bindParam("_statusBayar",$statusBayar);
    $statementBeli->bindParam("_waktuTransaksi",$waktu);
    $statementBeli->bindParam("_statusKirim",$statusKirim);
    $statementBeli->bindParam("_statusBaca",$statusBaca);
    $statementBeli->bindParam("_bank",$bank);
    $result = $statementBeli->execute();


    if($result){
        $statementTampil = $connection->prepare(
            "SELECT * FROM transaksi_pembelian WHERE waktu_transaksi=:_waktuTransaksi"
        );
        $statementTampil->bindParam("_waktuTransaksi",$waktu);

        $tampilData = $statementTampil->fetch();
        $idTrans    = $tampilData['id_transaksi_pembelian'];

        $statementDetail = $connection->prepare(
            "INSERT INTO detail_transaksi_pembelian (id_transaksi_pembelian, id_barang, jumlah)
            SELECT :_idTransaksi, id_barang, kuantitas FROM cart_item"
        );

        $statementDetail->bindParam("_idTransaksi", $idTrans);
        $hasil = $statementDetail->execute();

        if($hasil){
            echo 'Berhasil!';
            $statementDelete = $connection->prepare(
                "DELETE FROM cart_item WHERE id_users=:_idUser"
            );
            $statementDelete->bindParam("_idUser", $id_user);
            $statementDelete->execute();
        }

    }

    
    
    
}



?>