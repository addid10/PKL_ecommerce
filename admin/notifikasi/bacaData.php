<?php
require('../table_barang/db.php');
require('functionData.php');

if(isset($_POST["id_trans"]))
{
    $id_trans    = $_POST["id_trans"];
    $status_baca = '0';

	$statement = $connection->prepare(
		"UPDATE transaksi_pembelian SET 
        status_baca                  = :_statusBaca
        WHERE id_transaksi_pembelian = :_idTrans"
    );
    $statement->bindParam("_idTrans", $id_trans);
    $statement->bindParam("_statusBaca", $status_baca);
	$statement->execute();
}

?>