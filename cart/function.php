<?php

    function count_cart ($id) {
        require('../database/db.php');
        
        $count = $connection->prepare("SELECT COUNT(*) FROM cart WHERE id=:id");
        $count->bindParam("id", $id);
        $count->execute();
        $result = $count->fetchColumn();
        return $result;
    }

?>