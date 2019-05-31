<?php

function upload_image() {
	if(isset($_FILES["foto"])) {  
		$bytes = 1024;
		$KB = 1024;
		$totalBytes = $bytes * $KB;
		
		$upload = true;
					
		if($_FILES["foto"]["size"] > $totalBytes) {
			$upload = false;
		}
		if($upload == true) {
		    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
			if($ext=="png" || $ext=="jpeg" || $ext=="jpg"){
				$folder = '../../assets/images/product/';
				$newImage = rand() . '.' . $ext;
				$destination = $folder . $newImage;
				move_uploaded_file($_FILES['foto']['tmp_name'], $destination);
				
				//Convert
				$resizeImage = rand() . '.' . $ext;
				$resize = $folder . $resizeImage;
				list($width, $height) = getimagesize($destination);
				$const = 1;
				$newWidth = $width / $const;
				$newHeight = $height / $const;

				$thumb = imagecreatetruecolor($newWidth, $newHeight);

				if($ext == "png") {
					$source  = imagecreatefrompng($destination);
					imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
				} else {
					$source = imagecreatefromjpeg($destination);
					imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
				}
				imagejpeg($thumb, $resize);
				imagedestroy($thumb);
				imagedestroy($source);

				unlink($destination);
				
				return $resizeImage;
			}
		} else {
			return '';
		}
	}
}
 
function get_image_name($id) {
	require('../database/db.php');
	$statement = $connection->prepare("SELECT foto FROM barang WHERE id_barang=:id");
    $statement->bindParam('id',$id);
    $statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["foto"];
	}
}

function get_total_all_records() {
	require('../database/db.php');
	$statement = $connection->prepare("SELECT * FROM barang");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function load_kategori()  {
	require('../database/db.php');
	$hasilKategori = '';
	
	$statement = $connection->prepare("SELECT * FROM kategori ORDER BY kategori");
	$statement->execute();
	$result    = $statement->fetchAll(PDO::FETCH_OBJ);

	foreach ($result as $data){
		$hasilKategori .= '<option value="'.$data->id_kategori.'">'.$data->kategori.'</option>';
	}
	return $hasilKategori;
}

function load_supplier()  {
	require('../database/db.php');
	$hasilKategori = '';
	$statement = $connection->prepare("SELECT * FROM supplier ORDER BY nama");
	$statement->execute();
	$result    = $statement->fetchAll(PDO::FETCH_OBJ);

	foreach ($result as $data){
		$hasilKategori .= '<option value="'.$data->id_supplier.'">'.$data->nama.'</option>';
	}
	return $hasilKategori;

}
?>