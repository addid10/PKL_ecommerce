<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
	require_once('function.php');

	$lihatPesan  = '';
	$hasilPesan  = array();
	$lihatPesan .= "SELECT * FROM pesan ";

	if(isset($_POST["search"]["value"])) {
		$lihatPesan .= 'WHERE nama RLIKE :search ';
		$lihatPesan .= 'OR email  RLIKE :second_search ';
	}

	if(isset($_POST["order"])) {
		$lihatPesan .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
	} else {
		$lihatPesan .= 'ORDER BY id_pesan ASC ';
	}
	
	if($_POST["length"] != -1) {
		$lihatPesan .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	}


	$statement = $connection->prepare($lihatPesan);
	$statement->bindParam("search", $_POST["search"]["value"]);
	$statement->bindParam("second_search", $_POST["search"]["value"]);
	$statement->execute();
	$result    = $statement->fetchAll();
	$data      = array();
	$filtered_rows = $statement->rowCount();
	foreach($result as $row)
	{
		$sub_array = array();
		$sub_array[] = $row["id_pesan"];
		$sub_array[] = $row["nama"];
		$sub_array[] = $row["email"];
		$sub_array[] = $row["subjek"];
		$sub_array[] = $row["pesan"];
		$data[] = $sub_array;
	}
	$hasilPesan = array(
		"draw"				=>	intval($_POST["draw"]),
		"recordsTotal"		=> 	$filtered_rows,
		"recordsFiltered"	=>	get_total_all_records(),
		"data"				=>	$data
	);
	echo json_encode($hasilPesan);
}

?>


