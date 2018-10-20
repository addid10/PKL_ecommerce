<?php
require('../database/db.php');

if(isset($_POST["id"]))
{
    $detailHasil= '';
    $id  = $_POST["id"];
    
    $tampilData = $connection->prepare(
        "SELECT * FROM detail_transaksi_pembelian 
         JOIN transaksi_pembelian USING(id_transaksi_pembelian) 
         JOIN barang USING(id_barang) 
         WHERE id_transaksi_pembelian=:_idTrans");
        
        $tampilData->bindParam('_idTrans', $id);
        $tampilData->execute();

        $detailData   = $tampilData->fetchAll(PDO::FETCH_OBJ);
        $detailHasil .= '
        <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Merk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total (Harga*Jumlah)</th>
            </tr>
        </thead>';
        
    foreach ($detailData as $data)
    {
        $detailHasil .= '
        <tbody>
            <tr>
                <td>'.$data->nama_barang.'</th>
                <td>'.$data->merk_barang.'</th>
                <td>'.$data->harga.'</th>
                <td>'.$data->jumlah.'</th>
                <td>'.($data->jumlah)*($data->harga).'</th>
            </tr>
        </tbody>
        ';
    }
       $detailHasil   .= '
       </table></div>';

       echo $detailHasil;   
}
?>