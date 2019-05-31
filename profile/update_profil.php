<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    require_once('../database/db.php');
    require_once('function.php');

    if(isset($_POST["nama"]) && isset($_POST["telepon"]) && isset($_POST["alamat"]) && isset($_POST["gender"])) {
        $nama         = $_POST['nama'];
        $telepon      = $_POST['telepon'];
        $alamat       = $_POST['alamat'];
        $gender       = $_POST['gender'];
        $kodepos      = $_POST['kodepos'];
        $id           = $_POST['id'];
        $image        = '';
        $hiddenImage  = $_POST["hidden_foto"];	

        if($_FILES["foto"]["name"] != '') {
            $image = upload_image();	
        } else  {
            $image = $_POST["hidden_foto"];
        }
        
        $validasi  = $connection->prepare(
            "SELECT COUNT(id) from users_profile where id=:id"
        );

        $validasi->bindParam("id", $id);
        $validasi->execute();
        $count = $validasi->fetchColumn();

        if($count == 1){
            if($image != $hiddenImage) {
                unlink("../assets/images/user/".$hiddenImage);
            }

            $statement = $connection->prepare(
                "UPDATE users_profile SET 
                nama_users	   = :nama, 
                telepon        = :telepon,
                alamat         = :alamat,
                foto           = :foto,
                jenis_kelamin  = :gender,
                kode_pos       = :kodepos
                WHERE id       = :id"
            );
            
            $statement->bindParam("id", $id);
            $statement->bindParam("nama", $nama);
            $statement->bindParam("telepon", $telepon);
            $statement->bindParam("alamat", $alamat);
            $statement->bindParam("gender", $gender);
            $statement->bindParam("kodepos", $kodepos);
            $statement->bindParam("foto", $image);
            $result = $statement->execute();
            
            if(!empty($result)) {
                if(empty($image)) {
                    echo 1;
                } else {
                    echo 2;
                }
            } else {
                echo 0;
            }
        } else if($count == 0){
            $statement = $connection->prepare(
                "INSERT INTO users_profile (id, nama_users, telepon, alamat, foto, jenis_kelamin, kode_pos) 
                VALUES (:id, :nama, :telepon, :alamat, :image, :gender, :kodepos)"
            );

            $statement->bindParam("id", $id);
            $statement->bindParam("nama", $nama);
            $statement->bindParam("telepon", $telepon);
            $statement->bindParam("alamat", $alamat);
            $statement->bindParam("gender", $gender);
            $statement->bindParam("image", $image);
            $statement->bindParam("kodepos", $kodepos);
            $result = $statement->execute();

            if(!empty($result)) {
                echo 2;
            } else{
                echo 0;
            }
        }
    }
}

?>