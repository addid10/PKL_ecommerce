<?php
require('db.php');

if(isset($_POST["id_barang"]))
{
    $id_barang = $_POST["id_barang"];


	$statement = $connection->prepare(
		"UPDATE barang SET status_barang=0 WHERE id_barang=:_idBarang"
    );
    $statement->bindParam("_idBarang", $id_barang);
	$result = $statement->execute();
}



?>