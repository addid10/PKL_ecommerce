<?php session_start(); ?>
<?php if(isset($_SESSION['username_member'])): ?>
<?php require_once('index.cart.php'); ?>
<?php require_once('index.address.php'); ?>
<?php if(empty($alamat) && empty($kodePos)): ?>
    <?php require_once('../layout/javascript.php');?>
    <script src="alert.js"></script>
<?php else: ?>

<?php if($count > 0): ?>
<!DOCTYPE html>
<html>

<head>
    <title>Pembayaran - LainLain</title>
    <?php require_once('../layout/head.php');?>
    <link rel="stylesheet" href="../assets/css/checkout.css">
    <link rel="stylesheet" href="../assets/css/form-elements.css">
</head>

<body>
    <header id="header">
        <?php require_once('../layout/header.php'); ?>
    </header>
    <div class="mt-5"></div>

    <div class="container">
        <div class="col-md-10 mx-auto form-box form-box">
            <form id="checkout-form" role="form" class="f1">
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
                        <table class="table table-striped">
                            <thead>
                                <tr class="cart-menu-item">
                                    <th colspan="2">Item</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th>
                                    <th width="25%">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($result as $keys):?>
                                <tr>
                                    <td><a><img width="80px" src="../../admin/home/table_barang/upload/<?= $keys['foto'] ?>"
                                                alt=""></a></td>
                                    <td class="cart-description">
                                        <?= $keys['nama_barang']; ?>
                                    </td>
                                    <td>Rp.
                                        <?= number_format($keys['harga'],0,',','.');?>
                                    </td>
                                    <td class="text-center">
                                        <?= $keys['kuantitas'] ?>
                                    </td>
                                    <td class="cart-total">
                                        <?= number_format($keys['kuantitas'] * $keys['harga'],0,',','.') ?>
                                    </td>
                                </tr>

                                <?php $total = $total +  ($keys['kuantitas'] * $keys['harga']); ?>
                                <?php $countBarang = $countBarang + ($keys['kuantitas']); ?>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right pr-5">Total</td>
                                    <td class="cart-total">Rp.
                                        <?= number_format($total,2,',','.') ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="f1-buttons">
                        <a href="../cart" class="btn pull-left">Kembali ke Keranjang</a>
                        <button id="<?= $keys['id_cart'] ?>" type="button" class="btn btn-next">Next</button>
                    </div>
                </fieldset>
                <fieldset>
                    <?php require_once('index.summary.php'); ?>
                    <h4>Detail Transaksi</h4>
                    <hr>
                    <div class="form-group row">
                        <label class="col-3">Tanggal Pembelian</label>
                        <div class="col-9">
                            <input type="text" class="form-control" value="<?= $dayList[$day];?>, <?= date('d').' '.($bulan[date('m')]).' '.date('Y')?>"
                                disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Status Pengiriman</label>
                        <div class="col-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="ambilsendiri" name="status_kirim" class="custom-control-input"
                                    value="Ambil Sendiri" required checked>
                                <label class="custom-control-label" for="ambilsendiri">Ambil Sendiri</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="pengiriman" name="status_kirim" class="custom-control-input"
                                    value="Pengiriman" required>
                                <label class="custom-control-label" for="pengiriman">Dikirimkan</label>
                            </div>
                        </div>
                        <label class="col-1">Rp.</label>
                        <div class="col-4">
                            <input type="text" id="biaya-pengiriman" class="form-control" value="0" disabled>
                            <small><i>Dikirimkan akan dikenai biaya tambahan seperti yang tertera di atas</i></small>
                            <span id="hidden-biaya-pengiriman"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Random Digit</label>
                        <label class="col-1">Rp.</label>
                        <div class="col-8">
                            <input type="number" class="form-control" value="<?= $keys['random_digit'] ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Total Pembayaran</label>
                        <label class="col-1">Rp.</label>
                        <div class="col-8">
                            <input type="number" class="form-control" value="<?= $total ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php $random = $keys['random_digit']; $totalBayar = $total+$random; ?>
                        <label class="col-3"><b style="color:#000;border-bottom:1px solid #000">Total keseluruhan</b></label>
                        <label class="col-1">Rp.</label>
                        <div class="col-8">
                            <input type="number" id="total-bayar" name="total_bayar" class="form-control" value="<?= $totalBayar ?>"
                                disabled>
                        </div>
                    </div><!-- 
                    <div class="form-group row">
                        <label class="col-3">Pesan</label>
                        <div class="col-9">
                            <textarea id="message" name="messages" class="form-control" rows="8" placeholder="Permintaan Tambahan..."></textarea>
                        </div>
                    </div> -->
                    <div class="f1-buttons">
                        <button type="button" class="btn btn-previous">Previous</button>
                        <button id="<?= $keys['id_cart'] ?>" type="button" class="btn btn-next btn-summary">Next</button>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="text-center mb-4">
                        <h4>Silahkan Lakukan Pembayaran ke Nomor Rekening sebagai berikut.</h4>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Bank</label>
                        <div class="col-md-9">
                            <label for="bank">Pilih dari Bank berikut (pilih satu):</label>
                            <select class="form-control" id="bank-list" name="bank" required>
                                <option value="" disabled selected>Pilih Bank..</option>
                                <?php require_once('index.bank.php'); ?>
                                <?php foreach($bankList as $list): ?>
                                <option value="<?= $list->bank_id ?>">
                                    <?= $list->nama_bank ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="list-bank">
                        <div class="form-group row">
                            <label class="col-md-3">Atas nama (a/n)</label>
                            <div class="col-md-9">
                                <label id="accountname"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">Nomor Rekening</label>
                            <div class="col-md-7">
                                <input type="text" id="rekening" class="form-control" value="">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-copy copy-rekening">Copy</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Jumlah Pembayaran</label>
                        <label class="col-1">Rp.</label>
                        <div class="col-md-6">
                            <input type="text" id="total" class="form-control" value="">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-copy copy-total">Copy</button>
                        </div>
                    </div>
                    <div class="text-center">Pastikan pembayaran anda sudah berhasil dan unggah bukti pembayaran untuk
                        mempercepat proses verifikasi.</div>
                    <div class="f1-buttons col-md-12">
                        <input type="hidden" name="id" value="<?= $keys['id_cart'] ?>" required>
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <input type="hidden" name="jumlah_barang" id="total-barang" value="<?= $countBarang ?>">

                        <button type="button" class="btn btn-previous">Previous</button>
                        <button type="submit" class="btn btn-submit">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <div class="space-header"></div>
    <footer id="footer">
        <?php require_once('../layout/footer.php');?>
    </footer>

    <?php require_once('../layout/javascript.php');?>
    <script src="../assets/js/jquery.backstretch.min.js"></script>
    <script src="../assets/js/retina-1.1.0.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="checkout.js"></script>
</body>

</html>

<?php else: ?>
<?php header('location: ../home'); ?>
<?php endif ?>

<?php endif ?>

<?php else: ?>
<?php header('location: ../home'); ?>
<?php endif ?>