<?php
require('../table_barang/db.php');

if(isset($_POST["id"]))
{
    $detailHasil= '';
    $id_Trans   = $_POST["id"];
    
    $tampilData = $connection->prepare(
        "SELECT * FROM transaksi_pembelian 
        WHERE id_transaksi_pembelian=:_idTrans");
        
        $tampilData->bindParam('_idTrans', $id_Trans);
        $tampilData->execute();

        $detailData   = $tampilData->fetchAll(PDO::FETCH_OBJ);
        $detailHasil .= '
        <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Bukti Pembayaran</th>
            </tr>
        </thead>';
        
    foreach ($detailData as $data)
    {
        $detailHasil .= '
        <tbody>
            <th>
                <td><img src="../../users/assets/images/bukti/'.$data->bukti_pembayaran.'" width="800px"></th>
            </th>
        </tbody>
        ';
    }
       $detailHasil   .= '
       </table></div>';

       echo $detailHasil;   
}
?>