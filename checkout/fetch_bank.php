<?php
session_start();
if(isset($_POST['csrf_token']) && $_POST['csrf_token']===$_SESSION['csrf_token']) {
    if(isset($_POST['id'])) { 
        require_once('../database/db.php');
        $id = $_POST['id'];
        $data = array();

        $bank = $connection->prepare("SELECT * FROM bank WHERE bank_id=:id");
        $bank->bindParam("id", $id);
        $bank->execute();
        $result = $bank->fetch();
        
        $data['nama'] = $result['nama_akun'];
        $data['rekening'] = $result['nomor_rekening'];

        echo json_encode($data);
    }
}  
?>