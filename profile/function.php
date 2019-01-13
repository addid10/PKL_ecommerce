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
				$folder = '../assets/images/user/';
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


function upload_proff() {
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
				$folder = '../assets/images/bukti/';
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
?>