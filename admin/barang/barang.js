//Read
$(document).ready(function () {
	$('#addButton').click(function () {
		$('#addForm')[0].reset();
		$('.modal-title').text("Tambah Data");
		$('#actionButton').val("Tambah");
		$('#operation').val("Add");
		$('#uploadImage').html('');
	});

	let dataTable = $('#tabelBarang').DataTable({
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
			"targets": [0, 3, 4, 5],
			"orderable": false,
		}, ],
	});

	//Add
	$(document).on('submit', '#addForm', function (event) {
		event.preventDefault();
		let nama = $('#nama_barang').val();
		let harga = $('#harga').val();
		let merk = $('#merk_barang').val();
		let keterangan = $('#keterangan').val();
		let foto = $('#foto').val().split('.').pop().toLowerCase();
		if (foto != '') {
			if (jQuery.inArray(foto, ['png', 'jpg', 'jpeg']) == -1) {
				alert("Invalid Image File");
				$('#foto').val('');
				return false;
			}
		};

		if (nama !== '' && harga !== '' && merk !== '' && keterangan !== '') {
			$.ajax({
				url: "operation.php",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function (data) {
					$('#addForm')[0].reset();
					$('#addModal').modal('hide');
					swal(
						'Berhasil!',
						'',
						'success'
					).then(function () {
						dataTable.ajax.reload();
					})
				}
			});
		} else {
			alert("Both Fields are Required");
		}
	});

	$(document).ready(function () {
		$(document).on('click', '#addButton', function () {
			$('#kategori').show();
			$('#sub_kategori').show();
			$('#kat').show();
			$('#sub').show();
			$('#supplier').show();
		})
	});

	//Kategori
	$(document).ready(function () {
		$(document).on('click', '#kategori', function () {
			let id = $(this).val();
			$.ajax({
				url: "kategori.php",
				method: "POST",
				data: {
					id: id
				},
				success: function (data) {
					$('#sub_kategori').html(data);
				}
			})
		})
	});

	//Ambil Data
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
				$('#addModal').modal('show');
				$('.modal-title').text("Update Data");

				$('#id_barang').val(id);
				$('#nama_barang').val(data.nama_barang);
				$('#harga').val(data.harga);
				$('#keterangan').val(data.keterangan);
				$('#merk_barang').val(data.merk_barang);
				$('#kat').hide();
				$('#sub').hide();
				$('#supplier').hide();

				$('#uploadImage').html(data.foto);
				$('#actionButton').val("Update");
				$('#operation').val("Edit");
			}
		})
	});

	// View Data
	$(document).on('click', '.view', function () {
		let id = $(this).attr("id");
		$.ajax({
			url: "detail.php",
			method: "POST",
			data: {
				id: id
			},
			success: function (data) {
				$('#detailModal').modal('show');
				$('.modal-title').text("Detail Barang");
				$('#detailData').html(data);
			}
		});
	});

	//Delete Data 
	$(document).on('click', '.delete', function () {
		let id = $(this).attr("id");
		swal({
			title: "Apa anda yakin ingin?",
			text: "Data tidak akan diperlihatkan lagi di dalam website.",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yakin!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: "delete.php",
					type: "POST",
					data: {
						id: id
					}
				});
				swal(
						'Data Berhasil di hapus!',
						'Hubungi developer untuk mengembalikannya lagi.',
						'success'
					)
					.then(function () {
						dataTable.ajax.reload();
					})
			}
		})
	});


});