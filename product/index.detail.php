
<?php 
    require_once('../database/db.php');

    $id = addslashes($_GET['id']);
    $statement = $connection->prepare(
        "SELECT * FROM barang WHERE id_barang=:id AND status_barang=1"
    );

    $statement->bindParam("id", $id);
    $statement->execute();
    $detail = $statement->fetch();
?>
