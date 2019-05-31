//Read
$(document).ready(function () {

	var dataTable = $('#tabelNotifikasi').DataTable({
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
		}, ]
	});

	setInterval(function () {
		dataTable.ajax.reload(null, false); // user paging is not reset on reload
	}, 50000);


	$(document).on('click', '.accept', function () {
		var id = $(this).attr("id");
		$.ajax({
			url: "baca.php",
			method: "POST",
			data: {
				id: id
			},
			success: function (data) {
				dataTable.ajax.reload();
			}
		});
	});
});