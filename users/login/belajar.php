<form method="post" action="belajar_sukses.php" enctype="multipart/form-data">
<select name="kategori" id="kategori" class="form-control">
<option>Pilih Kategori</option>
<option value="1">ATK</option>
<option value="2">Brankas</option>
</select>
<select name="sub_kategori" id="sub_kategori" class="form-control">
                            <option>Pilih Sub Kategori</option>
                            <option value="1">Kertas</option>
                            <option value="2">Pulpen</option>
                            <option value="3">Pensil</option>
                            <option value="4">Spidol</option>
                            <option value="5">Brankas Kecil</option>
                            <option value="6">Brankas Sedang</option>
                            <option value="7">Brankas Besar</option>
                        </select><br>
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
                        <input id="foto" name="foto" type="file" class="form-control">
                        <br>
                    <textarea id="keterangan" name="keterangan" rows="4" cols="4" class="form-control"></textarea>
          <input type="submit"  class="btn hor-grd btn-grd-success" value="Submit">
        </form>
        
