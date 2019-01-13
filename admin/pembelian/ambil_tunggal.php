<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
	if(isset($_POST["id"])) {
		$id  = $_POST['id'];
		$hasilData = array();
		$statement = $connection->prepare(
			"SELECT * FROM transaksi_pembelian WHERE id_transaksi_pembelian=:id"
		);
		$statement->bindParam("id",$id);
		$statement->execute();
		$result = $statement->fetchAll();
		
		foreach($result as $row) {
			$hasilData["status_barang"]	= $row["status_barang"];
			$hasilData["status_beli"]	= $row["status_beli"];
		}
		
		echo json_encode($hasilData);
	}
}
?>