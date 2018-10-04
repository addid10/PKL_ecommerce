<?php
require('../table_barang/db.php');

if(isset($_POST["id_transaksi_pembelian"]))
{
	$id_trans  = $_POST['id_transaksi_pembelian'];
	$hasilData = array();
	$statement = $connection->prepare(
		"SELECT * FROM transaksi_pembelian WHERE id_transaksi_pembelian=:_idTrans"
	);
    $statement->bindParam("_idTrans",$id_trans);
    $statement->execute();
    $result = $statement->fetchAll();
    
	foreach($result as $row)
	{
		$hasilData["status_barang"]     		= $row["status_barang"];
		$hasilData["status_beli"]    			= $row["status_beli"];
    }
    
	echo json_encode($hasilData);
}
?>