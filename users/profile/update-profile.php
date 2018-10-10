<?php
include('db.php');
include('functionData.php');

if(isset($_POST["operation"]))
{
    $nama     = $_POST['nama'];
    $telepon  = $_POST['telepon'];
    $alamat   = $_POST['alamat'];
    $gender   = $_POST['gender'];
    $foto     = $_POST['foto'];

	$image = '';
    if($_FILES["foto"]["name"] != '')		
    {
        $image = upload_image();		
    }
    else
    {
		$image = $_POST["hiddenFoto"];
	}
	$statement = $connection->prepare(
		"UPDATE barang SET 
		nama_barang	     = :nama_barang, 
		harga 	         = :harga,
		keterangan       = :keterangan,
		foto             = :foto,
		merk_barang      = :merk_barang
		WHERE id_barang  = :_idBarang"
    );
        
    $statement->bindParam("_idBarang", $id_barang);
        $statement->bindParam("nama_barang", $nama_barang);
        $statement->bindParam("harga", $harga);
        $statement->bindParam("keterangan", $keterangan);
        $statement->bindParam("merk_barang", $merk_barang);
        $statement->bindParam("foto", $image);
        $result = $statement->execute();
        
		if(!empty($result))
		{
			header('location: index.php?status=Data berhasil diperbaharui!');
		}
}

?>