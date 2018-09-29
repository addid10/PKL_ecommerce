<?php
require('db.php');
require("functionData.php");

if(isset($_POST["id_barang"]))
{
    $image     = get_image_name($_POST["id_barang"]);
    $id_barang = $_POST["id_barang"];



	if($image != '')
	{
		unlink("upload/".$image);
	}
	$statement = $connection->prepare(
		"DELETE FROM barang WHERE id_barang=:_idBarang"
    );
    $statement->bindParam("_idBarang", $id_barang);
	$result = $statement->execute();
}



?>