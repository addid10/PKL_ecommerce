<?php
function get_total_all_records() {
	require('../database/db.php');
	$statement = $connection->prepare(
        "SELECT * FROM transaksi_pembelian WHERE status_barang IN('Proses','Selesai')"
        );
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>