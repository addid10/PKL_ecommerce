<?php 
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    if(isset($_SESSION['username_member']) && isset($_SESSION['user_id'])) {
        require_once('../database/db.php');
        $id = $_SESSION['user_id'];
        
        $statement = $connection->prepare(
            "SELECT * FROM users_profile WHERE id=:id"
        );
        $statement->bindParam("id", $id); 
        $statement->execute();
        $hasil = $statement->fetch();
        
        $telepon = $hasil['telepon'];
        $alamat  = $hasil['alamat'];
        $kodepos = $hasil['kode_pos'];
        
        if(empty($telepon) || empty($alamat) || empty($kodepos)){
            echo 'block';
        } else {
            echo 'none';
        }
            
    }
}
?>