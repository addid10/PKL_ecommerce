<?php session_start(); ?>
<?php if(isset($_SESSION['_username'])):?>
<?php require_once('view-profile.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('../layout/head.php');?>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<?php require_once('../layout/header.php'); ?>
	</header><!--/header-->
	<div class="space-header"></div>
	<section>
		<div class="container">
			<?php require_once('sidemenu.php'); ?>
			<!-- Detail Profile -->
			<div class="col-md-9">
				<div class="left-sidebar">
					<h2>TRANSAKSI PEMBELIAN</h2>
					<ul class="nav nav-tabs">
						<li class="active tab-profile"><a data-toggle="tab" href="#menu0">Belum dibayar</a></li>
						<li class="tab-profile"><a data-toggle="tab" href="#menu1">Belum dikirimkan</a></li>
						<li class="tab-profile"><a data-toggle="tab" href="#menu2">Belum diterima</a></li>
						<li class="tab-profile"><a data-toggle="tab" href="#menu3">Selesai</a></li>
						<li class="tab-profile"><a data-toggle="tab" href="#menu4">Batal</a></li>
					</ul>

					<div class="tab-content">
						<div id="menu0" class="tab-pane fade in active">
							<br />
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr class="">
											<th>Tanggal Beli</th>
											<th>Jumlah</th>
											<th>Total Harga</th>
											<th>Status Barang</th>
											<th>Bank</th>
											<th></th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php
										require_once('../database/db.php');
										$id = $_SESSION['_username'];
										$statement3 = $connection->prepare(
											"SELECT * FROM transaksi_pembelian JOIN users on id_users=id 
											WHERE username=:_id AND status_beli='Menunggu' AND status_barang='Proses'"
										);
										$statement3->bindParam('_id', $id);
										$statement3->execute();
										$result = $statement3->fetchAll(PDO::FETCH_OBJ);
									?>
									<?php foreach($result as $data):?>
										<tr>
											<td><?= $data->tanggal_transaksi ?></td>
											<td><?= $data->total_barang ?></td>
											<td><?= $data->total_harga ?></td>
											<td><span class="label label-primary"><?= $data->status_barang ?></span></td>
											<td><?= $data->bank ?></td>
											<td><button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-info detail_beli">Detail Pembelian</button></td>
											<td><button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-warning uplod_bukti">Upload Bukti Pembayaran</button></td>
											<td><button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-danger delete_beli"><i class="fa fa-times"></i></button></td>
										</tr>
									<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
						<div id="menu1" class="tab-pane fade">
						<br />
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr class="">
											<th>Tanggal Beli</th>
											<th>Jumlah</th>
											<th>Total Harga</th>
											<th>Status Barang</th>
											<th>Bank</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php
										$id = $_SESSION['_username'];
										$statement2 = $connection->prepare(
											"SELECT * FROM transaksi_pembelian JOIN users on id_users=id 
											WHERE username=:_id AND status_beli='Terbayar' AND status_kirim='Pengiriman'"
										);
										$statement2->bindParam('_id', $id);
										$statement2->execute();
										$result = $statement2->fetchAll(PDO::FETCH_OBJ);
									?>
									<?php foreach($result as $data):?>
										<tr>
											<td><?= $data->tanggal_transaksi ?></td>
											<td><?= $data->total_barang ?></td>
											<td><?= $data->total_harga ?></td>
											<td><span class="label label-primary"><?= $data->status_barang ?></span></td>
											<td><button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-info detail_beli">Detail Pembelian</button></td>
										</tr>
									<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
						<div id="menu2" class="tab-pane fade">
						<br />
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr class="">
											<th>Tanggal Beli</th>
											<th>Jumlah</th>
											<th>Total Harga</th>
											<th>Status Barang</th>
											<th>Status Kirim</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php
										$id = $_SESSION['_username'];
										$statement2 = $connection->prepare(
											"SELECT * FROM transaksi_pembelian JOIN users on id_users=id 
											WHERE username=:_id AND status_beli='Terbayar' 
											AND status_kirim='Ambil Sendiri' AND status_barang='Proses'"
										);
										$statement2->bindParam('_id', $id);
										$statement2->execute();
										$result = $statement2->fetchAll(PDO::FETCH_OBJ);
									?>
									<?php foreach($result as $data):?>
										<tr>
											<td><?= $data->tanggal_transaksi ?></td>
											<td><?= $data->total_barang ?></td>
											<td><?= $data->total_harga ?></td>
											<td><span class="label label-primary"><?= $data->status_barang ?></span></td>
											<td><span class="label label-primary"><?= $data->status_kirim ?></span></td>
											<td><button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-info detail_beli">Detail Pembelian</button></td>
										</tr>
									<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
						<div id="menu3" class="tab-pane fade">
						<br />
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr class="">
											<th>Tanggal Beli</th>
											<th>Jumlah</th>
											<th>Total Harga</th>
											<th>Status Barang</th>
											<th>Rating</th>
											<th>Review</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php
										$id = $_SESSION['_username'];
										$statement2 = $connection->prepare(
											"SELECT * FROM transaksi_pembelian JOIN users on id_users=id LEFT JOIN review USING (id_transaksi_pembelian)
											WHERE username=:_id AND status_beli='Terbayar' AND status_barang='Selesai'"
										);
										$statement2->bindParam('_id', $id);
										$statement2->execute();
										$result = $statement2->fetchAll(PDO::FETCH_OBJ);
									?>
									<?php foreach($result as $data):?>
										<tr>
											<td><?= $data->tanggal_transaksi ?></td>
											<td><?= $data->total_barang ?></td>
											<td><?= $data->total_harga ?></td>
											<td><span class="label label-primary"><?= $data->status_barang ?></span></td>
											<td><?= $data->rating ?></td>
											<td><button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-warning review">Beri Masukan</button></td>
											<td><button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-info detail_beli">Detail Pembelian</button></td>
										</tr>
									<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
						<div id="menu4" class="tab-pane fade">
						<br />
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr class="">
											<th>Tanggal Beli</th>
											<th>Jumlah</th>
											<th>Total Harga</th>
											<th>Status Barang</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php
										$id = $_SESSION['_username'];
										$statement2 = $connection->prepare(
											"SELECT * FROM transaksi_pembelian JOIN users on id_users=id 
											WHERE username=:_id AND status_barang='Dibatalkan'"
										);
										$statement2->bindParam('_id', $id);
										$statement2->execute();
										$result = $statement2->fetchAll(PDO::FETCH_OBJ);
									?>
									<?php foreach($result as $data):?>
										<tr>
											<td><?= $data->tanggal_transaksi ?></td>
											<td><?= $data->total_barang ?></td>
											<td><?= $data->total_harga ?></td>
											<td><span class="label label-danger"><?= $data->status_barang ?></span></td>
											<td><button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-info detail_beli">Detail Pembelian</button></td>
										</tr>
									<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</section>
	<?php require_once('../profile/modal.php'); ?>
	<footer id="footer"><!--Footer-->
		<?php require_once('../layout/footer.php');?>	
	</footer><!--/Footer-->
	
<?php require_once('../layout/modal.php'); ?>
<?php require_once('../layout/javascript.php');?>
<script src="profile.js"></script>
<?php require_once('../layout/cs_javascript.php');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
<?php else: ?>
<?php header('location: ../users/login.php'); ?>
<?php endif ?>