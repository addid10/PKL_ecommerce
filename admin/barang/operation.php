<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
	require_once('function.php');
	if(isset($_POST["operation"])) {

		$kategori   = $_POST['sub_kategori'];
		$nama       = $_POST['nama_barang'];
		$harga      = $_POST['harga'];
		$keterangan = $_POST['keterangan'];
		$merk  		= $_POST['merk_barang'];
		$id    		= $_POST['id_barang'];
		$supplier   = $_POST['supplier'];
		$status     = 1;

		//Add
		if($_POST["operation"] == "Add")
		{
			
			$image = '';
			if($_FILES["foto"]["name"] != '')
			{
				$image = upload_image();
			}
			$statement = $connection->prepare(
			"INSERT INTO barang (id_sub_kategori, nama_barang, harga, keterangan, foto, merk_barang, id_supplier, status_barang) 
			VALUES (:id_sub_kategori, :nama_barang, :harga, :keterangan, :foto, :merk_barang, :supplier, :status)
			");

			$statement->bindParam("id_sub_kategori", $kategori);
			$statement->bindParam("supplier", $supplier);
			$statement->bindParam("nama_barang", $nama);
			$statement->bindParam("harga", $harga);
			$statement->bindParam("keterangan", $keterangan);
			$statement->bindParam("merk_barang", $merk);
			$statement->bindParam("foto", $image);
			$statement->bindParam("status", $status);
			$result = $statement->execute();

			if(!empty($result))
			{
				echo 'Data Inserted';
			}
		}

		//Edit
		if($_POST["operation"] == "Edit") {

			$image = '';

			if($_FILES["foto"]["name"] != '') {
				$image = upload_image();
				$oldImage = get_image_name($id);

				if($image != $oldImage) {
					unlink('../../assets/images/product/'.$oldImage);
				}
				
			} else {
				$image = $_POST["hiddenFoto"];
			}

			$statement = $connection->prepare(
				"UPDATE barang SET 
				nama_barang	     = :nama, 
				harga 	         = :harga,
				keterangan       = :keterangan,
				foto             = :foto,
				merk_barang      = :merk
				WHERE id_barang  = :id"
			);
			
			$statement->bindParam("id", $id);
			$statement->bindParam("nama", $nama);
			$statement->bindParam("harga", $harga);
			$statement->bindParam("keterangan", $keterangan);
			$statement->bindParam("merk", $merk);
			$statement->bindParam("foto", $image);
			$result = $statement->execute();
			
			if(!empty($result)) {
				echo 'Data Updated';
			}
		}
	}
}
?>