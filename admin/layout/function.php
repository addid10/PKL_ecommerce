<?php

function get_notification() {
	require('../database/db.php');
	$notifikasi = '';
	
	$statement = $connection->prepare("SELECT * FROM transaksi_pembelian 
	JOIN users ON id_users=id JOIN users_profile USING(id) WHERE status_baca=1 ");
	$statement->execute();
	$result    = $statement->fetchAll(PDO::FETCH_OBJ);
	$rowCount  = $statement->rowCount();

	foreach ($result as $row){
		$status_bayar  = $row->status_beli;
		$status_barang = $row->status_barang;
	    
		if($status_bayar=="Terbayar" && $status_barang=="Pengiriman"){
		    $waktu = $row->waktu_kirim;
		    $hari  = $row->tanggal_kirim;
		}
		else if($status_bayar=="Terbayar" && $status_barang=="Ambil Sendiri"){
		    $waktu = $row->waktu_kirim;
		    $hari  = $row->tanggal_kirim;
		}
		else if($status_barang=="Dibatalkan"){
		    $waktu = $row->waktu_batal;
		    $hari  = $row->tanggal_batal;
		}
		else{
		    $waktu = $row->waktu_transaksi;
		    $hari  = $row->tanggal_transaksi;
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

		$notifikasi .= '
		<img class="d-flex align-self-center img-radius" src="../assets/images/'.$row->foto.'">
		<div class="media-body">
			<h5 class="notification-user">'.$row->nama_users.'</h5>
			<p class="notification-msg"">'.$status.'</p>
			<span class="notification-time">'.$time.'</span>
		</div> ';
	}

	return $notifikasi;
}

?>