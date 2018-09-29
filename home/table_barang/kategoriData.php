<?php
require('db.php');

if(isset($_POST["id_kategori"]))
{
    $kategori = $_POST['id_kategori'];

    $hasilKategori = '';
    $statement = $connection->prepare(
        "SELECT * FROM sub_kategori 
        WHERE id_kategori=:_idKategori 
        ORDER BY sub_kategori"
    );
    $statement->bindParam("_idKategori",$kategori);
	$statement->execute();
	$result    = $statement->fetchAll(PDO::FETCH_OBJ);

	foreach ($result as $data){
		$hasilKategori .= '<option value="'.$data->id_sub_kategori.'">'.$data->sub_kategori.'</option>';
	}
	echo $hasilKategori;
}
?>