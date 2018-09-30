<?php
function get_total_all_records()
{
	include('../table_barang/db.php');
	$statement = $connection->prepare(
        "SELECT id, id_role, username, email, tgl_dibuat, telepon, alamat 
        FROM users FULL JOIN users_profile USING(id)"
        );
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>