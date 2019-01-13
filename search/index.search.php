<?php 
    require_once('../database/db.php');
    $search = addslashes($_GET['q']);
    
	$statement = $connection->prepare(
        "SELECT * FROM barang WHERE status_barang=1 AND nama_barang RLIKE :search"
    );
    $statement->bindParam("search", $search);
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_OBJ);
?>