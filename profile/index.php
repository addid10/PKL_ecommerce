<?php session_start(); ?>
<?php if(isset($_SESSION['username_member'])):?>
<?php require_once('view-profile.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Transaksi Saya - LainLain</title>
	<?php require_once('../layout/head.php');?>
</head>

<body>
	<header id="header">
		<?php require_once('../layout/header.php'); ?>
	</header>
	<div class="space-header"></div>
	<section>
		<div class="container">
			<div class="row">
				<?php require_once('sidemenu.php'); ?>
				<div class="col-md-9">
					<div class="left-sidebar">
						<h2>TRANSAKSI PEMBELIAN</h2>
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#belum-dibayar" role="tab">Belum dibayar</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#belum-dikirimkan" role="tab">Belum dikirimkan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#belum-diterima" role="tab">Belum diterima</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#selesai" role="tab">Selesai</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#batal" role="tab">Batal</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="belum-dibayar" role="tabpanel">
								<br />
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Tanggal</th>
												<th>Jumlah</th>
												<th>Total</th>
												<th>Status</th>
												<th></th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php require_once('index.belum_dibayar.php'); ?>
											<?php foreach($result as $data):?>
											<tr>
												<td><?= $data->tanggal_transaksi ?></td>
												<td><?= $data->total_barang ?></td>
												<td>Rp. <?= number_format($data->total_harga,0,'.','.') ?></td>
												<td><span class="label label-primary"><?= $data->status_barang ?></span></td>
												<td>
													<button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-info detail-beli">Detail</button>
												</td>
												<td>
												<?php if(!empty($data->bukti_pembayaran)): ?>
													<span class="label label-success">Telah diupload</span>
												<?php else: ?>
													<button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-warning upload-bukti">Upload Bukti</button>
												<?php endif ?>
												</td>
												<td>
													<button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-danger delete-beli"><i class="fa fa-times"></i></button>
												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="belum-dikirimkan" role="tabpanel">
								<br />
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Tanggal</th>
												<th>Jumlah</th>
												<th>Total</th>
												<th>Status</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php require_once('index.belum_dikirim.php'); ?>
											<?php foreach($resultKirim as $data):?>
											<tr>
												<td><?= $data->tanggal_transaksi ?></td>
												<td><?= $data->total_barang ?></td>
												<td>Rp. <?= number_format($data->total_harga,0,'.','.') ?></td>
												<td><span class="label label-primary"><?= $data->status_barang ?></span></td>
												<td><button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-info detail-beli">Detail
														Pembelian</button></td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="belum-diterima" role="tabpanel">
								<br />
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr class="">
												<th>Tanggal</th>
												<th>Jumlah</th>
												<th>Total</th>
												<th>Status Barang</th>
												<th>Status Kirim</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php require_once('index.belum_diterima.php'); ?>
											<?php foreach($resultTerima as $data):?>
											<tr>
												<td><?= $data->tanggal_transaksi ?></td>
												<td><?= $data->total_barang ?></td>
												<td>Rp. <?= number_format($data->total_harga,0,'.','.') ?></td>
												<td><span class="label label-primary"><?= $data->status_barang ?></span></td>
												<td><span class="label label-primary"><?= $data->status_kirim ?></span></td>
												<td><button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-info detail-beli">
													Detail Pembelian</button>
												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="selesai" role="tabpanel">
								<br />
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr class="">
												<th>Tanggal</th>
												<th>Jumlah</th>
												<th>Total</th>
												<th>Status</th>
												<th>Rating</th>
												<th>Review</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php require_once('index.selesai.php'); ?>
											<?php foreach($resultSelesai as $data):?>
											<tr>
												<td><?= $data->tanggal_transaksi ?></td>
												<td><?= $data->total_barang ?></td>
												<td>Rp. <?= number_format($data->total_harga,0,'.','.') ?></td>
												<td><span class="label label-primary"><?= $data->status_barang ?></span></td>
												<td><?= $data->rating ?></td>
												<?php if($data->rating=='' AND $data->review==''):?>
												<td>
													<button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-warning review">
													Beri Masukan</button>
												</td>
												<?php else: ?>
												<td>
													<?= $data->review ?>
												</td>
												<?php endif ?>
												<td>
													<button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-info detail-beli">
													Detail Pembelian</button>
												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="batal" role="tabpanel">
								<br />
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr class="">
												<th>Tanggal</th>
												<th>Jumlah</th>
												<th>Total</th>
												<th>Status</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php require_once('index.batal.php'); ?>
											<?php foreach($resultBatal as $data):?>
											<tr>
												<td><?= $data->tanggal_transaksi ?></td>
												<td><?= $data->total_barang ?></td>
												<td>Rp. <?= number_format($data->total_harga,0,'.','.') ?></td>
												<td><span class="label label-danger"><?= $data->status_barang ?></span></td>
												<td>
													<button type="button" id="<?= $data->id_transaksi_pembelian ?>" class="btn btn-info detail-beli">
													Detail Pembelian</button>
												</td>
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
		</div>
	</section>
	<?php require_once('../profile/modal.php'); ?>
	<div class="space-header"></div>
	<footer id="footer">
		<?php require_once('../layout/footer.php');?>
	</footer>
	<?php require_once('../layout/modal.php'); ?>
	<?php require_once('../layout/javascript.php');?>
	<script src="profile.js"></script>
</body>

</html>
<?php else: ?>
<?php header('location: ../users/login.php'); ?>
<?php endif ?>