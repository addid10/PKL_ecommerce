<?php
include('../database/db.php');
include('function.php');

if(isset($_POST["nama"]) && isset($_POST["telepon"]) && isset($_POST["alamat"]) && isset($_POST["gender"]))
{
    $nama     = $_POST['nama'];
    $telepon  = $_POST['telepon'];
    $alamat   = $_POST['alamat'];
    $gender   = $_POST['gender'];
    $id       = $_POST['id'];

	$image = '';
    if($_FILES["foto"]["name"] != '')		
    {
        $image = upload_image();		
    }
    else
    {
		$image = $_POST["hidden_foto"];
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
			header('location: index.php?status=Data berhasil diperbaharui!');
		}
}

?>