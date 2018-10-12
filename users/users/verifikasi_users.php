<?php
require('../database/db.php');

if(isset($_POST['kode'])){
    $kode   = $_POST['kode'];
    $status = 1;

    $validasi = $connection->prepare(
        "SELECT * FROM users WHERE remember_token=:_kode"
    );

    $validasi->bindParam("_kode",$kode);
    $validasi->execute();
    $row = $validasi->fetch();

    $id       = $row['id'];
    $kodeBaru = $row['remember_token'];

    if($kodeBaru==$kode){
        $statement = $connection->prepare(
            "UPDATE users SET 
            status_aktif = :_status
            WHERE id     = :_idUsers"
        );
        
        $statement->bindParam("_idUsers", $id);
        $statement->bindParam("_status", $status);

        $result = $statement->execute();
        header('location: login.php?_status=Akun telah berhasil diverifikasi!');
    }
    else{
        header('location: verifikasi.php?_kode=Kode Verifikasi Salah!');
    }
}

        
?>