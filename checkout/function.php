<?php

    function get_total_harga($id) {
        require('../database/db.php');

        $fetch = $connection->prepare(
            "SELECT (SUM((kuantitas*harga))+biaya_antar+random_digit) as total FROM cart 
            JOIN cart_item USING(id_cart) JOIN barang using(id_barang) WHERE id_cart=:id"
        );

        $fetch->bindParam("id", $id);
        $fetch->execute();
        $total = $fetch->fetchColumn();
        return $total;
    }

?>