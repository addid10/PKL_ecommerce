<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
	require_once('function.php');

	$lihatPembelian  = '';
	$pembelian  = array();
	$lihatPembelian .= "SELECT * FROM transaksi_pembelian t JOIN users_profile ON t.id_users=id WHERE status_barang IN('Proses','Selesai', 'Dibatalkan') ";

	if(isset($_POST["search"]["value"])) {
		$lihatPembelian .= 'AND (tanggal_transaksi RLIKE :search ';
		$lihatPembelian .= 'OR status_beli RLIKE :second_search ';
		$lihatPembelian .= 'OR status_barang RLIKE :third_search) ';
	}

	if(isset($_POST["order"])) {
		$lihatPembelian .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
	} else {
		$lihatPembelian .= 'ORDER BY tanggal_transaksi DESC ';
	}

	if($_POST["length"] != -1) {
		$lihatPembelian .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	}


	$statement = $connection->prepare($lihatPembelian);
	$statement->bindParam("search", $_POST["search"]["value"]);
	$statement->bindParam("second_search", $_POST["search"]["value"]);
	$statement->bindParam("third_search", $_POST["search"]["value"]);
	$statement->execute();
	$result    = $statement->fetchAll();
	$data      = array();
	$filtered_rows = $statement->rowCount();

	foreach($result as $row) {
		$sub_array = array();
		$sub_array[] = $row["nama_users"];
		$sub_array[] = $row["tanggal_transaksi"];
		$sub_array[] = '<label class="label label-primary">'.$row["status_barang"].'</label>';
		$sub_array[] = '<label class="label label-primary">'.$row["status_kirim"].'</label>';
		$sub_array[] = 'Rp. '.number_format($row["total_harga"],0,'.','.');
		$sub_array[] = '<label class="label label-primary">'.$row["status_beli"].'</label>';
		$sub_array[] = '<button type="button" id="'.$row["id_transaksi_pembelian"].'" class="btn btn-warning update">Update</button>';
		$sub_array[] = '<button type="button" id="'.$row["id_transaksi_pembelian"].'" class="btn btn-info detail">Detail</button>';
		$sub_array[] = '<button type="button" id="'.$row["id_transaksi_pembelian"].'" class="btn btn-primary view-bukti">Bukti</button>';
		$data[] = $sub_array;
	}
	$pembelian = array(
		"draw"				=>	intval($_POST["draw"]),
		"recordsTotal"		=> 	$filtered_rows,
		"recordsFiltered"	=>	get_total_all_records(),
		"data"				=>	$data
	);
	echo json_encode($pembelian);
}
?>



