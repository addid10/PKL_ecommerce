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
        <div class="modal-body">
            <form method="post" id="addForm" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select name="kategori" onchange="showDiv(this)" id="kategori" class="form-control">
                            <option>Pilih Kategori</option>
                            <option value="1">Brankas</option>
                            <option value="2">ATK</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Sub Kategori</label>
                    <div class="col-sm-9">
                        <select name="select" class="form-control">
                            <option>Pilih Sub Kategori</option>
                            <option value="1">Tes</option>
                            <option value="2">Type 2</option>
                            <option value="3">Type 3</option>
                            <option value="4">Type 4</option>
                            <option value="5">Type 5</option>
                            <option value="6">Type 6</option>
                            <option value="7">Type 7</option>
                            <option value="8">Type 8</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Barang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" maxlength="50">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Harga</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Merk Barang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control">
                        <span id="uploadImage"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                    <textarea rows="4" cols="4" class="form-control"></textarea>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="idBarang" id="idBarang">
          <input type="hidden" name="operation" id="operation">
          <button type="button" id="actionButton" class="btn hor-grd btn-grd-success" value="Tambah"></button>
        </div>
        
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