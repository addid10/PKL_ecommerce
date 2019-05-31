<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');
	
	if(isset($_POST["id"])) {
		$id		   = $_POST['id'];
		$hasilData = array();
		$statement = $connection->prepare(
			"SELECT * FROM barang WHERE id_barang=:id"
		);
		$statement->bindParam("id", $id);
		$statement->execute();
		$result = $statement->fetchAll();
		
		foreach($result as $row) {
			
			$hasilData["nama_barang"]       = $row["nama_barang"];
			$hasilData["harga"]    			= $row["harga"];
			$hasilData["keterangan"]        = $row["keterangan"];
			$hasilData["merk_barang"]       = $row["merk_barang"];

			if($row["foto"] != '')
			{
				$hasilData["foto"] = 
				'<img src="../../assets/images/product/'.$row["foto"].'" class="img-thumbnail" width="150">
				<input type="hidden" name="hiddenFoto" value="'.$row["foto"].'">';
			}
			else
			{
				$hasilData['foto'] = '
				<img src="../../assets/images/product/noimage.png" class="img-thumbnail" width="150">
				<input type="hidden" name="hiddenFoto" value="">';
			}
		}
		echo json_encode($hasilData);
	}
}
?>