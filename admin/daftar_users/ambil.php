<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
	require_once('function.php');

	$lihatUsers  = '';
	$hasilUsers  = array();
	$lihatUsers .= "SELECT * FROM users LEFT JOIN users_profile USING(id) ";

	if(isset($_POST["search"]["value"])) {
		$lihatUsers .= 'WHERE username LIKE "%'.$_POST["search"]["value"].'%" ';
		$lihatUsers .= 'OR alamat LIKE "%'.$_POST["search"]["value"].'%" ';
	}

	if(isset($_POST["order"])) {
		$lihatUsers .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
	}
	else {
		$lihatUsers .= 'ORDER BY id_role AND id_users DESC ';
	}
	
	if($_POST["length"] != -1)
	{
		$lihatUsers .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	}


	$statement = $connection->prepare($lihatUsers);
	$statement->execute();
	$result    = $statement->fetchAll();
	$data      = array();
	$filtered_rows = $statement->rowCount();
	foreach($result as $row)
	{
		$sub_array = array();
		$sub_array[] = $row["id"];
		$sub_array[] = $row["username"];
		if($row["id_role"]==1){
			$sub_array[] = '<label class="label label-danger">Admin</label>';
		}
		else{
			$sub_array[] = '<label class="label label-info">User</label>';
		}
		$tgl_dibuat  = $row["tgl_dibuat"];
		$bergabung   = date("jS M Y", strtotime("$tgl_dibuat"));
		$sub_array[] = $bergabung;
		$sub_array[] = $row["email"];
		$sub_array[] = $row["telepon"];
		$sub_array[] = $row["alamat"];
		$data[] = $sub_array;
	}
	$hasilUsers = array(
		"draw"				=>	intval($_POST["draw"]),
		"recordsTotal"		=> 	$filtered_rows,
		"recordsFiltered"	=>	get_total_all_records(),
		"data"				=>	$data
	);
	echo json_encode($hasilUsers);
}

?>


