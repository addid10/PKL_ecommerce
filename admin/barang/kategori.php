<?php
session_start();
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
	require_once('../database/db.php');

    if(isset($_POST["id"])) {
        $id = $_POST['id'];

        $result = '';
        $statement = $connection->prepare(
            "SELECT * FROM sub_kategori WHERE id_kategori=:id ORDER BY sub_kategori"
        );
        $statement->bindParam("id",$id);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_OBJ);

        foreach ($row as $data){
            $result .= '<option value="'.$data->id_sub_kategori.'">'.$data->sub_kategori.'</option>';
        }
        echo $result;
    }
}
?>