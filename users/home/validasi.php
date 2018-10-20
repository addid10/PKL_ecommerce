<?php 
    require('../database/db.php');

    if(isset($_POST['id'])){

        $id = $_POST['id'];

        $statement = $connection->prepare(
            "SELECT * FROM users LEFT JOIN users_profile USING(id) WHERE id=:_id"
        );
        $statement->bindParam("_id",$id);
        $statement->execute();
        $hasil = $statement->fetch();

        $nama    = $hasil['nama_users'];
        $telepon = $hasil['telepon'];
        $alamat  = $hasil['alamat'];

        if($nama=='' || $telepon=='' || $alamat==''){
            echo 'block';
        }
    }



?>