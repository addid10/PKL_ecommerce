<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token']===$_SESSION['csrf_token']) {
    require_once('../database/db.php');
 
    if(isset($_SESSION['username_member'])){
        if(isset($_POST['id']) && isset($_POST['jumlah_barang'])) {
            require_once('function.php');
            date_default_timezone_set('Asia/Kuala_Lumpur');

            $id            = $_POST['id'];
            $totalBayar    = get_total_harga($id);
            $totalBarang   = $_POST['jumlah_barang'];
            $waktu         = date('H:i:s');
            $statusKirim   = $_POST['status_kirim'];
            $statusBarang  = "Proses";
            $statusBayar   = "Menunggu";
            $statusBaca    = 1;
            $tanggal       = date('y-m-d');
            $userId        = $_SESSION['user_id'];
            $bank          = $_POST['bank'];
    
            $beli = $connection->prepare(
                "INSERT INTO transaksi_pembelian(tanggal_transaksi, id_users, total_barang, total_harga, status_barang, 
                            status_beli, waktu_transaksi, status_baca, status_kirim, bank_id) 
                    VALUES (:tanggal, :id_user, :jumlah, :total, :status_barang, :status_bayar, 
                            :waktu, :status_baca, :status_kirim, :bank)"
            ); 
    
            $beli->bindParam("tanggal", $tanggal);
            $beli->bindParam("id_user", $userId);
            $beli->bindParam("jumlah", $totalBarang);
            $beli->bindParam("total", $totalBayar);
            $beli->bindParam("status_barang", $statusBarang);
            $beli->bindParam("status_bayar", $statusBayar);
            $beli->bindParam("waktu", $waktu);
            $beli->bindParam("status_kirim", $statusKirim);
            $beli->bindParam("status_baca", $statusBaca);
            $beli->bindParam("bank", $bank);
            $result = $beli->execute();
    
    
            if(!empty($result)){
                $transId = $connection->lastInsertId();

                $detail = $connection->prepare(
                    "INSERT INTO detail_transaksi_pembelian (id_transaksi_pembelian, id_barang, jumlah_barang)
                    SELECT :id_trans, id_barang, kuantitas FROM cart_item WHERE id_cart=:id"
                );
    
                $detail->bindParam("id_trans", $transId);
                $detail->bindParam("id", $id);
                $hasil = $detail->execute();
    
                if(!empty($hasil)){
                    $delete = $connection->prepare(
                        "DELETE FROM cart_item WHERE id_cart=:id; 
                        DELETE FROM cart WHERE id_cart=:ids"
                    );
                    $delete->bindParam("id", $id);
                    $delete->bindParam("ids", $id);
                    $delete->execute();
                }
    
            }

        }
    }   
}



?>