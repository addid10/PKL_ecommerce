<?php 
    require_once('../database/db.php');
    $categories = $connection->prepare("SELECT * FROM kategori");
    $categories->execute();
    $list = $categories->fetchAll(PDO::FETCH_OBJ);
?>