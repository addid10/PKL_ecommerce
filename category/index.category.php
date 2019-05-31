<?php 
    require_once('../database/db.php');
    $search = addslashes($_GET['q']);
    
	$statement = $connection->prepare(
        "SELECT * FROM barang JOIN sub_kategori USING(id_sub_kategori) WHERE status_barang=1 AND sub_kategori=:search"
    );
    $statement->bindParam("search", $search);
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_OBJ);
?>