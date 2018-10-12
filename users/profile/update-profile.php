<?php
include('../database/db.php');
include('function.php');

if(isset($_POST["nama"]) && isset($_POST["telepon"]) && isset($_POST["alamat"]) && isset($_POST["gender"]))
{
    $nama      = $_POST['nama'];
    $telepon   = $_POST['telepon'];
    $alamat    = $_POST['alamat'];
    $gender    = $_POST['gender'];
    $id        = $_POST['id'];
    $hidden_id = $_POST['hidden_id'];
    
    $image    = '';
    if($_FILES["foto"]["name"] != '')		
    {
        $image = upload_image();	
        $hidden_image = $_POST["hidden_foto"];	
    }
    else
    {
		$image = $_POST["hidden_foto"];
        $hidden_image = $_POST["hidden_foto"];
    }
    
    
    $validasi  = $connection->prepare(
        "SELECT COUNT('id') from users_profile where id =  :_id"
    );

    $validasi->bindParam("_id", $hidden_id);
    $validasi->execute();
    $count = $validasi->fetchColumn();

    if($count == 1){
        if($image != $hidden_image)
        {
            unlink("../assets/images/user/".$hidden_image);
        }

        $statement = $connection->prepare(
            "UPDATE users_profile SET 
            nama_users	     = :_nama, 
            telepon          = :_telepon,
            alamat           = :_alamat,
            foto             = :_foto,
            jenis_kelamin    = :_gender
            WHERE id_users   = :_id"
        );
        
        $statement->bindParam("_id", $id);
        $statement->bindParam("_nama", $nama);
        $statement->bindParam("_telepon", $telepon);
        $statement->bindParam("_alamat", $alamat);
        $statement->bindParam("_gender", $gender);
        $statement->bindParam("_foto", $image);
        $result = $statement->execute();
        
		if(!empty($result))
		{
			header('location: akun.php?sukses=Data berhasil diperbaharui!');
        }
        else{
            header('location: akun.php?gagal=Data Gagal diperbaharui!');
        }
    }
    else if($count == 0){
        $statement = $connection->prepare(
            "INSERT INTO users_profile (id, nama_users, telepon, alamat, foto, jenis_kelamin) 
            VALUES (:_id, :_nama, :_telepon, :_alamat, :_foto, :_gender)"
        );

        $statement->bindParam("_id", $hidden_id);
        $statement->bindParam("_nama", $nama);
        $statement->bindParam("_telepon", $telepon);
        $statement->bindParam("_alamat", $alamat);
        $statement->bindParam("_gender", $gender);
        $statement->bindParam("_foto", $image);
        $result = $statement->execute();

        if(!empty($result))
		{
			header('location: akun.php?sukses=Data berhasil diperbaharui!');
        }
        else{
            header('location: akun.php?gagal=Data Gagal diperbaharui!');
        }
    }
}

?>