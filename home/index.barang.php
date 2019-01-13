<?php 
	require_once('../database/db.php');
	$statement = $connection->prepare(
		"SELECT * FROM barang WHERE status_barang=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_OBJ);
?>