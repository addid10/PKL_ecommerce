<?php 
function upload_image()
{
	if(isset($_FILES["foto"]))
	{
		$extension = explode('.', $_FILES['foto']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = '../assets/images/user/' . $new_name;
		move_uploaded_file($_FILES['foto']['tmp_name'], $destination);
		return $new_name;
	} 
}
?>