<?php
include('../table_barang/db.php');
include('functionData.php');

$lihatNotifikasi  = '';
$hasilNotifikasi  = array();
$lihatNotifikasi .= "SELECT * FROM transaksi_pembelian 
JOIN users ON id_users=id 
JOIN users_profile USING(id) WHERE status_baca=1 ";

if(isset($_POST["search"]["value"]))
{
	$lihatNotifikasi .= 'AND username LIKE "%'.$_POST["search"]["value"].'%" ';
	$lihatNotifikasi .= 'AND nama_users LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$lihatNotifikasi .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$lihatNotifikasi .= 'ORDER BY waktu_transaksi AND tanggal_transaksi ASC ';
}
if($_POST["length"] != -1)
{
	$lihatNotifikasi .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connection->prepare($lihatNotifikasi);
$statement->execute();
$result    = $statement->fetchAll();
$data      = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{

    $status_bayar  = $row['status_beli'];
    $status_barang = $row['status_barang'];

    if($status_bayar=="Terbayar" && $status_barang=="Pengiriman"){
        $waktu = $row['waktu_kirim'];
        $hari  = $row['tanggal_kirim'];
    }
    else if($status_bayar=="Terbayar" && $status_barang=="Ambil Sendiri"){
        $waktu = $row['waktu_kirim'];
        $hari  = $row['tanggal_kirim'];
    }
    else if($status_barang=="Dibatalkan"){
        $waktu = $row['waktu_batal'];
        $hari  = $row['tanggal_batal'];
    }
    else{
        $waktu = $row['waktu_transaksi'];
        $hari  = $row['tanggal_transaksi'];
    }

    //Waktu
    $waktuAwal  = date_create($waktu);
    $waktuAkhir = date_create();
    $waktuDiff  = date_diff($waktuAwal, $waktuAkhir);
    $detik      = $waktuDiff->s;
    $menit      = $waktuDiff->i; 
    $jam        = $waktuDiff->h;

    //Hari
    $hariAwal   = date_create($hari);
    $hariAkhir  = date_create();
    $hariDiff   = date_diff($hariAwal, $hariAkhir);
    $hari       = $hariDiff->d;
    $bulan      = $hariDiff->m;
    $tahun      = $hariDiff->y;

    if($hari>=1){
        $time = $hariDiff->d." hari yang lalu";
    }
    else if($bulan>=1){
        $time = $hariDiff->m." bulan yang lalu";
    }
    else if($tahun>=1){
        $time = $hariDiff->y." tahun yang lalu";
    }
    else if($jam>=1){
        $time = $waktuDiff->h." jam yang lalu";
    }
    else if($menit>=1){
        $time = $waktuDiff->i." menit yang lalu";
    }
    else if($detik>=1){
        $time = $waktuDiff->s." detik yang lalu";
    }
    else{
        $time = " sekarang";
    }
        
	$sub_array = array();
    $sub_array[] = $row["nama_users"];
    $sub_array[] = '<img src="../assets/images/'.$row["foto"].'" class="img-radius" width="50px" alt="User-Profile-Image">';
    $sub_array[] = $time;

    if($status_barang=="Dibatalkan"){
        $status = '<label class="label label-danger">Dibatalkan</label>';
    }
    else if($status_bayar=="Terbayar" && $status_barang=="Pengiriman"){
        $status = '<label class="label label-warning">Pengiriman</label>';
    }
    else if($status_bayar=="Terbayar" && $status_barang=="Ambil Sendiri"){
        $status = '<label class="label label-warning">Ambil Sendiri</label>';
    }
    else{
        $status = '<label class="label label-success">Melakukan Pembelian</label>';
    }
    $sub_array[] = $status;
    $sub_array[] = '<button type="button" name="accept" id="'.$row["id_transaksi_pembelian"].'" class="btn btn-success btn-outline-success accept"><i class="icofont icofont-check-circled"></i></button>';	
    $data[] = $sub_array;
}
$hasilNotifikasi = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($hasilNotifikasi);
?>


