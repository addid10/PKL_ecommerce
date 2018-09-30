<?php
require('../table_barang/db.php');
require('functionData.php');

if(isset($_POST["updateOperation"]))
{
    $status_barang = $_POST['status_barang'];
    $status_beli   = $_POST['status_beli'];
    $trans_beli    = $_POST['id_transaksi_pembelian'];

	//Edit
	if($_POST["updateOperation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE transaksi_pembelian SET 
			status_beli	     = :_statusBeli, 
			status_barang 	 = :_statusBarang
			WHERE id_transaksi_pembelian=:_idTrans"
        );
        
        $statement->bindParam("_statusBeli", $status_beli);
        $statement->bindParam("_statusBarang", $status_barang);
        $statement->bindParam("_idTrans", $trans_beli);
        $result = $statement->execute();
        
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>