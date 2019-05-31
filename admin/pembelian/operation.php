<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');

	if(isset($_POST["status_barang"])) {
			$barang = $_POST['status_barang'];
			$beli   = $_POST['status_beli'];
			$id     = $_POST['id_transaksi_pembelian'];

			$statement = $connection->prepare(
				"UPDATE transaksi_pembelian SET 
				status_beli	     = :beli, 
				status_barang 	 = :barang
				WHERE id_transaksi_pembelian=:id"
			);
			
			$statement->bindParam("beli", $beli);
			$statement->bindParam("barang", $barang);
			$statement->bindParam("id", $id);
			$statement->execute();
	}
}

?>