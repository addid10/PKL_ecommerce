<?php
require("db.php");

if(isset($_POST["id_barang"]))
{
    $detailHasil= '';
    $id_barang  = $_POST["id_barang"];
    
    $tampilData = $connection->prepare(
        "SELECT * FROM barang 
         RIGHT JOIN sub_kategori USING(id_sub_kategori) 
         RIGHT JOIN kategori USING(id_kategori) 
         WHERE id_barang=:_idBarang");
        
        $tampilData->bindParam('_idBarang', $id_barang);
        $tampilData->execute();

        $detailData   = $tampilData->fetchAll(PDO::FETCH_OBJ);
        $detailHasil .= '
        <div class="table-responsive">
        <table class="table table-hover">';
        
    foreach ($detailData as $data)
    {
        if($data->foto==0){
            $foto = "noimage.png";
        }
        else{
            $foto = $data->foto;
        }


        $detailHasil .= '
        <thead>
            <tr>
                <th>Kategori</th>
                <th>'.$data->kategori.'</th>
            </tr>
            <tr>
                <th>Sub Kategori</th>
                <th>'.$data->sub_kategori.'</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2"><center><img width="150px" src="table_barang/upload/'.$foto.'"></img></center></th>
            </tr>
            <tr>
                <td>Nama</td>
                <td>'.$data->nama_barang.'</th>
            </tr>
            <tr>
                <td>Merk</td>
                <td>'.$data->merk_barang.'</th>
            </tr>
            <tr>
                <td>Harga</td>
                <td>'.$data->harga.'</th>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>'.$data->keterangan.'</th>
            </tr>
        </tbody>
        ';
    }
       $detailHasil   .= '
       </table></div>';

       echo $detailHasil;   
}
?>