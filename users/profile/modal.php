<!--Detail -->
<div class="modal" id="detailModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Pembelian</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div id="detailData"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn hor-grd btn-grd-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
</div>

<!-- Upload Bukti -->
<div class="modal" id="uploadBukti">
    <div class="modal-dialog">
      <div class="modal-content">
		<form method="post" id="addForm" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Upload Bukti Pembayaran</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
			<div class="form-group">
				 <input id="foto" name="foto" type="file" class="form-control">
			</div>
        </div>
        <div class="modal-footer">
		  <input type="hidden" name="id" id="hiddenID">
          <button type="button" class="btn hor-grd btn-grd-danger" data-dismiss="modal">Close</button>
		  <input type="submit" id="updateButton" class="btn btn-success" value="Submit">
        </div>
		</form>
      </div>
    </div>
</div>

<!-- Upload Bukti -->
<div class="modal" id="reviewModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload Bukti Pembayaran</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
			<div class="form-group">
                <select class="form-control" name="rating" id="ratingReview">
					<option>Masukkan Rating...</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="2">1</option>
			    </select>
			</div>
			<div class="form-group">
                <textarea id="reviewData" class="form-control" rows="8" placeholder="Berikan penilaianmu.."></textarea>
			</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn hor-grd btn-grd-danger" data-dismiss="modal">Close</button>
		  <input type="submit" id="updateButton" class="btn btn-success" value="Submit">
        </div>
      </div>
    </div>
</div>


	
											<!-- <div class="form-group">
													
												</div> -->