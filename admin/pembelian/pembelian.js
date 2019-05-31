//Read
$(document).ready(function () {

	let dataTable = $('#pembelian').DataTable({
		ajax: "data.json",
		"serverSide": true,
		"bLengthChange": false,
		"bFilter": true,
		"bInfo": false,
		"bAutoWidth": false,
		"order": [],

		"ajax": {
			url: "ambil.php",
			type: "POST"
		},
		"columnDefs": [{
			"targets": [0, 3, 4],
			"orderable": false,
		}, ],
	});

	setInterval(function () {
		dataTable.ajax.reload(null, false); // user paging is not reset on reload
	}, 100000);

	//Update Edit
	$(document).on('click', '.update', function () {
		let id = $(this).attr("id");
		$.ajax({
			url: "ambil_tunggal.php",
			method: "POST",
			data: {
				id: id
			},
			dataType: "json",
			success: function (data) {
				$('#beliModal').modal('show');
				$('.modal-title').text("Update Data");
				$('#updateButton').val("Update");

				$('#id_transaksi_pembelian').val(id);
				$('#status_beli').val(data.status_beli);
				$('#status_barang').val(data.status_barang);
			}
		})
	});

	$(document).on('submit', '#beliForm', function (event) {
		$('#beliModal').modal('hide');
		event.preventDefault();
		let barang = $('#status_barang').val();
		let beli = $('#status_beli').val();
		swal({
			title: "Apakah anda yakin dengan pilihan anda?",
			text: "Pemberitahuan akan dikirim ke User",
			type: 'info',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yakin!'
		}).then((result) => {
			if (result.value) {
				if (barang != '' && beli != '') {
					$.ajax({
						url: "operation.php",
						method: 'POST',
						data: new FormData(this),
						contentType: false,
						processData: false,
						success: function (data) {
							console.log(data);
							dataTable.ajax.reload();
							$('#beliForm')[0].reset();
							$('#beliModal').modal('hide');
						}
					});
				} else {
					alert("Both Fields are Required");
				}
				swal(
					'Pemberitahuan telah dikirim!',
					'',
					'success'
				)
			}
		});
	});


	// View Data
	$(document).on('click', '.detail', function () {
		let id = $(this).attr("id");
		$.ajax({
			url: "detail.php",
			method: "POST",
			data: {
				id: id
			},
			success: function (data) {
				$('#det_transaksiModal').modal('show');
				$('.modal-title').text("Detail Transaksi");
				$('#detailTransaksi').html(data);
			}
		});
	});

	// View Bayar
	$(document).on('click', '.view-bukti', function () {
		let id = $(this).attr("id");
		$.ajax({
			url: "view_bukti.php",
			method: "POST",
			data: {
				id: id
			},
			success: function (data) {
				$('#buktiPembayaran').modal('show');
				$('.modal-title').text("Bukti Pembayaran");
				$('#bukti').html(data);
			}
		});
	});
});