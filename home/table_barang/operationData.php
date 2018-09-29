<?php
include('db.php');
include('function.php');

if(isset($_POST["operation"]))
{
    $sub_kategori = $_POST['id_sub_kategori'];
    $nama_barang  = $_POST['nama_barang'];
    $harga        = $_POST['harga'];
    $keterangan   = $_POST['keterangan'];
    $merk_barang  = $_POST['merk_barang'];
    $id_barang    = $_POST['id_barang'];

	//Add
	if($_POST["operation"] == "Add")
	{
        
		$image = '';
		if($_FILES["foto"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare(
		"INSERT INTO barang (id_sub_kategori, nama_barang, harga, keterangan, foto, merk_barang) 
        VALUES (:id_sub_kategori, :nama_barang, :harga, :keterangan, :foto, :merk_barang)
        ");

        $statement->bindParam("id_sub_kategori", $sub_kategori);
        $statement->bindParam("nama_barang", $nama_barang);
        $statement->bindParam("harga", $harga);
        $statement->bindParam("keterangan", $keterangan);
        $statement->bindParam("merk_barang", $merk_barang);
        $statement->bindParam("foto", $image);
        $result = $statement->execute();

		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}

	//Edit
	if($_POST["operation"] == "Edit")
	{
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
			id_sub_kategori  = :id_sub_kategori, 
			nama_barang	     = :nama_barang, 
			harga 	         = :harga,
			keterangan       = :keterangan,
			foto             = :foto,
			merk_barang      = :merk_barang
			WHERE id_barang  = :_idBarang"
        );
        
        $statement->bindParam("_idBarang", $id_barang);
        $statement->bindParam("id_sub_kategori", $sub_kategori);
        $statement->bindParam("nama_barang", $nama_barang);
        $statement->bindParam("harga", $harga);
        $statement->bindParam("keterangan", $keterangan);
        $statement->bindParam("merk_barang", $merk_barang);
        $statement->bindParam("foto", $image);
        $result = $statement->execute();
        
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>