<?php
function get_total_all_records()
{
	include('../table_barang/db.php');
	$statement = $connection->prepare(
        "SELECT * FROM transaksi_pembelian"
        );
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>