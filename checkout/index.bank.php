<?php
    $bank = $connection->prepare("SELECT bank_id, nama_bank FROM bank");
    $bank->execute();
    $bankList = $bank->fetchAll(PDO::FETCH_OBJ);
?>