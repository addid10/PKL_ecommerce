<!-- Modal Add -->
<div class="modal" id="addModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post" id="addForm" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group row" id="kat">
                    <label class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select name="kategori" id="kategori" class="form-control">
                            <option>Pilih Kategori</option>
                            <?php require_once('table_barang/functionData.php'); echo load_kategori();?>
                            <!--
                            <option value="1">ATK</option>
                            <option value="2">Brankas</option>
                            -->
                        </select>
                    </div>
                </div>
                <div class="form-group row" id="sub">
                    <label class="col-sm-3 col-form-label">Sub Kategori</label>
                    <div class="col-sm-9">
                        <select name="sub_kategori" id="sub_kategori" class="form-control">
                            <option>Pilih Sub Kategori</option>
                            <!--
                            <option value="1">Kertas</option>
                            <option value="2">Pulpen</option>
                            <option value="3">Pensil</option>
                            <option value="4">Spidol</option>
                            <option value="5">Brankas Kecil</option>
                            <option value="6">Brankas Sedang</option>
                            <option value="7">Brankas Besar</option>
                            -->
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Barang</label>
                    <div class="col-sm-9">
                        <input id="nama_barang" name="nama_barang" type="text" class="form-control" maxlength="50">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Harga</label>
                    <div class="col-sm-9">
                        <input id="harga" name="harga" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Merk Barang</label>
                    <div class="col-sm-9">
                        <input id="merk_barang" name="merk_barang" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-9">
                        <input id="foto" name="foto" type="file" class="form-control">
                        <span id="uploadImage"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                    <textarea id="keterangan" name="keterangan" rows="4" cols="4" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="id_barang" id="id_barang">
          <input type="hidden" name="operation" id="operation">
          <input type="submit" name="actionButton" id="actionButton" class="btn hor-grd btn-grd-success" value="">
        </div>
        </form>
        
        </div>
    </div>
</div>

  <!--Modal View-->
  <div class="modal" id="detailModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div id="detailData"></div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="idBarang" id="idBarang">
          <input type="hidden" name="operation" id="operation">
          <button type="button" class="btn hor-grd btn-grd-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!--End Modal View-->

 <!-- Modal Info -->
<div class="modal" id="infoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail Info</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h6>Status Beli</h6>
                        <hr>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="label label-primary">Proses</label>
                            </div>
                            <div class="col-md-8">
                                <p>Barang sedang dipersiapkan selagi menunggu status pembayaran telah lunas</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="label label-primary">Ambil Sendiri</label>
                            </div>
                            <div class="col-md-8">
                                <p>Pembeli telah/akan mengambil barang</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="label label-primary">Pengiriman</label>
                            </div>
                            <div class="col-md-8">
                                <p>Barang telah/akan dikirim ke pembeli</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="label label-primary">Dibatalkan</label>
                            </div>
                            <div class="col-md-8">
                                <p>Pembelian dibatalkan</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="label label-primary">Dikembalikan</label>
                            </div>
                            <div class="col-md-8">
                                <p>Barang dikembalikan ke toko</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h6>Status Pembayaran</h6>
                        <hr>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="label label-primary">Menunggu</label>
                            </div>
                            <div class="col-md-8">
                                <p>Menunggu pembayaran oleh pembeli</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="label label-primary">Terbayar</label>
                            </div>
                            <div class="col-md-8">
                                <p>Barang telah dibayar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn hor-grd btn-grd-danger" data-dismiss="modal">Close</button>
            </div>     
        </div>
    </div>
</div>