<?php
function get_total_all_records()
{
	include('../table_barang/db.php');
	$statement = $connection->prepare(
        "SELECT * FROM transaksi_pembelian JOIN users ON id_users=id JOIN users_profile USING(id) WHERE status_baca=1"
        );
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}



?>


                                           