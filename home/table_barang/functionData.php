<?php

function upload_image()
{
	if(isset($_FILES["foto"]))
	{
		$extension = explode('.', $_FILES['foto']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['foto']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($id_barang)
{
	include('db.php');
	$statement = $connection->prepare("SELECT foto FROM barang WHERE id_barang=:_idBarang");
    $statement->execute();
    $statement->bindParam('_idBarang',$id_barang);
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

?>