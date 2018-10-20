<?php
session_start();
require_once('../database/db.php');

function upload_image()
{
	if(isset($_FILES["foto"]))
	{
		$extension = explode('.', $_FILES['foto']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = '../assets/images/bukti/' . $new_name;
		move_uploaded_file($_FILES['foto']['tmp_name'], $destination);
		return $new_name;
	} 
}

if(isset($_SESSION['_username'])){
    if(isset($_POST['id'])){

        $image = '';
		if($_FILES["foto"]["name"] != '')
		{
			$image = upload_image();
        }
        
        $id        = $_POST['id'];

        $statement = $connection->prepare(
            "UPDATE transaksi_pembelian SET
            bukti_pembayaran=:_foto
            WHERE id_transaksi_pembelian=:_id"
        );

        $statement->bindParam("_foto", $image);
        $statement->bindParam("_id", $id);
        $result = $statement->execute();



    }
}
?>