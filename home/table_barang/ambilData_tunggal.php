<?php
include('db.php');
include('functionData.php');
if(isset($_POST["id_barang"]))
{
    $id_barang = $_POSTP['id_barang'];
	$hasilData = array();
	$statement = $connection->prepare(
		"SELECT * FROM barang WHERE id_barang=:_idBarang"
	);
    $statement->execute();
    $statement->bindParam("_idBarang",$id_barang);
    $result = $statement->fetchAll();
    
	foreach($result as $row)
	{
		$hasilData["id_barang"]	        = $row["id_barang"];
		$hasilData["nama_barang"]       = $row["nama_barang"];
		$hasilData["harga"]    			= $row["harga"];
		$hasilData["keterangan"]        = $row["keterangan"];
		$hasilData["merk_barang"]       = $row["merk_barang"];
		
		if($row["foto"] != '')
		{
			$hasilData["foto"] = 
			'<img src="table_barang/upload/'.$row["foto"].'" class="img-thumbnail" width="200" height="150" />
			<input type="hidden" name="hiddenFoto" value="'.$row["foto"].'" />';
		}
		else
		{
			$hasilData['foto'] = '<input type="hidden" name="hiddenFoto" value="" />';
		}
	}
	echo json_encode($hasilData);
}
?>