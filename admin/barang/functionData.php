<?php

function upload_image()
{
	if(isset($_FILES["foto"]))
	{
		$extension = explode('.', $_FILES['foto']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = 'upload/' . $new_name;
		move_uploaded_file($_FILES['foto']['tmp_name'], $destination);
		return $new_name;
	}
}
 
function get_image_name($id_barang)
{
	include('db.php');
	$statement = $connection->prepare("SELECT foto FROM barang WHERE id_barang=:_idBarang");
    $statement->bindParam('_idBarang',$id_barang);
    $statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["foto"];
	}
}

function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM barang");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function load_kategori() 
{
	require('db.php');
	$hasilKategori = '';
	
	$statement = $connection->prepare("SELECT * FROM kategori ORDER BY kategori");
	$statement->execute();
	$result    = $statement->fetchAll(PDO::FETCH_OBJ);

	foreach ($result as $data){
		$hasilKategori .= '<option value="'.$data->id_kategori.'">'.$data->kategori.'</option>';
	}
	return $hasilKategori;
}

function load_supplier() 
{
	require('db.php');
	$hasilKategori = '';
	$statement = $connection->prepare("SELECT * FROM supplier ORDER BY nama");
	$statement->execute();
	$result    = $statement->fetchAll(PDO::FETCH_OBJ);

	foreach ($result as $data){
		$hasilKategori .= '<option value="'.$data->id_supplier.'">'.$data->nama.'</option>';
	}
	return $hasilKategori;

}
?>