<?php session_start(); ?>
<?php if(isset($_SESSION['_username'])): ?>
<!DOCTYPE html>
<html>
<head>
<?php require_once('../layout/head.php');?>
<link rel="stylesheet" href="../assets/css/checkout.css">
<link rel="stylesheet" href="../assets/css/form-elements.css">
</head>

<body>
	<header id="header">
		<?php require_once('../layout/header.php'); ?>
	</header>
	
        <div class="container">
            <div class="col-md-8 col-md-offset-2  form-box form-box">
            	<form role="form" class="f1">
            		<div class="f1-steps">
            			<div class="f1-progress">
            			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
            			</div>
                		<div class="f1-step active">
                			<div class="f1-step-icon"><i class="fa fa-user"></i></div>
                			<p>Total Beli</p>
            			</div>
            			<div class="f1-step">
            				<div class="f1-step-icon"><i class="fa fa-book"></i></div>
            				<p>Ringkasan</p>
            			</div>
                		<div class="f1-step">
                			<div class="f1-step-icon"><i class="fa fa-money"></i></div>
                			<p>Pembayaran</p>
            			</div>
                    </div>
                    <fieldset>
                        <h4>Review & Payment</h4>
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead >
                                    <tr class="cart-menu-item">
                                        <th colspan="2">Item</th>
                                        <th>Harga</th>
                                        <th>Kuantitas</th>
                                        <th width="25%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                require_once('../database/db.php');
                                $id = $_SESSION['_username'];
                                $statement3 = $connection->prepare(
                                    "SELECT * FROM cart_item JOIN barang using(id_barang) JOIN users ON id=id_users WHERE username=:_id"
                                );
                                $statement3->bindParam('_id', $id);
                                $statement3->execute();
                                $result = $statement3->fetchAll();
                                ?>
                                <?php $total = 0; ?>
                                <?php $countBarang = 0; ?>
                                <?php foreach($result as $keys):?>
                                    <tr>
                                        <td>
                                            <a><img width="80px" src="../../admin/home/table_barang/upload/<?= $keys['foto'] ?>" alt=""></a>
                                        </td>
                                        <td class="cart-description">
                                            <h4><?= $keys['nama_barang']; ?></h4>
                                            <p>ID: <?=$keys['id_barang']?></p>
                                        </td>
                                        <td class="cart-price">
                                            <p>Rp. <?= number_format($keys['harga'],0,',','.'); ?></p>
                                        </td>
                                        <td style="text-align:center">
                                            <div class="quantity buttons_added product-quantity">
                                                <p><?= $keys['kuantitas'] ?></p>
                                            </div>
                                        </td>
                                        <td class="cart-total" style="text-align:right">
                                            <p><?= number_format($keys['kuantitas'] * $keys['harga'],0,',','.') ?></p>
                                        </td>
                                    </tr>
                                    <?php $total = $total +  ($keys['kuantitas'] * $keys['harga']); ?>
                                    <?php $countBarang = $countBarang + ($keys['kuantitas']); ?>
                                <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">&nbsp;</td>
                                        <td colspan="3">
                                            <table class="table table-condensed total-result">
                                                <tr>
                                                    <td>Total</td>
                                                    <td class="cart-total-sum"><p>Rp. <?= number_format($total,2,',','.') ?></p></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <h4>Detail Transaksi</h4>
                        <hr>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Pembelian</label>
                                <?php
                                $tanggal =  date("y-m-d");
                                $day = date('D', strtotime($tanggal));
                                $dayList = array(
                                    'Sun' => 'Minggu',
                                    'Mon' => 'Senin',
                                    'Tue' => 'Selasa',
                                    'Wed' => 'Rabu',
                                    'Thu' => 'Kamis',
                                    'Fri' => 'Jumat',
                                    'Sat' => 'Sabtu'
                                );
                                $bulan = array(
                                    '01' => 'Januari',
                                    '02' => 'Februari',
                                    '03' => 'Maret',
                                    '04' => 'April',
                                    '05' => 'Mei',
                                    '06' => 'Juni',
                                    '07' => 'Juli',
                                    '08' => 'Agustus',
                                    '09' => 'September',
                                    '10' => 'Oktober',
                                    '11' => 'November',
                                    '12' => 'Desember',
                                );
                                ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= $dayList[$day];?>, <?php echo date('d').' '.($bulan[date('m')]).' '.date('Y')?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status Pengiriman</label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label required="required" class="radio-inline"><input type="radio" name="statusKirim" value="Ambil Sendiri" checked>Ambil Sendiri</label>
                                <label required="required" class="radio-inline"><input type="radio" name="statusKirim" value="Pengiriman">Dikirimkan</label>
                                <p>*<i>Dikirimkan akan dikenai biaya tambahan</i></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Total Pembayaran</label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Rp. <?= number_format($total,2,',','.') ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Pesan</label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                            <textarea id="message" class="form-control" rows="8" placeholder="Permintaan Tambahan..."></textarea>
                            </div>
                        </div>
                        <div class="f1-buttons">
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-md-12">Silahkan Lakukan Pembayaran ke Nomor Rekening sebagai berikut.</div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Bank</label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="bank">Pilih dari Bank berikut (pilih satu):</label>
                                <select class="form-control" id="bankList">
                                    <option>Pilih Bank..</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BTN">BTN</option>
                                </select>
                            </div>
                        </div>
                        <div class="list-bank" id="mandiri">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Atas nama (a/n)</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <img src="../assets/images/bank/mandiri.png" width="67px">
                                    <label>PT. PinjamApa Cabang Gatot Subroto</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nomor Rekening</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" id="rekening_mandiri" class="form-control" value="165 001 0010013">
                                    <button type="button" id="copy_mandiri" class="btn btn-copy">Copy</button>
                                </div>
                            </div>
                        </div>
                        <div class="list-bank" id="BRI">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Atas nama (a/n)</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <img src="../assets/images/bank/bri.png" width="67px">
                                    <label>PT. PinjamApa Cabang Gatot Subroto</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nomor Rekening</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" id="rekening_bri" class="form-control" value="165 001 0010012">
                                    <button type="button" id="copy_bri" class="btn btn-copy">Copy</button>
                                </div>
                            </div>
                        </div>
                        <div class="list-bank" id="BNI">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Atas nama (a/n)</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <img src="../assets/images/bank/bni.png" width="67px">
                                    <label>PT. PinjamApa Cabang Gatot Subroto</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nomor Rekening</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" id="rekening_bni" class="form-control" value="165 001 0010014">
                                    <button type="button" id="copy_bni" class="btn btn-copy">Copy</button>
                                </div>
                            </div>
                        </div>
                        <div class="list-bank" id="BCA">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Atas nama (a/n)</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <img src="../assets/images/bank/bca.png" width="67px">
                                    <label>PT. PinjamApa Cabang Gatot Subroto</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nomor Rekening</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" id="rekening_bca" class="form-control" value="165 001 0010015">
                                    <button type="button" id="copy_bca" class="btn btn-copy">Copy</button>
                                </div>
                            </div>
                        </div>
                        <div class="list-bank" id="BTN">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Atas nama (a/n)</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <img src="../assets/images/bank/btn.png" width="67px">
                                    <label>PT. PinjamApa Cabang Gatot Subroto</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nomor Rekening</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" id="rekening_btn" class="form-control" value="165 001 0010016">
                                    <button type="button" id="copy_btn" class="btn btn-copy">Copy</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah Pembayaran</label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" id="totalbayar" class="form-control" value="Rp. <?= number_format($total,2,',','.') ?>">
                                <input type="hidden" id="hidden_total_harga" class="form-control" value="<?= $total ?>">
                                <input type="hidden" id="hidden_total_barang" class="form-control" value="<?= $countBarang ?>">
                                <button type="button" id="copys" class="btn btn-copy">Copy</button>
                            </div>
                        </div>
                        <div class="col-md-12">Pastikan pembayaran anda sudah berhasil dan unggah bukti pembayaran untuk mempercepat proses verifikasi.</div>
                        <?php
                            $_id = $_SESSION['_username'];
                            $statement2 = $connection->prepare(
                                "SELECT id FROM users WHERE username=:_id"
                            );
                            $statement2->bindParam('_id', $_id);
                            $statement2->execute();
                            $result2 = $statement2->fetch();
                        ?>
                        </form>
                        <div class="f1-buttons col-md-12">
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="button" id="<?= $result2['id'] ?>" class="btn btn-submit checkout">Submit</button>
                        </div>
                    </fieldset>
            </div>
        </div>
    
    <footer id="footer"><!--Footer-->
		<?php require_once('../layout/footer.php');?>	
	</footer><!--/Footer-->
	

  
<?php require_once('../layout/javascript.php');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="checkout.js"></script>
<?php require_once('../layout/cs_javascript.php');?>
<script src="../assets/js/jquery.backstretch.min.js"></script>
<script src="../assets/js/retina-1.1.0.min.js"></script>
<script src="../assets/js/scripts.js"></script>
</body>
</html>

<?php else: ?>
<?php header('location: ../home'); ?>
<?php endif ?>